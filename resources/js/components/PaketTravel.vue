<template>
    <div class="container">
      <!-- Orders -->
      <div class="orders">
          <div class="row">
              <div class="col-xl-12">
                  <div class="card">
                      <div class="card-body">
                          <div>
                            <h4 class="box-title">Paket Travel <i class="ml-2 btn btn-primary ti-plus" @click="addModal"></i> </h4>
                          </div>
                      </div>
                      <div class="card-body--">
                          <div class="table-stats order-table ov-h">
                              <table class="table ">
                                  <thead>
                                      <tr>
                                          <th class="serial">ID</th>
                                          <th class="avatar">Title</th>
                                          <th>Location</th>
                                          <th>Type</th>
                                          <th>Departure Date</th>
                                          <th>Duration</th>
                                          <th>Action</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <tr v-for="(travelPackage, index) in travelPackages" :key="index">
                                        <td>{{ index + 1 }}</td>
                                        <td>{{ travelPackage.title }}</td>
                                        <td>{{ travelPackage.location }}</td>
                                        <td>{{ travelPackage.type }}</td>
                                        <td>{{ travelPackage.departure_date }}</td>
                                        <td>{{ travelPackage.duration }}</td>
                                        <td>
                                          <button class="btn btn-warning" @click="editModal(travelPackage)"> <i class="ti-pencil-alt"></i> </button>
                                          <button class="btn btn-danger" @click="removePaket(travelPackage.id)"> <i class="ti-trash"></i> </button>
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
              <h5 class="modal-title" id="modalLabel">{{ editMode ? 'Edit Paket Travel' : 'Tambah Paket Travel'}}</h5>
              <button type="button" class="close btnClose" data-dismiss="modal" aria-label="Close" >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form @submit.prevent="editMode ? updatePaket() : createPaket()">
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" v-model="form.title"
                    class="form-control" name="title" id="title" aria-describedby="title"
                    :class="{ 'is-invalid': form.errors.has('title') }">
                    <has-error :form="form" field="title"></has-error>
                </div>
                <div class="form-group">
                  <label for="location">Location</label>
                  <input type="text" v-model="form.location"
                    class="form-control" name="location" id="location" aria-describedby="location"
                    :class="{ 'is-invalid': form.errors.has('location') }">
                    <has-error :form="form" field="location"></has-error>
                </div>
                <div class="form-group">
                  <label for="about">About</label>
                  <textarea v-model="form.about" class="form-control" name="about" id="about" rows="3"
                  :class="{ 'is-invalid': form.errors.has('location') }"></textarea>
                  <has-error :form="form" field="location"></has-error>
                </div>
                <div class="form-group">
                  <label for="featured_event">Featured Event</label>
                  <input type="text" v-model="form.featured_event"
                    class="form-control" name="featured_event" id="featured_event" aria-describedby="feautured"
                    :class="{ 'is-invalid': form.errors.has('featured_event') }">
                    <has-error :form="form" field="featured_event"></has-error>
                </div>
                <div class="form-group">
                  <label for="language">Language</label>
                  <input type="text" v-model="form.language"
                    class="form-control" name="language" id="language" aria-describedby="language"
                    :class="{ 'is-invalid': form.errors.has('language') }">
                    <has-error :form="form" field="language"></has-error>
                </div>
                <div class="form-group">
                  <label for="foods">Foods</label>
                  <input type="text" v-model="form.foods"
                    class="form-control" name="foods" id="foods" aria-describedby="foods"
                    :class="{ 'is-invalid': form.errors.has('foods') }">
                    <has-error :form="form" field="foods"></has-error>
                </div>
                <div class="form-group">
                  <label for="departure_date">Departure Date</label>
                  <input type="date" v-model="form.departure_date"
                    class="form-control" name="departure_date" id="departure_date"
                    :class="{ 'is-invalid': form.errors.has('departure_date') }">
                    <has-error :form="form" field="departure_date"></has-error>
                </div>
                <div class="form-group">
                  <label for="duration">Duration</label>
                  <input type="text" v-model="form.duration"
                    class="form-control" name="duration" id="duration" aria-describedby="duration" placeholder="e.g 3D 2N"
                    :class="{ 'is-invalid': form.errors.has('duration') }">
                    <has-error :form="form" field="duration"></has-error>
                </div>
                <div class="form-group">
                  <label for="type">type</label>
                  <input type="text" v-model="form.type"
                    class="form-control" name="type" id="type" aria-describedby="type"
                    :class="{ 'is-invalid': form.errors.has('type') }">
                    <has-error :form="form" field="type"></has-error>
                </div>
                <div class="form-group">
                  <label for="price">price</label>
                  <input type="text" v-model="form.price"
                    class="form-control" name="price" id="price" aria-describedby="price"
                    :class="{ 'is-invalid': form.errors.has('price') }">
                    <has-error :form="form" field="price"></has-error>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button v-show="!editMode" type="submit" class="btn btn-primary">Save</button>
                <button v-show="editMode" type="submit" class="btn btn-success">Update</button>
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
            title: '',
            location: '',
            about: '',
            featured_event: '',
            language: '',
            foods: '',
            departure_date: '',
            duration: '',
            type: '',
            price: '',
          }),
          // modalTitle : '',
          travelPackages : [],
          editMode : false,
        }
      },
      methods: {
        createPaket(){
          this.$Progress.start();
          this.form.post('travelPaket')
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
        updatePaket(){
          this.$Progress.start();
          this.form.put(`travelPaket/${this.form.id}`)
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
        loadPaket(){
          axios.get('travelPaket')
            .then((data) => {
              this.travelPackages = data.data;
              this.$Progress.finish();
            })
            .catch(() => {
              this.$Progress.fail()
            })
        },
        removePaket(id){
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
              axios.delete(`travelPaket/${id}`)
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
        }
      },
      mounted() {
        this.$Progress.start()
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

.btnClose {
  position: relative;
  top: -20px;
  background-color: red;
  color: red;
}
</style>
