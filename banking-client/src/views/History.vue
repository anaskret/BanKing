<template>
  <div
    class="w-100  d-flex justify-content-center align-items-center"
    style="min-height:100vh"
  >  
    <div class="card card-outline" style="width: 40rem;">
      <div class="card-header text-center">
        <a
          class="h1"
        >
          <b>Transfer History</b></a>
      </div>
      <div class="card-body">
        <b-table striped hover :items="items"></b-table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</template>

<script>
//Saldo klienta (rachunek, karta kredytowa, kredyt)

export default {
  name: "Dashboard",
  data(){
    return{
      items: [
          { created_at: '', transferDate: '', nameOfBank: '', recipientName: '', tittle: '', amount: ''}
        ]
    }
  },
  created(){ //weryfikuje czy użytkownik jest zalogowany
      if(this.$store.state.user == null){
          this.$router.push("/home")
      }
  },
  mounted(){ //pobiera transfery z api
    this.axios.get('showTransfers', { headers: { Authorization: `Bearer ${this.$store.state.token}`}}).then(res=>{
      res.data.transfers.forEach(element => {
        console.log(element)
        this.items.push(element)
      });
    })
  }
};
</script>
