<template>
    <div class="container">
        <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div>
                                      <h4 class="box-title">Paket Travel <i class="ml-2 btn btn-primary ti-plus" data-toggle="modal" data-target="#exampleModal"></i> </h4>
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
                                                  <td></td>
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
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="">
                          <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" v-model="form.title"
                              class="form-control" name="title" id="title" aria-describedby="title">
                          </div>
                          <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" v-model="form.location"
                              class="form-control" name="location" id="location" aria-describedby="location">
                          </div>
                          <div class="form-group">
                            <label for="about">About</label>
                            <textarea v-model="form.about" class="form-control" name="about" id="about" rows="3"></textarea>
                          </div>
                          <div class="form-group">
                            <label for="feautured_event">Featured Event</label>
                            <input type="text" v-model="form.featured_event"
                              class="form-control" name="feautured_event" id="feautured_event" aria-describedby="feautured">
                          </div>
                          <div class="form-group">
                            <label for="language">Language</label>
                            <input type="text" v-model="form.language"
                              class="form-control" name="language" id="language" aria-describedby="language">
                          </div>
                          <div class="form-group">
                            <label for="foods">Foods</label>
                            <input type="text" v-model="form.foods"
                              class="form-control" name="foods" id="foods" aria-describedby="foods">
                          </div>
                          <div class="form-group">
                            <label for="departure_date">Departure Date</label>
                            <input type="date" v-model="form.departure_date"
                              class="form-control" name="departure_date" id="departure_date">
                          </div>
                          <div class="form-group">
                            <label for="duration">Duration</label>
                            <input type="text" v-model="form.duration"
                              class="form-control" name="duration" id="duration" aria-describedby="duration">
                          </div>
                          <div class="form-group">
                            <label for="type">type</label>
                            <input type="text" v-model="form.type"
                              class="form-control" name="type" id="type" aria-describedby="type" placeholder="e.g 3D 2N">
                          </div>
                          <div class="form-group">
                            <label for="price">price</label>
                            <input type="text" v-model="form.price"
                              class="form-control" name="price" id="price" aria-describedby="price">
                          </div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button @click.prevent="createPaket" type="button" class="btn btn-primary">Save</button>
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
          travelPackages : []
        }
      },
      methods: {
        createPaket(){
          this.form.post('admin')
            .then((data) => {console.log(data)})
            .catch((err) => {console.log(err)});
        }
      },
        mounted() {
          axios.get('admin')
            .then((data) => {this.travelPackages = data.data})

        }
    }
</script>

<style>
.btn-tambah {
  margin-top: -30px;
}
</style>
