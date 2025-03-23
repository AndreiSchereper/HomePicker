<template>
    <div>
        <h1>Listings</h1>
        <div v-for="listing in listings" :key="listing.id">
            <Link :href="`/listing/${listing.id}`">
                <ListingAddress :listing="listing" />
            </Link>
        </div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import ListingAddress from '@/Components/ListingAddress.vue';
    defineProps({
        listings: {
            type: Array
        }
    });
</script>