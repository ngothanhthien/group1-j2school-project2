<script setup>
import { reactive, ref } from "vue";
import {clickOutside} from "@/logic/clickOutside"
import ArrowDownIcon from "@/components/icons/ArrowDownIcon.vue";
const props = defineProps(["default", "options", "icon","isDisable"]);
const emit=defineEmits(["selected"])
const selectBox = reactive({
    value: null,
    isShow: false,
});
const selectBoxElement=ref(null);
const select = (v) => {
    if(props.isDisable){
        return
    }
    selectBox.value=v;
    dropdownClose();
    emit('selected',v);
};
const dropdownOpen = () => {
    selectBox.isShow = true;
};
const dropdownClose = () => {
    selectBox.isShow = false;
};
const dropdownToggle=()=>{
    if(props.isDisable){
        return
    }
    selectBox.isShow = !selectBox.isShow;
}
clickOutside(selectBoxElement,dropdownClose)
</script>

<template>
    <div :class="{'opacity-60':isDisable,'cursor-pointer':!isDisable}" ref="selectBoxElement" class="relative inline-block">
        <!-- label -->
        <div
            class="border border-skin-onSurface30 rounded-lg p-2 inline-flex items-center select-none"
            @click="dropdownToggle"
        >
            <div class="text-skin-primary">
                <component class="w-5 h-5 fill-current" :is="icon"></component>
            </div>
            <div class="mx-2 first-letter:capitalize">
                {{ selectBox.value===null?props.default:selectBox.value }}
            </div>
            <div>
                <ArrowDownIcon class="w-5 h-5 fill-current" />
            </div>
        </div>
        <!-- Drop down -->
        <div
            class="shadow absolute min-w-max w-full rounded z-10 first-letter:capitalize bg-skin-surface"
            v-show="selectBox.isShow"
        >
            <div
                class="px-2 py-1 hover:bg-skin-neutral10 "
                @click="select(null)"
            >
                {{ default }}
            </div>
            <div
                :class="{'bg-skin-primary10':option==selectBox.value, 'hover:bg-skin-neutral10':option!=selectBox.value}"
                class="px-2 py-1"
                @click="select(option)"
                v-for="option in options"
            >
                {{ option }}
            </div>
        </div>
    </div>
</template>
