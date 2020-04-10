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
                                                <tr>
                                                    <td>1.</td>
                                                    <td></td>
                                                    <td> #54692 </td>
                                                    <td>
                                                        <button class="btn btn-warning"> <i class="ti-pencil-alt"></i> </button>
                                                        <button class="btn btn-danger"> <i class="ti-trash"></i> </button>
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
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form @submit.prevent="editMode ? updateGallery() : createGallery()">
                <div class="form-group">
                  <label for="travel_packages_id">Gallery Travel</label>
                  <select class="form-control" name="travel_packages_id" id="" v-model="form.travel_packages_id"
                  :class="{ 'is-invalid': form.errors.has('travel_packages_id') }">
                    <option value="a">A</option>
                    <option value="b">B</option>
                    <option value="c">C</option>
                  </select>
                  <has-error :form="form" field="travel_packages_id"></has-error>
                </div>
                <div class="form-group">
                  <label for="image">Image</label>
                  <input type="file" class="form-control-file" name="image" id="image" @change="prepareImage"
                  :class="{ 'is-invalid': form.errors.has('travel_packages_id') }">
                  <has-error :form="form" field="image"></has-error>
                  <img :src="previewPict" alt="" v-show="previewPict">
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
          travel_packages_id: '',
          image :''
        }),
        editMode : false,
        previewPict: null
      }
    },
    methods: {
      addModal(){
        this.editMode = false;
        this.form.reset();
        $('#modal').modal('show');
        
      },
      editModal(travelPackage){
        this.editMode = true;
        this.form.reset();
        this.form.fill(travelPackage);
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
              this.$Progress.finish();
              Toast.fire({
                icon: 'success',
                title: 'travel package was created'
              })
            })
            .catch((err) => {
              this.$Progress.fail();
              Toast.fire({
                icon: 'error',
                title: 'travel package failed created'
              })
            });
        },
    },
    created() {
      this.loadPaket();
      Fire.$on('afterCRUD',() => this.loadPaket());
    },
  }
</script>

<style>
.btn-tambah {
  margin-top: -30px;
}
</style>
