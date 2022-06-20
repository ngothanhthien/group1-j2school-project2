import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path:"/",
      name:"Login",
      component: ()=>import('../views/Login.vue'),
    },
    {
      path:"/user",
      name:"UserDashboard",
      component: ()=>import('../views/TeacherDashboard.vue'),
      children: [
        {
          path:'',
          component: ()=>import('../views/TeacherDashboard/Attendance.vue')
        },
        {
          path:'history',
          component: ()=>import('../views/TeacherDashboard/History.vue')
        }
      ]
    },
    {
      path:"/test",
      name:"Test",
      component: ()=>import('../views/Test.vue'),
    }
  ]
})

export default router
