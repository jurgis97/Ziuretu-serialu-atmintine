import Vue from 'vue'
import Router from 'vue-router'
import Series from '../components/Series'
import Main from '../components/Main'
import Login from '../components/Login'
import SeriesEdit from '../components/SeriesEdit'
import SeriesCreate from '../components/SeriesCreate'
import SeriesPreview from '../components/SeriesPreview'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/Series',
      component: Series
    },
    {
      path: '/',
      component: Main
    },
    {
      path: '/Login',
      component: Login
    },
    {
      path: '/Create',
      component: SeriesCreate
    },
    {
      path: '/edit/:series_id',
      name: 'editSeries',
      component: SeriesEdit
    },
    {
      path: '/Preview/:series_id',
      name: 'previewSeries',
      component: SeriesPreview
    },

  ]
})