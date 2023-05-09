import { defineStore } from "pinia";

export const useLocationStore = defineStore({
    id: 'locationStore',
    state: () => ({
      position: []
    }),
    getters: {
      getCoords(){
        return this.position.coords
      }
    },
    actions: {
      async fetchLocation() {
          try {
            this.position = await new Promise((resolve, reject) => {
              navigator.geolocation.getCurrentPosition(resolve, reject)
            });
            console.log('FETCH LOCATION');
            console.log(this.position);
          } catch (error) {
            console.error(error)
          }
        }
    }
})