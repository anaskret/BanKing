<template>
  <v-card
      color="white"
      flat
      height="200px"
      tile
    >
    <v-app-bar 
      absolute
      color="grey lighten-4"
      elevate-on-scroll
      >
      <v-btn to="/" icon>
        <v-icon>mdi-home</v-icon>
      </v-btn>
      <v-toolbar-title>Banking</v-toolbar-title>

      <v-spacer></v-spacer>

      <span v-if="isLoggedIn">
        <v-btn
          @click="$router.push('/Register')"
          elevation="2"
          color="warning"
          dark
          >Logout
        </v-btn>
      </span>
      <span v-else>
        <v-btn
          @click="$router.push('/Register')"
          elevation="2"
          color="warning"
          dark
          >Register
        </v-btn>
        <v-btn
          @click="$router.push('/Login')"
          elevation="2"
          color="primary"
          class="ml-2"
          >Login
        </v-btn>
      </span>

    </v-app-bar>
  </v-card>
</template>

<script>
export default {
  name: 'NavBar',
  computed : {
    isLoggedIn : function(){ return this.$store.getters.isAuthenticated}
    },
    methods: {
      async logout (){
        await this.$store.dispatch('LogOut')
        this.$router.push('/login')
      }
    },
}
</script>

<style>
#nav {
  padding: 30px;
}
#nav a {
  font-weight: bold;
  color: #2c3e50;
}
a:hover {
  cursor: pointer;
}
#nav a.router-link-exact-active {
  color: #42b983;
}
</style>