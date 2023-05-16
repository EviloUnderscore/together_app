<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

defineProps({
  activity: {
    type: Object,
    required: true,
  }
});

</script>
<template>
    <AppLayout title="Détails">
        <div class="pb-20">
            <section class="relative">
                <div class="header-section">
                    <a class="absolute top-4 right-20 bg-slate-50 p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                        </svg>
                    </a>
                    <a class="absolute top-4 right-4 bg-slate-50 p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
                        </svg>
                    </a>
                    <a  :href="route('dashboard')" class="absolute top-6 text-slate-50 left-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                        </svg>
                    </a>
                </div>

                <div class="title-section">
                    <div class="h-8 text-3xl font-bold items-center flex mb-6">
                        <p class="text-slate-50">
                            {{ activity.name }}
                        </p>
                    </div>
                    <div class="bg-slate-50 px-2 rounded-md text-green-500 h-8 text-lg font-medium items-center flex">
                        <p>
                            {{ activity.location }}, à {{ activity.distance }}km
                        </p>
                    </div>
                </div>
                <img :src="'images/' + activity.image" alt="" class="max-w-none overflow-hidden nearby">
            </section>
            <section>
                <div class="transition bg-cyan-600 flex justify-between px-8 items-center">
                    <div class="text-xl text-slate-50 font-bold">{{ new Date(activity.date).toLocaleDateString('fr-FR', {day: 'numeric', month: 'numeric', year: 'numeric'}) }}</div>
                    <div class="text-xl bg-slate-50 rounded-md px-2 text-cyan-600 font-bold">{{ activity.category.name }}</div>
                </div>
                <div>
                    <p class="text-3xl text-slate-50 font-extrabold pl-4 my-4">{{ activity.name }}</p>
                    <p class="text-lg text-slate-50 font-normal pl-4 my-4">{{ new Date(activity.date).toLocaleDateString('fr-FR', {day: 'numeric', month: 'numeric', year: 'numeric'}) }}</p>
                    <p class="text-xl text-slate-50 font-medium pl-4 my-4">{{ activity.description }}</p>
                    <p class="text-xl text-slate-50 font-medium pl-4 mt-12">{{ activity.location }}</p>
                </div>
                <div class="text-xl text-slate-50 font-medium pl-4 mt-4">
                    <p>Organisé par</p>
                    <img src="../../../public/storage/assets/img/img-tennis.jpg" alt="" class="w-16 h-16 rounded-full profile-img my-2">
                    <p>
                        {{ activity.user.name }}
                    </p>
                </div>
                <div class="flex pl-4 text-yellow-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="fill w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="fill w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="fill w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="fill w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                    </svg>
                </div>
            </section>
            <section></section>
        </div>
    </AppLayout> 
</template>

<style>
.nearby {
    width: 100%;
    aspect-ratio: 1/1;
    object-fit:cover;
}

.header-section{
    position: absolute;
    width: 100%;
    height: 9vh;
    top: 0;
    background-color: rgba(0, 0, 0, 0.2);
}

.title-section{
    position: absolute;
    padding: 0 5vw;
    height: 8vh;
    bottom: 3vh;
}

.transition{
    width: 100%;
    height: 8vh;
}

.profile-img{
    object-fit: cover;
}

.fill{
    fill: currentColor;
}
</style>
