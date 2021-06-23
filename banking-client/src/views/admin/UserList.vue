<template>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">
              Users
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <a href="#">Home</a>
              </li>
              <li class="breadcrumb-item active">
                users
              </li>
            </ol>
          </div><!-- /.col -->
        </div>
      </div>
    </div>
    <div class="content">
      <div class="container-fluid">
        <div class="mb-3">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">
                    Users
                  </h3>

                  <div class="card-tools">
                    <div
                      class="input-group input-group-sm"
                      style="width: 150px;"
                    >
                      <input
                        type="text"
                        name="table_search"
                        class="form-control float-right"
                        placeholder="Search"
                      >

                      <div class="input-group-append">
                        <button
                          type="submit"
                          class="btn btn-default"
                        >
                          <i class="fas fa-search" />
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Full name</th>
                        <th>Email</th>
                        <th>phone</th>
                        <th>address</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr
                        v-for="user in users"
                        :key="user.Id"
                      >
                        <td>{{ user.Id }}</td>
                        <td>{{ user.FirstName }} {{ user.LastName }}</td>
                        <td>{{ user.Email }}</td>
                        <td>{{ user.Phone }}</td>
                        <td>{{ `${user.City},${user.ZipCode} - ${user.StreetName} ${user.FlatNumber}` }}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              <!-- /.card-body -->
              </div>
            <!-- /.card -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
  
  <script>
//   import HotelList from '@/components/hotel/HotelList.vue'
  
  export default {
    name:'AdminUserList',
  components: {},
    data(){
      return{
        users:[]
      }
    },
    mounted(){
      this.fetchData()
    },
    methods:{
      fetchData(){
        return this.axios.get('user').then(res=>{this.users = res.data})
      }
    }
  }
  </script>
  
  <style>
  
  </style>