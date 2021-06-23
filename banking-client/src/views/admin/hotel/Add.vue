<template>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">
              ADD NEW HOTEL
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <a href="#">Home</a>
              </li>
              <li class="breadcrumb-item active">
                Add hotel
              </li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="content">
      <div class="container-fliud">
        <div class="row justify-content-center">
          <div class=" col-12">
            <hotel-form />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
  
  <script>
import HotelForm from '../../../components/hotel/HotelForm.vue'
  export default {
  name:'AdminHotelAdd',
  components: { HotelForm }
  }
  </script>
  
  <style>
  
  </style>