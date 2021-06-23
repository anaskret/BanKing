<template>
  <b-navbar
    toggleable="lg"

    variant="primary"
  >
    <b-navbar-brand href="/">
      BanKing
    </b-navbar-brand>

    <b-navbar-toggle target="nav-collapse" />

    <b-collapse
      id="nav-collapse"
      is-nav
    >
      <!-- Right aligned nav items -->
      <b-navbar-nav
        v-if="isLogged"
        class="ml-auto"
      >
        <b-nav-item-dropdown right>
          <!-- Using 'button-content' slot -->
          <template #button-content>
            <span class="text-white">Hello <em>{{ user.FirstName }}</em></span>
          </template>
          <b-dropdown-item href="#">
            Profile
          </b-dropdown-item>
          <b-dropdown-item @click="$store.dispatch('logOut')">
            Sign Out
          </b-dropdown-item>
        </b-nav-item-dropdown>
      </b-navbar-nav>
      <b-navbar-nav
        v-if="!isLogged"
        class="ml-auto"
      > 
        <router-link
          class="text-white"
          :to="{name:'Login'}"
        >
          LogIn
          <b-icon-mailbox variant="white" />
        </router-link>
      </b-navbar-nav>
    </b-collapse>
  </b-navbar>
</template>

<script>
export default {
  name:'Menu',
  computed:{
    user(){
      return this.$store.state.user
    },
    isLogged(){
      return this.user !== null
    }
  }
}
</script>

<style>

</style>