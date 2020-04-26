<template>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <div>
                <h4 class="box-title">Transaksi Detail</h4>
              </div>
            </div>
            <div class="card-body--">
              <table class="table table-bordered">
                <tr>
                  <th> ID</th>
                  <td> {{ transaksiDetail.id }} </td>
                </tr>
                <tr>
                  <th>Paket Travel</th>
                  <td> {{ transaksiDetail.travel_package.title }} </td>
                </tr>
                <tr>
                  <th>Pembeli</th>
                  <td> {{ transaksiDetail.user.name }} </td>
                </tr>
                <tr>
                  <th>Additional VISA</th>
                  <td> {{ transaksiDetail.additional_visa ? 'Active' : 'In Active' }} </td>
                </tr>
                <tr>
                  <th> Total Transaksi</th>
                  <td> {{ transaksiDetail.transaction_total }} </td>
                </tr>
                <tr>
                  <th> Status Transaksi</th>
                  <td> {{ transaksiDetail.transaction_status }} </td>
                </tr>
                <tr>
                  <th> Pembelian</th>
                  <td v-for="(item, index) in transaksiDetail.details" :key="index">
                    <tr>
                      <th>ID</th>
                      <th>Nama</th>
                      <th>Nationality</th>
                      <th>VISA</th>
                      <th>Doe Passport</th>
                    </tr>
                    <tr>
                      <td> {{ item.id }}</td>
                      <td> {{ item.username }} </td>
                      <td> {{ item.nationality }} </td>
                      <td> {{ item.is_visa ? 'Active' : 'In Active' }} </td>
                      <td> {{ item.doe_passport }} </td>
                    </tr>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
</template>

<script>
    export default {
        data() {
          return {
            transaksiDetail : [],
          }
        },
        methods : {
          loadTransaksiDetail() {
            this.$Progress.start()
            axios.get('/getTransaksiDetail/' + this.$route.params.id)
              .then(response => {
                this.transaksiDetail = response.data[0];
                this.$Progress.finish();

                console.log(response.data[0]);
              })
              .catch(() => {
                this.$Progress.fail();
              })
          }
        },
        mounted() {
          this.loadTransaksiDetail();
        },
        created() {
        },
    }
</script>

<style>
.btn-tambah {
  margin-top: -30px;
}

.table {
  width: 100%;
  table-layout: auto;
}

th {
  font-weight: 600;
  width: 190px;
}
</style>
