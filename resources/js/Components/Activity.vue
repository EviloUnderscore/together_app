<script setup>

import { computed } from 'vue';
defineProps({
    activity: {
      type: Object,
      required: true
    }
})

</script>

<template>
    <div class="shrink-0 w-2/3 flex flex-col justify-center bg-cyan-700 rounded-xl overflow-hidden shadow-md">
        <div class="relative h-1/2 text-lg font-extrabold">
            <div class="absolute top-4 right-2 bg-slate-50 p-3 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
                </svg>
            </div>
            <div class="absolute top-4 left-2 bg-slate-50 px-2 rounded-xl text-cyan-700">Randonnée</div>
            <div class="absolute bottom-4 right-2 text-slate-50">{{ activity.date }}</div>
            <img src="../../../public/storage/assets/img/img2.jpg" alt="" class="max-w-none overflow-hidden nearby">
        </div>
        <div class="h-1/2 w-full mx-2 text-slate-50 text-lg flex flex-col pb-4">
            <p class="py-4 text-xl font-extrabold">{{ activity.name }}</p>

            <div class="description text-green-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                </svg>
                <p>{{ activity.location }}, 10km</p>
            </div>

            <div class="description">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                </svg>
                <p>Patrick</p>
            </div>

            <div class="description">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                </svg>
                <p>1/5 participant(s)</p>
            </div>

            <button type="button" class="bg-green-500 w-1/3 px-8 py-0 rounded-lg">Infos</button>
        </div>
    </div>
</template>

<style>
.nearby {
    width: 100%;
    aspect-ratio: 3/2;
    object-fit: cover ;
}

button {
    align-self: center;
}

.description {
    display: flex;
    gap: 1vw;
    align-items: center;
}
</style>
