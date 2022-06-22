<script setup>
//import {ref} from 'vue'
const props=defineProps(["status"])
</script>

<template>
    <div class="text-skin-success font-medium" v-if="props.status==1">{{ $t("onGoingStatus") }}</div>
    <div class="text-skin-error font-medium" v-else-if="props.status==0">{{ $t("leaveStatus") }}</div>
    <div class="text-gray-500 font-medium" v-else-if="props.status==2">{{$t("retainStatus")}}</div>
</template>