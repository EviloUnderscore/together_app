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
          this.activities = response.data;
        }).catch(error => {
            console.error(error)
        });
       },
       async fetchLocation(location){
        const urlLocation = location.replace(/ /g, '+');
        
        axios.get(`http://api.openweathermap.org/geo/1.0/direct?q=${urlLocation}&limit=1&appid=b68afb69c2607c15cb4f6bf022f17e25`)
        .then(data => {
          console.log('HERE');
          const { lat, lon } = data[0];
          console.log(`Latitude: ${lat}, Longitude: ${lon}`);
        })
        .catch(error => console.error(error));
       }
    }
})