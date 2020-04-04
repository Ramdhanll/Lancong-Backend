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
                                                <tr>
                                                    <td>1.</td>
                                                    <td>asd</td>
                                                    <td> #5469 </td>
                                                    <td> #5469 </td>
                                                    <td> #5469 </td>
                                                    <td> #5469 </td>
                                                    <td> #5469 </td>
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
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style>
.btn-tambah {
  margin-top: -30px;
}
</style>
