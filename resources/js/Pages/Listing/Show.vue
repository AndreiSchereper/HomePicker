<template>
    <ListingAddress :listing="listing" />
</template>

<script setup>
import ListingAddress from '@/Components/ListingAddress.vue';

    defineProps({
        listing: {
            type: Object
        }
    });
</script>