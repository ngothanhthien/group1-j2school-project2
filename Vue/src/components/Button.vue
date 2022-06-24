<script setup>
//import {ref} from 'vue'
// const props=defineProps([])
</script>

<template>
    <button
        @click="$emit('buttonClick')"
        class="first-letter:capitalize py-2 px-4 hover:opacity-high text-white w-full transition text-center text-base font-semibold shadow-md rounded-lg"
    >
        <slot></slot>
    </button>
</template>
