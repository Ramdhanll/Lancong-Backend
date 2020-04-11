<template>
    <div class="container">
        <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div>
                                      <h4 class="box-title">Gallery <i class="ml-2 btn btn-primary ti-plus" @click="addModal"></i> </h4>
                                    </div>
                                </div>
                                <div class="card-body--">
                                    <div class="table-stats order-table ov-h">
                                        <table class="table ">
                                            <thead>
                                                <tr>
                                                    <th class="serial">ID</th>
                                                    <th class="avatar">Travel</th>
                                                    <th>Gambar</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="(gallery, index) in galleries" :key="index">
                                                    <td>{{index + 1 }}</td>
                                                    <td>{{gallery.travel_package.title}}</td>
                                                    <td>
                                                      <img :src="`images/galleries/${gallery.image}`" alt="">
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-warning"> <i class="ti-pencil-alt" @click="editModal(gallery)"></i> </button>
                                                        <button class="btn btn-danger"> <i class="ti-trash" @click="removeGallery(gallery.id)"></i> </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div> <!-- /.table-stats -->
                                </div>
                            </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-8 -->

                    </div>
                </div>
                <!-- /.orders -->
        <!-- Modal -->
      <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalLabel">{{ editMode ? 'Edit Gallery Travel' : 'Tambah Gallery Travel'}}</h5>
              <button type="button" class="close btnClose" data-dismiss="modal" aria-label="Close" >
                <span aria-hidden="true" @click="reset">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form @submit.prevent="editMode ? updateGallery() : createGallery()">
                <div class="form-group">
                  <label for="travel_packages_id">Gallery Travel</label>
                  <select class="form-control" name="travel_packages_id" v-model="form.travel_packages_id"
                  :class="{ 'is-invalid': form.errors.has('travel_packages_id') }">
                    <option disabled value="">Please select one travel</option>
                    <option v-for="(travel, index) in travels" :key="index" :value="travel.id">{{travel.title}}</option>
                  </select>
                  <has-error :form="form" field="travel_packages_id"></has-error>
                </div>
                <div class="form-group">
                  <label for="image">Image</label>
                  <input type="file" class="form-control-file" name="image" id="image" @change="prepareImage"  :class="{ 'is-invalid': form.errors.has('travel_packages_id') }">
                  <has-error :form="form" field="image"></has-error>
                  <img :src="previewPict" alt="" v-show="previewPict" class="preview">
                  <img :src="previewPict ? '' : `images/galleries/${form.image}`" alt="" v-show="editMode" class="preview">
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="reset">Close</button>
                <button v-show="!editMode" type="submit" class="btn btn-primary">Save</button>
                <button v-show="editMode" type="submit" class="btn btn-success h-100">Update</button>
              </div>
              </form>
            </div>
            
          </div>
        </div>
      </div>
    </div>
</template>

<script>
  export default {
    data(){
      return {
        form : new Form({
          id: '',
          travel_packages_id: '',
          image :''
        }),
        editMode : false,
        previewPict: null,
        galleries: [],
        travels: []
      }
    },
    methods: {
      addModal(){
        this.editMode = false;
        this.form.reset();
        $('#modal').modal('show');
        
      },
      editModal(gallery){
        this.editMode = true;
        this.form.reset();
        this.form.fill(gallery);
        $('#modal').modal('show');
      },
      prepareImage(e){
        let image = e.target.files[0];
        let reader = new FileReader();
        
        reader.readAsDataURL(image);
        reader.onload = e => {
          this.previewPict = e.target.result;
          this.form.image = e.target.result;
        }
      },
      createGallery(){
        this.$Progress.start();
        this.form.post('travelGallery')
          .then((data) => {
            Fire.$emit('afterCRUD');
            $('#modal').modal('hide');
            this.form.reset();
            this.previewPict = null;
            this.$Progress.finish();
            Toast.fire({
              icon: 'success',
              title: 'Gallery was created'
            })
          })
          .catch((err) => {
            this.$Progress.fail();
            Toast.fire({
              icon: 'error',
              title: 'Gallery failed created'
            })
          });
      },
      updateGallery(){
        this.$Progress.start();
        this.form.put(`travelGallery/${this.form.id}`)
        .then((data) => {          
          Fire.$emit('afterCRUD');
          $('#modal').modal('hide');
          this.form.reset();
          this.$Progress.finish();
          Toast.fire({
            icon: 'success',
            title: 'travel package was updated'
          })
        })
        .catch((err) => {
          this.$Progress.fail();
          Toast.fire({
            icon: 'error',
            title: 'travel package failed updated'
          })
        });
      },
      removeGallery(id){
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.value) {
            this.$Progress.start();
            axios.delete(`travelGallery/${id}`)
              .then(() => {
                Fire.$emit('afterCRUD');
                Swal.fire(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                )
                this.$Progress.finish();
              })
              .catch(() => {
                Swal.fire(
                  'Failed!',
                  'Your file failed to delete.',
                  'error'
                )
                this.$Progress.fail();
              })
            
          }
        })
      },
      loadTravels(){
        axios.get('getTravel')
          .then((response) => {this.travels = response.data})
          .catch((error) => {console.log(error)});
      },
      loadGallery(){
          axios.get('travelGallery')
            .then((data) => {
              this.galleries = data.data;
              this.$Progress.finish();
            })
            .catch((e) => {
              this.$Progress.fail()
            })
        },
        reset(){
          document.getElementById("image").value = "";
          this.form.reset();
          this.previewPict = null;
        }
    },
    created() {
      this.loadGallery();
      this.loadTravels();
      Fire.$on('afterCRUD',() => this.loadGallery());
    },
    mounted() {
      this.$Progress.start()
    },
  }
</script>

<style scoped>
.btn-tambah {
  margin-top: -30px;
}

.btnClose {
  position: relative;
  top: -25px;
}

.preview{
  margin-top: 30px;
  height: 200px;
  width: 200px;
  box-shadow: 9px;
}
</style>
