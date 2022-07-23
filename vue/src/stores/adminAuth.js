import { defineStore } from 'pinia'

export const useAdminAuthStore = defineStore({
  id: 'adminAuth',
  state: () => ({
    email:'',
    password: '',
    error:'',
  }),
  actions: {
    clearError() {
      this.error='';
    }
  }
})