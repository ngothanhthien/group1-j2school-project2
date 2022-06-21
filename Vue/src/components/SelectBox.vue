<script setup>
import { reactive, ref } from "vue";
import ArrowDownIcon from "@/components/icons/ArrowDownIcon.vue";
const props = defineProps(["default", "options", "icon"]);
const selectBox = reactive({
    value: null,
    isShow: false,
});
const select = (v) => {
    // selectBox.value=v;
    console.log(v);
};
const dropdownOpen=()=>{

}
const dropdownClose=()=>{

}
</script>

<template>
    <div class="cursor-pointer">
        <!-- label -->
        <div
            class="border border-skin-onSurface30 rounded-lg p-2 inline-flex items-center select-none"
            @click="selectBox.isShow=!selectBox.isShow"
        >
            <div>
                <component class="w-5 h-5 fill-current" :is="icon"></component>
            </div>
            <div class="mx-2 first-letter:capitalize">{{ default }}</div>
            <div>
                <ArrowDownIcon class="w-5 h-5 fill-current" />
            </div>
        </div>
        <!-- Drop down -->
        <div v-show="selectBox.isShow" class="">
            <div @click="select(null)">{{ default }}</div>
            <div @click="select(option)" v-for="option in options">
                {{ option }}
            </div>
        </div>
    </div>
</template>
