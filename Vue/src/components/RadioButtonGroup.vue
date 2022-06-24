<script setup>
import {ref,watch} from 'vue'
const props = defineProps(["options","name","value"]);
const emit=defineEmits(["getValue"])
const groupValue=ref(props.value);
</script>

<template>
    <div>
        <label class="flex items-center cursor-pointer mr-2" v-for="option in options">
            <input
                class="hidden peer"
                type="radio"
                :name="name"
                :value="option.value"
                v-model="groupValue"
            />
            <div
                class="w-3 h-3 border border-skin-onSurface30 rounded-full peer-checked:bg-skin-primary peer-checked:border-none"
            ></div>
            <div
                class="ml-0.5 peer-checked:text-skin-primary first-letter:capitalize"
            >
                {{ option.title }}
            </div>
        </label>
    </div>
</template>
