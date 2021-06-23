<template>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">
              Bulding List
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <a href="#">Home</a>
              </li>
              <li class="breadcrumb-item active">
                Bulding List
              </li>
            </ol>
          </div><!-- /.col -->
        </div>
      </div>
    </div>
    <div class="content">
      <div class="container-fluid">
        <div class="mb-3">
          <router-link
            to="/admin/dashboard/hotel/add"
            class="btn btn-primary"
          >
            ADD BULDING
          </router-link>
        </div>
    
        <hotel-list />
      </div>
    </div>
  </div>
</template>

<script>
import HotelList from '@/components/hotel/HotelList.vue'

export default {
  name:'AdminHotelList',
components: {
    HotelList,
  },
}
</script>

<style>

</style>