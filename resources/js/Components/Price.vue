<template>
    <span>
        {{ formattedPrice }}
    </span>
</template>

<script setup>
import {computed} from 'vue';
const props = defineProps({
    price: {
        type: [Number, String],
        required: true
    }    
});
const formattedPrice = computed(() => 
    Number(props.price).toLocaleString('nl-NL', {
        style: 'currency',
        currency: 'EUR',
        maximumFractionDigits: 0,
    }),
);
</script>