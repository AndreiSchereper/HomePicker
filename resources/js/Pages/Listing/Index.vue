<template>
    <div>
        <h1>Listings</h1>
        <div v-for="listing in listings" :key="listing.id">
            <div>
                <Link :href="route('listing.show', listing.id)">
                    <ListingAddress :listing="listing" />
                </Link>
            </div>
            <div>
                <Link :href="route('listing.edit', listing.id)">Edit</Link>
            </div>
            <div>
                <Link :href="route('listing.destroy', listing.id)" method="delete" as="button">Delete</Link>
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