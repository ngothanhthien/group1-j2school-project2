import { defineStore } from 'pinia'

export const useAttendanceStore = defineStore({
  id: 'attendance',
  state: () => ({
    subject: null,
    room: null,
  }),
//   getters: {
//     doubleCount: (state) => state.counter * 2
//   },
  actions: {
    increment() {
      this.counter++
    }
  }
})