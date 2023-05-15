<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Filter from '../Components/Filter.vue';
import ActivitiesNearby from '../Components/ActivitiesNearby.vue';
import ActivitiesNext from '../Components/ActivitiesNext.vue';
import Sports from '../Components/Sports.vue';

import { useLocationStore } from '../stores/locationStore';
import { useActivitiesStore } from '../stores/activitiesStore';
import { computed, onBeforeMount, onServerPrefetch } from 'vue';

const locationStore = useLocationStore();
const activitiesStore = useActivitiesStore();

defineProps({
    categories: Array,
})

const activitiesByDistance = computed(() => activitiesStore.getActivitiesSortedByDistance);
const activitiesByDate = computed(() => activitiesStore.getActivitiesSortedByDate);

async function fetchActivities() {
    const coords = await locationStore.getCoords;
    activitiesStore.fetchActivities(coords);
}

onBeforeMount(async () => {
    locationStore.fetchLocation().then(() => {
        fetchActivities();
    })
});

</script>

<template>
    <AppLayout title="Home">
        <template #header>
            <h2 class="font-bold text-5xl text-slate-50 leading-tight pl-8">
                Together
            </h2>
            <a :href="route('create')" class="absolute top-4 right-20 bg-slate-50 p-3 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
            </a>
        </template>
        <div class="pl-8 pb-24">
            
            <Filter/>

            <Sports :categories="categories"/>

            <ActivitiesNearby :activities="activitiesByDistance"/>

            <ActivitiesNext :activities="activitiesByDate"/>
        </div>   
    </AppLayout>
</template>

