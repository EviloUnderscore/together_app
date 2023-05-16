<script setup>
defineProps({
    category: Object
})
</script>

<template>
    <div class="shrink-0 w-1/4 flex flex-col justify-center items-center">
        <a href="#" class="w-16 h-16 rounded-full overflow-hidden">
            <img :src="'images/' + category.image" alt="" class="category h-full">
        </a>
        <p class="text-slate-50 text-sm">{{ category.name }}</p>
    </div>
</template>

<style>
.category {
    object-fit: cover;
}
</style>