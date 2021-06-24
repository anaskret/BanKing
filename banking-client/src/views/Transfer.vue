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
                v-model="form.yourAccountNumber"
                type="text"
                class="form-control"
                placeholder="Recipient Account Number"
              >
            </div>
            
            <div class="input-group mb-3">
              <input
                v-model="form.recipientName"
                type="text"
                class="form-control"
                placeholder="Recipient Name"
              >
            </div>
            
            <div class="input-group mb-3">
              <input
                v-model="form.address"
                type="text"
                class="form-control"
                placeholder="Address"
              >
            </div>
            
            <div class="input-group mb-3">
              <input
                v-model="form.tittle"
                type="text"
                class="form-control"
                placeholder="Title"
              >
            </div>
            
            <div class="input-group mb-3">
              <input
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
                    type="date"
                    class="col-sm"
                    :disabledDates="disabledDates"
                />
            </div>
            <p
              v-if="error"
              class="text-danger"
            >
              Transfer failed
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
            disabledDates: {
              to: new Date(Date.now()- 8640000)
            }
          }
      },
      created(){
          if(this.$store.state.user == null){
              this.$router.push("/home")
          }
      },
      methods:{
        sendTransfer(){
          this.axios.post('addTransfer',this.form, { headers: { Authorization: `Bearer ${this.$store.state.token}`}}).then(res=>{
            this.success = true
            this.error = false
          }).catch(err => {
            this.error = true; 
            this.success = false;})
        }
      }
  };
</script>
