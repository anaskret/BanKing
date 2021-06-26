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
              Update failed
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
              form:{
                  old_password:'',
                  new_password:'',
                  confirm_password:''
              }
          }
      },
      created(){
          if(this.$store.state.user == null){
              this.$router.push("/home")
          }
      },
      methods:{
        passwordChange(){
          this.axios.put('updatePassword',this.form, { headers: { Authorization: `Bearer ${this.$store.state.token}`}}).then(res=>{
            this.success = true;
            this.error = false
          }).catch(err => {this.error = true; this.success = false;})
        }
      }
  };
</script>
