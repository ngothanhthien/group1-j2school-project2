<script setup>
//import {ref} from 'vue'
const props=defineProps(['today','dayOff'])
</script>

<template>
    <div v-if="(dayOff/today)<=0.2" class="text-skin-success">{{dayOff}}/{{today}}</div>
    <div v-else-if="(dayOff/today)>0.2" class="text-yellow-600">{{dayOff}}/{{today}}</div>
    <div v-else-if="(dayOff/today)>0.5" class="text-skin-error">{{dayOff}}/{{today}}</div>
</template>
<style scoped>
    div{
        @apply font-medium
    }
</style>