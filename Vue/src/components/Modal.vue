<script setup>
//import {ref} from 'vue'
import CloseIcon from "@/components/icons/CloseIcon.vue";
//const props=defineProps([])
</script>

<template>
    <div class="relative z-20 py-4 px-3 bg-white shadow-md rounded">
        <div class="absolute right-1 top-1 cursor-pointer hover:bg-skin-neutral5">
            <CloseIcon class="w-5 h-5 fill-current" />
        </div>
        <div>
            <slot name="header"></slot>
        </div>
        <div>
            <slot name="body"></slot>
        </div>
        <div class="mt-4">
            <slot name="footer"></slot>
        </div>
    </div>
</template>