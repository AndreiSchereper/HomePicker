<template>
    <div>
        <span class="font-bold">{{ listing.bedrooms }}</span> beds <span class="text-gray-400">| </span>
        <span class="font-bold">{{ listing.bathrooms }}</span> baths <span class="text-gray-400">| </span>
        <span class="font-bold">{{ listing.area }}</span> m²
    </div>
</template>

<script setup>
    defineProps({
        listing: Object
    });
</script>