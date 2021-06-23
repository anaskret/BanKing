import Vue from "vue";
import VueRouter from "vue-router";
import store from '../store/index';
import Home from "../views/Home.vue";
import Login from '../views/login.vue';
import Register from '../views/register.vue';
import Dashboard from '../views/Dashboard.vue';
import Settings from '../views/Settings.vue';
Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    name: "Home",
    component: Home,
  },
  {
    path: "/login",
    name: "Login",
    component: Login,
  },
  {
    path: "/register",
    name: "Register",
    component: Register,
  },
  {
    path: "/dashboard",
    name:"Dashboard",
    component: Dashboard,
  },
  {
    path: "/settings",
    name:"Settings",
    component: Settings,
  },
];

const router = new VueRouter({
  routes,
});


router.beforeEach((to, from, next) => {
  console.log(to)
  if(['Login','Register'].includes(to.name)  && store.state.user !==null){
    next({
      path:from.fullPath
    })
  }

  
      store.dispatch('checkAuth')
      next()
  // if (to.matched.some(record => record.meta.requiresAuth)) {
  //     // this route requires auth, check if logged in
  //     // if not, redirect to login page.
  //     store.dispatch('user/getUser').then(user => {
  //         next()
  //     }).catch(error => {
  //         next({
  //             path: '/login',
  //             query: {redirect: to.fullPath}
  //         })
  //     })
  // } else {
  //     if (to.name === "login" && store.getters['user/getUser']) {
  //         next({
  //             path: '/',
  //             query: {redirect: to.fullPath}
  //         }) // make sure to always call next()!
  //     } else {
  //         next();
  //     }
  // }
});



export default router;
