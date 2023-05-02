import { defineStore } from "pinia";

export const useLocationStore = defineStore({
    id: 'locationStore',
    state: () => ({
      position: []
    }),
    getters: {
    },
    actions: {
      async fetchLocation() {
          try {
            this.position = await new Promise((resolve, reject) => {
              navigator.geolocation.getCurrentPosition(resolve, reject)
            })
          } catch (error) {
            console.error(error)
          }
        }
    }
})