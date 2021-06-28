<template>
  <div
    class="w-100  d-flex justify-content-center align-items-center"
    style="min-height:100vh"
  >  
    <div class="login-box">
      <div class="card card-outline card-primary">
        <div class="card-body">
          <p class="login-box-msg">
            Bank Transfer
          </p>
  
          <form
            method="post"
            @submit.prevent="sendTransfer"
          >
            <div class="input-group mb-3">
              <input
                required
                v-model="form.yourAccountNumber"
                type="text"
                class="form-control"
                placeholder="Recipient Account Number"
              >
            </div>
            
            <div class="input-group mb-3">
              <input
                required
                v-model="form.recipientName"
                type="text"
                class="form-control"
                placeholder="Recipient Name"
              >
            </div>
            
            <div class="input-group mb-3">
              <input
                required
                v-model="form.address"
                type="text"
                class="form-control"
                placeholder="Address"
              >
            </div>
            
            <div class="input-group mb-3">
              <input
                required
                v-model="form.tittle"
                type="text"
                class="form-control"
                placeholder="Title"
              >
            </div>
            
            <div class="input-group mb-3">
              <input
                required
                v-model="form.amount"
                type="number"
                class="form-control"
                placeholder="Amount"
              >
            </div>
              
            <div class="input-group mb-3 row">
                <label class="col-sm">Transfer date:</label>
                <Datepicker
                    v-model="form.transferDate"
                    :full-month-name="false"
                    type="date"
                    class="col-sm"
                    format="yyyy-MM-dd"
                    value="yyyy-MM-dd"
                    :disabledDates="disabledDates"
                />
            </div>
            <p
              v-if="error"
              class="text-danger"
            >
              {{errorMessage}}
            </p>
            <p
              v-if="success"
              class="text-green"
            >
              Transfer successful
            </p>
            <button
              type="submit"
              class="btn btn-primary btn-block"
            >
              Transfer
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Datepicker from 'vuejs-datepicker';

  export default {
    name: "Transfer",
    components: {
      Datepicker
    },
    data(){
          return{
            error: false, 
            errorMessage: '',
            success: false, 
            form:{
                yourAccountNumber:'',
                recipientName:'',
                tittle:'',
                amount:'',
                address:'',
                transferDate: ''
            },
            disabledDates: { //wyłącza daty w datepickerze z użytku
              to: new Date(Date.now()- 8640000)
            }
          }
      },
      created(){ //weryfikuje czy użytkownik jest zalogowany
          if(this.$store.state.user == null){
              this.$router.push("/home")
          }
      },
      methods:{
        sendTransfer(){
          this.errorMessage = ''
          this.error = false; 
          this.success = false;

          if(this.form.transferDate < Date.now())
            this.form.transferDate = Date.now()

          let year = new Intl.DateTimeFormat('en', {year: 'numeric'}).format(this.form.transferDate)
          let month = new Intl.DateTimeFormat('en', {month: 'numeric'}).format(this.form.transferDate)
          let day = new Intl.DateTimeFormat('en', {day: 'numeric'}).format(this.form.transferDate)
          this.form.transferDate = `${year}-${month}-${day}` //formatuje date

          this.axios.post('addTransfer',this.form, { headers: { Authorization: `Bearer ${this.$store.state.token}`}}).then(res=>{ //wysyła requesta do api
            this.success = true //jeśli api zwróci sukces wyświetla wiadomość success
            this.error = false
          }).catch(err => { //jesli api zwróci błąd wyświetla wiadomość niepowodzenia
            if(err.response.data.tittle != null){ //obsługa błędu
              this.errorMessage = err.response.data.tittle[0]
            }
            else if(err.response.data.amount != null){
              this.errorMessage = err.response.data.amount[0]
            }
            else if(err.response.data.yourAccountNumber != null){
              this.errorMessage = err.response.data.yourAccountNumber[0]
            }
            else if(err.response.data.recipientName != null){
              this.errorMessage = err.response.data.recipientName[0]
            }
            else if(err.response.data.transferDate != null){
              this.errorMessage = err.response.data.transferDate [0]
            }
            else if(err.response.data.address != null){
              this.errorMessage = err.response.data.address[0]
            }
            else if(err.response.data.message != null){
              this.errorMessage = err.response.data.message 
            }
            else{
              this.errorMessage = 'Transfer failed'
            }
            this.form.transferDate = ''
            this.error = true; 
            this.success = false;})
        }
      }
  };
</script>
