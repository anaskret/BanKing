import Vue from 'vue'
import Vuex from 'vuex'
import { getField, updateField } from 'vuex-map-fields';

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    user:null,
  },
  getters:{
    getField
  },
  mutations: {
    updateField,
    SET_USER(state,user){
      state.user = user
    },
  },
  actions: {

    login({state,commit},data){
      console.log(this)
       localStorage.setItem("ireceptionAccount",JSON.stringify(data));

      commit('SET_USER',data)
    },
    checkAuth({commit}){
      const t = localStorage.getItem("ireceptionAccount");
      if(t){
        commit('SET_USER',JSON.parse(t))
      }
    },
    register(){
      
    },
    logOut({commit}){
      localStorage.removeItem("ireceptionAccount");
      commit('SET_USER',null)
    }
  },
  modules: {
  }
})
