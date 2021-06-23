<template>
  <div
    class="w-100  d-flex justify-content-center align-items-center"
    style="min-height:100vh"
  >  
    <div class="login-box">
      <!-- /.login-logo -->
      <div class="card card-outline card-primary">
        <div class="card-body">
          <p class="login-box-msg">
            Change your password
          </p>
  
          <form
            method="post"
            @submit.prevent="register"
          >
            <div class="input-group mb-3">
              <input
                v-model="form.oldPassword"
                type="password"
                class="form-control"
                placeholder="Old Password"
              >
            </div>
            
            <div class="input-group mb-3">
              <input
                v-model="form.newPassword"
                type="password"
                class="form-control"
                placeholder="New Password"
              >
            </div>
            
            <div class="input-group mb-3">
              <input
                v-model="form.confirmPassword"
                type="password"
                class="form-control"
                placeholder="Confirm Password"
              >
            </div>

            <button
              type="submit"
              class="btn btn-primary btn-block"
            >
              Change password
            </button>
          </form>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
</template>

<script>
  export default {
    name: "Settings",
    data(){
          return{
              form:{
                  oldPassword:'',
                  newPassword:'',
                  confirmPassword:''
              }
          }
      },
      methods:{
        register(){
          this.axios.post('user/password',this.form).then(res=>{
            this.$router.push({name:'Home'})
          })
        }
      }
  };
</script>
