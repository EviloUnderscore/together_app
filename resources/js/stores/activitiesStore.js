import { defineStore } from "pinia";
import axios from 'axios';

export const useActivitiesStore = defineStore({
    id: 'activitiesStore',
    state: () => ({
        activities: []
    }),
    getters: {
        getActivitiesSortedByDistance(){
          return this.activities.sort((a, b) => a.distance - b.distance);
        },
        getActivitiesSortedByDate(){
          return [...this.activities].sort((a, b) => new Date(a.date) - new Date(b.date));
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