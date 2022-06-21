<script setup>
//import {ref} from 'vue'
import SelectBox from '@/components/SelectBox.vue'
import BookIcon from '@/components/icons/BookIcon.vue'
//const props=defineProps([])
</script>
<template>
    <SelectBox default="test" :options="[1,2,3]" :icon="BookIcon" />
</template>
