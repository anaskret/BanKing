<template>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">
              reservations
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <a href="#">Home</a>
              </li>
              <li class="breadcrumb-item active">
                reservations
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
                    reservations
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
                        <th>ID client</th>
                        <th>start date</th>
                        <th>end date</th>
                        <th>Cost</th>
                        <th>paid</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr
                        v-for="reservation in reservations"
                        :key="reservation.Id"
                      >
                        <td>{{ reservation.Id }}</td>
                        <td>{{ reservation.ClientId }}</td>
                        <td>{{ reservation.StartDate }}</td>
                        <td>{{ reservation.EndDate }}</td>

                        <td><span class="text-bold">{{ reservation.Cost }}$</span></td>
                        <td>
                          <span
                            v-if="reservation.IsPaid"
                            class="badge badge-success"
                          >PAID</span>
                          <span
                            v-else
                            class="badge badge-danger"
                          >NOT PAID</span>
                        </td>
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
      name:'AdminreservationList',
    components: {},
      data(){
        return{
            reservations:[]
        }
      },
      mounted(){
        this.fetchData()
      },
      methods:{
        fetchData(){
          return this.axios.get('reservation').then(res=>{this.reservations = res.data})
        }
      }
    }
    </script>
    
    <style>
    
    </style>