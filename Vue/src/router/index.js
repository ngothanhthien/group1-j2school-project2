import { createRouter, createWebHistory } from 'vue-router'
import AdminLoginView from '../views/AdminLoginView.vue'
import { getCookie } from '../logic/cookie'
import {ADMIN_TOKEN,ADMIN_INFO} from '@/cookieName'
const isAdmin=(to)=>{
  const adminToken = getCookie(ADMIN_TOKEN);
  if(to.name=='AdminLogin'&&adminToken){
    return {name:'AdminDashBoard'}
  }
  if(to.name!='AdminLogin'&&!adminToken){
    return {name:'AdminLogin'}
  }
}
const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/admin',
      name: 'AdminLogin',
      component: AdminLoginView,
      beforeEnter: isAdmin,
    },
    {
      path:'/admin/dashboard',
      name:'AdminDashboard',
      component: ()=>import('@/views/AdminDashboard.vue'),
      beforeEnter: isAdmin,
    },
  ]
})
export default router
