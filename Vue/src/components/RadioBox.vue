<script setup>
//import {ref} from 'vue'
const props=defineProps(['name','text','value','isChecked'])
</script>

<template>
    <label class="flex items-center cursor-pointer">
        <input class="hidden peer" type="radio" :name="name" :value="value" :checked="isChecked" />
        <div class="w-3 h-3 border border-skin-onSurface30 rounded-full peer-checked:bg-skin-primary peer-checked:border-none"></div>
        <div class="ml-0.5 peer-checked:text-skin-primary first-letter:capitalize">{{text}}</div>
    </label>
</template>
