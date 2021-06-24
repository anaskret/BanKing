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
            Sign in to our banking app
          </p>

          <form
            method="post"
            @submit.prevent="logIn"
          >
            <div class="input-group mb-3">
              <input
                v-model="form.login"
                type="text"
                class="form-control"
                placeholder="Login"
              >
            </div>
            <div class="input-group mb-3">
              <input
                v-model="form.password"
                type="password"
                class="form-control"
                placeholder="Password"
              >
              <div class="input-group-append">
                <div class="input-group-text">
                  <b-icon
                    icon="lock"
                    style="color: #7952b3;"
                  />
                </div>
              </div>
            </div>
            <p
              v-if="error"
              class="text-danger"
            >
              Bad login or password try again
            </p>
            <button
              type="submit"
              class="btn btn-primary btn-block"
            >
              LOGIN
            </button>
          </form>

          <div class="social-auth-links text-center mt-2 mb-3" />
          <!-- /.social-auth-links -->

        
          <p class="mb-0">
            <router-link
              :to="{name:'Register'}"
              class="text-center"
            >
              Register
            </router-link>
          </p>
        </div>
      </div>
    </div>
  </div>
</template>
  
  <script>
  export default {
  name:'Login',
  data(){
        return{
          error:false,
            form:{
                login:'',
                password:'',
            }
        }
    },
    methods:{
        logIn(){
          this.error = false
            this.axios.post('login',this.form).then(res=>{
              this.$store.dispatch('login', this.form.login)
              this.$store.state.token = res.data.token
              this.$router.push({name:'Dashboard'})
            }).catch(err=>{console.log(err.response); console.log(err); this.error = true})
            
           
        }
    }
  }
  </script>
  
  <style>
  
  </style>