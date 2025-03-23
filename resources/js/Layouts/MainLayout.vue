<template>
    <Link href="/listing"> Listings </Link>
    <Link href="/listing/create"> New Listing </Link>
    <div v-if="flashSuccess" class="success">
        {{ flashSuccess }}
    </div>
    <slot></slot>
</template>

<script setup>
import { computed } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';

const page = usePage();
const flashSuccess = computed(() => page.props.flash.success);
</script>

<style scoped>
    .success {
        background-color: green;
        color: white;
    }
</style>