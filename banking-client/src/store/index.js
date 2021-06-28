import Vue from 'vue'
import Vuex from 'vuex'
import { getField, updateField } from 'vuex-map-fields';
import axios from 'axios'

Vue.use(Vuex)

export default new Vuex.Store({
  state: { //username i token
    user:null,
    token:''
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
       localStorage.setItem("bankingAccount",JSON.stringify(data));

      commit('SET_USER',data)
    },
    checkAuth({commit}){
      const t = localStorage.getItem("bankingAccount");
      if(t){
        commit('SET_USER',JSON.parse(t))
      }
    },
    logOut({commit}){
      axios.post('http://127.0.0.1:8000/api/logout',{ headers: { Authorization: `Bearer ${this.state.token}`}})
      localStorage.removeItem("bankingAccount");
      commit('SET_USER',null)
    }
  }
})
