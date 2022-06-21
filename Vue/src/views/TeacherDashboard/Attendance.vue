<script setup>
import {ref} from 'vue'
import { useAttendanceStore } from "@/stores/attendance";
import BookIcon from "@/components/icons/BookIcon.vue";
import ClassIcon from "@/components/icons/ClassIcon.vue";
import SelectBox from "@/components/SelectBox.vue";
//const props=defineProps([])
const store = useAttendanceStore();
// store.$subscribe((mutation,state) =>{
//     if(store.subject!=null&&store.room==null){
//         return
//     }
// })
const subjects = [
    "Tin học đại cương",
    "Lập trình hướng đối tượng",
    "Lập trình web",
];
let rooms = ref(null);
const subjectSelected = (v) => {
    store.subject = v;
    store.room=null;
    rooms.value = ["BKD01", "BKD02", "BKD03"]
    roomKey.value++; //to refresh component
};
const roomSelected = (v) => {
    store.room = v;
};
const roomKey=ref(0); //to refresh component
</script>

<template>
    <!-- Select Box -->
    <div class="flex">
        <div class="mr-2">
            <SelectBox
                :isDisable="false"
                @selected="subjectSelected"
                :default="$t('subject')"
                :options="subjects"
                :icon="BookIcon"
            />
        </div>
        <div>
            <SelectBox
                :key="roomKey"
                :isDisable="store.subject==null"
                @selected="roomSelected"
                :default="$t('room')"
                :options="rooms"
                :icon="ClassIcon"
            />
        </div>
    </div>
    <!-- attendance table -->
    <div v-if="store.room!=null&&store.subject!=null">
        
    </div>
</template>
