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
            
            <a>Date Of Birth</a>
            <div class="input-group mb-3">
              <input
                required
                v-model="form.dateOfBirth"
                type="date"
                class="form-control"
              >
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
    export default {
      name:'Register',
      data(){
          return{
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
              }
          }
      },
      methods:{
        register(){

          this.axios.post('register',this.form).then(res=>{ //wysyła formularz rejestracji do api
            this.$router.push({name:'Home'})
          }).catch(err=>{
             console.log(err.response.data)
          })  
        }
      }
    }
  </script>
    
    <style>
    
    </style>