<template>
    <div>
        <h1>Listings</h1>
        <div v-for="listing in listings" :key="listing.id">
            <div>
                <Link :href="`/listing/${listing.id}`">
                    <ListingAddress :listing="listing" />
                </Link>
            </div>
            <div>
                <Link :href="`/listing/${listing.id}/edit`">Edit</Link>
            </div>
            <div>
                <Link :href="`/listing/${listing.id}`" method="delete" as="button">Delete</Link>
            </div>
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