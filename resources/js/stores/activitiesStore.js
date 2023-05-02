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

        },
        getActivitiesSortedByDate(){

        }
    },
    actions: {
       async fetchActivities(){
        const locationStore = useLocationStore();
        const { latitude, longitude } = locationStore.position.coords;
       }
    }
})