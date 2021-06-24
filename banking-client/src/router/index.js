import Vue from "vue";
import VueRouter from "vue-router";
import store from '../store/index';
import Home from "../views/Home.vue";
import Login from '../views/Login.vue';
import Register from '../views/Register.vue';
import Dashboard from '../views/Dashboard.vue';
import Settings from '../views/Settings.vue';
import Transfer from '../views/Transfer.vue';
import History from '../views/History.vue';
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
  {
    path: "/transfer",
    name:"Transfer",
    component: Transfer,
  },
  {
    path: "/history",
    name:"History",
    component: History,
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
});



export default router;
