<template>
    <Link href="/listing"> Listings </Link>
    <Link href="/listing/create"> New Listing </Link>
    <div class="text-2xl text-blue-500 font-bold">Hello</div>
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
