<template>
    <div class="container">
        <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div>
                                      <h4 class="box-title">Transaksi </h4>
                                    </div>
                                </div>
                                <div class="card-body--">
                                    <div class="table-stats order-table ov-h">
                                        <table class="table ">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Travel</th>
                                                    <th>User</th>
                                                    <th>Visa</th>
                                                    <th>Total</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="(item, index) in travelTransaction" :key="index">
                                                    <td>{{ index + 1 }}</td>
                                                    <td>{{ item.travel_package.title }}</td>
                                                    <td> {{ item.user.name }} </td>
                                                    <td> {{ item.additional_visa ? 'Active' : 'In Active' }} </td>
                                                    <td> {{ item.transaction_total }} </td>
                                                    <td> {{ item.transaction_status }} </td>
                                                    <td> 
                                                        <router-link :to="'/transaksi/detail/' + item.id"><button class="btn btn-warning"> <i class="ti-eye"></i> </button></router-link>
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
    </div>
</template>

<script>
    export default {
        data() {
            return {
                travelTransaction : [],
            }
        },
        methods : {
            loadTransaction(){
              axios.get('travelTransaction')
                .then((data) => {
                  this.travelTransaction = data.data;
                  this.$Progress.finish();
                })
                .catch((data) => {
                    console.log(data);
                  this.$Progress.fail()
                })
            }
        },
        mounted() {
            this.$Progress.start();
        },
        created() {
            this.loadTransaction();
        },
    }
</script>

<style>
.btn-tambah {
  margin-top: -30px;
}
</style>
