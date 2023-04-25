<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Filter from '../Components/Filter.vue';
import ActivitiesNearby from '../Components/ActivitiesNearby.vue';
import ActivitiesNext from '../Components/ActivitiesNext.vue';
import Sports from '../Components/Sports.vue';

defineProps({
    activities: Array,
    categories: Array,
})

</script>

<template>
    <AppLayout title="Home">
        <template #header>
            <h2 class="font-bold text-5xl text-slate-50 leading-tight">
                Together
            </h2>
        </template>

        <Filter/>

        <Sports :categories="categories"/>

        <ActivitiesNearby :activities="activities"/>

        <ActivitiesNext :activities="activities"/>

    </AppLayout>
</template>

