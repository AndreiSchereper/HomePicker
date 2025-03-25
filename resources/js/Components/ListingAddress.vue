<template>
    <span>
        {{ listing.city }} {{ listing.street }} {{ listing.house_number }}
    </span>
</template>

<script setup>
    defineProps({
        listing: Object
    });
</script>