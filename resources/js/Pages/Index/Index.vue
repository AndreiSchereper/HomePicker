<template>
        <div>
        <h1>{{ message }}</h1>
    </div>
    <Link href="/hello"> Show pages </Link>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
defineProps({
    message: String
})
</script>