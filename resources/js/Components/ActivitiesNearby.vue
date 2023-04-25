<script setup>
import Activity from './Activity.vue';
defineProps({
    activities: Array,
})
</script>

<template>
    <div class="mt-8">
        <h2 class="font-bold text-2xl text-slate-50 leading-tight">Activités à proximité</h2>
        <div class="mt-4 flex gap-4 overflow-auto activities">
            <template v-for="activity of activities">
                <Activity :activity="activity"/>
            </template>
        </div>
    </div>
</template>

<style>
.activities{
    height: 40vh;
}
</style>