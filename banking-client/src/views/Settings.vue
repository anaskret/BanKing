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
            @submit.prevent="passwordChange"
          >
            <div class="input-group mb-3">
              <input
                required
                v-model="form.old_password"
                type="password"
                class="form-control"
                placeholder="Old Password"
              >
            </div>
            
            <div class="input-group mb-3">
              <input
                required
                v-model="form.new_password"
                type="password"
                class="form-control"
                placeholder="New Password"
              >
            </div>
            
            <div class="input-group mb-3">
              <input
                required
                v-model="form.confirm_password"
                type="password"
                class="form-control"
                placeholder="Confirm Password"
              >
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
              Update successful
            </p>

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
            error: false,
            success: false,
            errorMessage: 'Update failed',
              form:{
                  old_password:'',
                  new_password:'',
                  confirm_password:''
              }
          }
      },
      created(){ //weryfikuje czy użytkownik jest zalogowany
          if(this.$store.state.user == null){
              this.$router.push("/home")
          }
      },
      methods:{
        passwordChange(){ //wysyła formularz zmiany hasła do api
          this.errorMessagge = ''
          this.axios.put('updatePassword',this.form, { headers: { Authorization: `Bearer ${this.$store.state.token}`}}).then(res=>{
            this.success = true;
            this.error = false
          }).catch(err =>{
            console.log(err.response.data) //obsługa wiadomości błędu
            if(err.response.data.message != null){
              this.errorMessage = err.response.data.message
            }
            else if(err.response.data.old_password != null){
              this.errorMessage = err.response.data.old_password[0]
            }
            else if(err.response.data.new_password != null){
              this.errorMessage = err.response.data.old_password[0]
            }
            else if(err.response.data.confirm_password != null){
              this.errorMessage = err.response.data.old_password[0]
            }
            else{
              this.errorMessage = 'Update failed'
            }
            this.error = true; 
            this.success = false;
            })
        }
      }
  };
</script>
