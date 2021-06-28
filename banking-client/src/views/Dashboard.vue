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
          <b>Account</b></a>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col col-sm-6">
            {{accountNumber}}
          </div>
          <div class="col col-sm-3">
            {{balance}}
          </div>
          <button 
            @click="$router.push('/transfer')"
            class="btn btn-outline-danger col col-sm-3"
          >
            Transfer
          </button>
        </div>
        <div class="row">
          <div class="col col-sm-6">
            <b>{{accountName}}</b>
          </div>
          <div class="col col-sm-3">
            <b>Balance</b>
          </div>
          <div class="col col-sm-3 text-center">
            <p class="mb-0">
              <router-link
                :to="{name:'History'}"
                class="text-center"
              >
                History
              </router-link>
            </p>
          </div>
        </div>
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
      accountName: 'Konto jakie chcesz',
      accountNumber: '17 32 1283 012308912',
      balance: '5,100'
    }
  },
  created(){ //weryfikuje czy użytkownik jest zalogowany
      if(this.$store.state.user == null){
          this.$router.push("/home")
      }
  },
  mounted() { //pobiera dane z api
    this.axios.get('showAccount', { headers: { Authorization: `Bearer ${this.$store.state.token}`}}).then(res=>{
      this.accountName = res.data.account[0].accountType
      this.accountNumber = res.data.account[0].accountNumber
      this.balance = res.data.account[0].balance
    })
  }
};
</script>
