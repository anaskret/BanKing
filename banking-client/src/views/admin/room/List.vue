<template>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">
              Room List
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <a href="#">Home</a>
              </li>
              <li class="breadcrumb-item active">
                Room List
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
            to="/admin/dashboard/room/add"
            class="btn btn-primary"
          >
            ADD ROOM
          </router-link>
        </div>
    
        <room-list />
      </div>
    </div>
  </div>
</template>

<script>
import RoomList from '@/components/room/RoomList.vue'

export default {
  name:'AdminDashboardRoomList',
components: {
    RoomList,
  },
}
</script>

<style>

</style>