import { defineStore } from "pinia";
import axios from 'axios';
import { useLocationStore } from "./locationStore";

export const useActivitiesStore = defineStore({
    id: 'activitiesStore',
    state: () => ({
        activities: []
    }),
    getters: {
        getActivitiesSortedByDistance(){
          return this.activities.values.slice().sort((a, b) => a.distance - b.distance);
        },
        getActivitiesSortedByDate(){
          return this.activities.values.slice().sort((a, b) => new Date(a.date) - new Date(b.date));
        }
    },
    actions: {
       async fetchActivities(coords){
        axios.get('/api/activities', {
          params: {
            latitude: coords.latitude,
            longitude: coords.longitude
          }
        }).then(response => {
          console.log('RESPONSE');
          console.log(response.data);
          this.activities = response.data;
        }).catch(error => {
            console.error(error)
        });
       }
    }
})