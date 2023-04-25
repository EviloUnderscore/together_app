<script setup>
import Sport from './Sport.vue'

defineProps({
    categories: Array,
})

</script>

<template>
    <div class="mt-8 flex gap-2 overflow-auto">
        <template v-for="category of categories">
            <Sport :category="category"/>
        </template>
    </div>
</template>