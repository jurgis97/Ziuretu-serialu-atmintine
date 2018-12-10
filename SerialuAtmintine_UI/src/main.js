// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import router from './router'
import Axios from 'axios'
import auth from './packages/auth/Auth'
import Vuex from 'vuex'

Vue.config.productionTip = false
Vue.use(Axios)
Vue.use(auth)
Vue.use(Vuex)

const store = new Vuex.Store({
  state: {
    logedIn: false
  },
  mutations: {
    doLogIn(state, value) {
      state.logedIn = value
    }
  }
})

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  components: { App },
  template: '<App/>',
  store,
})
