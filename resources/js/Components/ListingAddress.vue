<template>
    <span>
        {{ listing.city }} {{ listing.street }} {{ listing.house_number }} for ${{ listing.price }}
    </span>
</template>

<script setup>
    defineProps({
        listing: Object
    });
</script>