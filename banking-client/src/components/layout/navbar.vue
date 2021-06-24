<template>
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" @click="$store.dispatch('logOut')">Log out</a>
      </li>
    </ul>
  </nav>
</template>

<script>
export default {

}
</script>

<style>

</style>