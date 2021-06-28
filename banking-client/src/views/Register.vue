<template>
  <div
    class="w-100  d-flex justify-content-center align-items-center"
    style="min-height:100vh"
  >  
    <div class="login-box">
      <!-- /.login-logo -->
      <div class="card card-outline card-primary">
        <div class="card-header text-center">
          <a
            href="../../index2.html"
            class="h1"
          >
            <b>BanKing</b></a>
        </div>
        <div class="card-body">
          <p class="login-box-msg">
            Sign up to our bank
          </p>
  
          <form
            method="post"
            @submit.prevent="register"
          >
            <div class="input-group mb-3">
              <input
                required
                v-model="form.email"
                type="email"
                class="form-control"
                placeholder="Email"
              >
              <div class="input-group-append">
                <div class="input-group-text">
                  <b-icon
                    icon="envelope"
                    style="color: #7952b3;"
                  />
                </div>
              </div>
            </div>
            
            <div class="input-group mb-3">
              <input
                required
                v-model="form.name"
                type="text"
                class="form-control"
                placeholder="First Name"
              >
            </div>
            
            <div class="input-group mb-3">
              <input
                required
                v-model="form.surname"
                type="text"
                class="form-control"
                placeholder="Last Name"
              >
            </div>
            
            <div class="input-group mb-3">
              <input
                required
                v-model="form.personalIdNumber"
                type="text"
                class="form-control"
                placeholder="Personal Id Number"
              >
            </div>

            <div class="input-group mb-3">
              <input
                required
                v-model="form.phoneNumber"
                type="text"
                class="form-control"
                placeholder="Phone"
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
            
            <div class="input-group mb-3 row">
                <label class="col-sm">Date Of Birth</label>
                <Datepicker
                  required
                  v-model="form.dateOfBirth"
                  :full-month-name="false"
                  type="date"
                  class="col-sm"
                  format="yyyy-MM-dd"
                  :disabledDates="disabledDates"
                />
            </div>
            
            <div class="input-group mb-3">
              <input
                required
                v-model="form.login"
                type="text"
                class="form-control"
                placeholder="Login"
              >
            </div>
            
            <div class="input-group mb-3">
              <input
                required
                v-model="form.password"
                type="password"
                class="form-control"
                placeholder="Password"
              >
            </div>

            <p
              class="text-danger"
            >
              {{errorMessage}}
            </p>

            <button
              type="submit"
              class="btn btn-primary btn-block"
            >
              Register
            </button>
          </form>

          <p class="mb-0">
            <router-link
              :to="{name:'Login'}"
              class="text-center"
            >
              Already registered? Sign in
            </router-link>
          </p>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
</template>
    
<script>
import Datepicker from 'vuejs-datepicker';

export default {
  name:'Register',
  components: {
      Datepicker
    },
  data(){
      return{
        errorMessage: '',
        form:{
            email:'',
            name:'',
            surname:'',
            personalIdNumber:'',
            phoneNumber:'',
            address:'',
            dateOfBirth:'',
            login:'',
            password:'',
        },
        disabledDates: { //wyłącza daty w datepickerze z użytku
          from: new Date(2004, 11, 32)
        }
      }
  },
  methods:{
    register(){
      this.errorMessage = ''
      let year = new Intl.DateTimeFormat('en', {year: 'numeric'}).format(this.form.dateOfBirth)
      let month = new Intl.DateTimeFormat('en', {month: 'numeric'}).format(this.form.dateOfBirth)
      let day = new Intl.DateTimeFormat('en', {day: 'numeric'}).format(this.form.dateOfBirth)
      this.form.dateOfBirth = `${year}-${month}-${day}` 

      this.axios.post('register',this.form).then(res=>{ //wysyła formularz rejestracji do api
        this.$router.push({name:'Login'})
      }).catch(err=>{
        if(err.response.data.name != null){
          this.errorMessage = err.response.data.name[0]
        }
        else if(err.response.data.surname != null){
          this.errorMessage = err.response.data.surname[0]
        }
        else if(err.response.data.email != null){
          this.errorMessage = err.response.data.email[0]
        }
        else if(err.response.data.personalIdNumber != null){
          this.errorMessage = err.response.data.personalIdNumber[0]
        }
        else if(err.response.data.phoneNumber != null){
          this.errorMessage = err.response.data.phoneNumber[0]
        }
        else if(err.response.data.address != null){
          this.errorMessage = err.response.data.address[0]
        }
        else if(err.response.data.dateOfBirth != null){
          this.errorMessage = err.response.data.dateOfBirth[0]
        }
        else if(err.response.data.login != null){
          this.errorMessage = err.response.data.login[0]
        }
        else if(err.response.data.message != null){
          this.errorMessage = err.response.data.message 
        }
        else{
          this.errorMessage = 'Transfer failed'
        }
        console.log(err.response.data)
      })  
    }
  }
}
</script>
    
    <style>
    
    </style>