<template>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="logo w-50 m-auto">
      <img
        class="img-fluid"
        src="https://cdn4.iconfinder.com/data/icons/office-and-business-conceptual-flat/169/20-128.png"
        alt=""
      >
    </div>
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul
          class="nav nav-pills nav-sidebar flex-column"
          data-widget="treeview"
          role="menu"
          data-accordion="false"
        >
          <li class="nav-item">
            <a
              href="#/dashboard"
              class="nav-link"
            >
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
            <a
              href="#/transfer"
              class="nav-link"
            >
              Transfer
            </a>
          </li>
          <li class="nav-item ">
            <a
              href="#/history"
              class="nav-link"
            >
              History
            </a>
          </li>
          <li class="nav-item ">
            <a
              href="#/settings"
              class="nav-link"
            >
              Settings
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
</template>

<script>
export default {
name:'Aside'
}
</script>

<style>

</style>