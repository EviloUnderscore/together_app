<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { router } from '@inertiajs/vue3';
import { reactive } from 'vue';
import { useActivitiesStore } from '../stores/activitiesStore';

const activitiesStore = useActivitiesStore();

defineProps({
  categories: {
    type: Object,
    required: true,
  }
});

function submit() {

    // Generate a datetime object based on the date input and the time input in HTML
    let storeDate = new Date(form.date);
    const [inputHours, inputMinutes] = form.time.split(':');
    storeDate.setHours(inputHours);
    storeDate.setMinutes(inputMinutes)

    router.post('store', {
        name: form.name,
        description: form.description,
        location: form.location,
        date: storeDate,
        user_id: 1,
        category_id: form.categoryID,
        image: 'img2.jpg'
    })
}

const form = reactive({
    name: '',
    categoryID: 1,
    date: new Date(),
    time: '',
    location: '',
    description: '',
})

</script>

<template>
    <AppLayout title="Détails">
        <div class="pb-20">
            <section class="relative">
                <div class="header-section">
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
            </section>
            <section class="pt-20">
                <form @submit.prevent="submit" method='post' enctype="multipart/form-data">
                    <span hidden>@csrf</span>
                    
                    <div class="input-form">
                        <label for="title">Titre</label>
                        <input type="text" id="title" name="title" placeholder="Titre de l'activité" v-model="form.name">
                    </div>
                    <div class="input-form">
                        <label for="category_id">Catégories</label>
                        <select name="category_id" id="category_id" v-model="form.categoryID">
                            <template v-for="category of categories">
                                <option :value="category.id">{{ category.name }}</option>
                            </template>
                        </select>
                    </div>
                    <div class="input-form">
                        <label for="date">Date</label>
                        <input type="date" id="date" name="date" v-model="form.date">
                    </div>
                    <div class="input-form">
                        <label for="time">Heure</label>
                        <input type="time" id="time" name="time" v-model="form.time">
                    </div>
                    <div class="input-form">
                        <input type="file" name="file" id="file">
                    </div>
                    <div class="input-form">
                        <label for="location">Lieu (Ville)</label>
                        <input type="text" id="location" name="location" placeholder="Lieu de l'activité" v-model="form.location">
                    </div>
                    <div class="input-form">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" placeholder="Description" v-model="form.description">

                        </textarea>
                    </div>
                    <div class="input-form">
                        <input type="submit" class="bg-cyan-900 py-5 rounded-md text-slate-50 text-3xl font-black" value="Créer l'activité">
                    </div>
                </form>
            </section>
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

.transition{
    width: 100%;
    height: 8vh;
}

.fill{
    fill: currentColor;
}

.input-form{
    display: flex;
    flex-direction: column;
    margin: 4vh;
}

</style>
