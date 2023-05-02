import { defineStore } from "pinia";

export const useLocationStore = defineStore({
    id: 'locationStore',
    state: () => ({
        userLatiture: null,
        userLongitude: null,
    }),
    getters: {

    },
    actions: {
        async fetchLocation() {
            try {
              const position = await new Promise((resolve, reject) => {
                navigator.geolocation.getCurrentPosition(resolve, reject)
              })
              this.userLatitude = position.coords.latitude
              this.userLongitude = position.coords.longitude
            } catch (error) {
              console.error(error)
            }
          }
    }
})