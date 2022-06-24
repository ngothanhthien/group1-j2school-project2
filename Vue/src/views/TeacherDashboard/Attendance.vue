<script setup>
import { ref } from "vue";
import { useAttendanceStore } from "@/stores/attendance";
import BookIcon from "@/components/icons/BookIcon.vue";
import ClassIcon from "@/components/icons/ClassIcon.vue";
import SelectBox from "@/components/SelectBox.vue";
import RadioButtonGroup from "@/components/RadioButtonGroup.vue";
import StatusStudent from "@/components/StatusStudent.vue";
import DayOffStudent from "@/components/DayOffStudent.vue";
import { useI18n } from "vue-i18n";
const { t } = useI18n();
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
const attendanceOption = [
    {
        title: t("onSchool"),
        value: 1,
    },
    {
        title: t("offSchool"),
        value: 0,
    },
    {
        title: t("offSchoolWithReason"),
        value: 2,
    },
];
let rooms = ref(null);
const students = {
    BKD123: {
        name: "Nguyễn Minh Phúc",
        status: 1,
        totalOff: 0,
        attendance: ref(1),
    },
    BKD124: {
        name: "Ngô Bảo Châu",
        status: 2,
        totalOff: 1,
        attendance: ref(1),
    },
    BKD125: {
        name: "Lê Minh Khả",
        status: 0,
        totalOff: 5,
        attendance: ref(1),
    },
};
const today = 14;
const subjectSelected = (v) => {
    store.subject = v;
    store.room = null;
    rooms.value = ["BKD01", "BKD02", "BKD03"];
    roomKey.value++; //to refresh component
};
const roomSelected = (v) => {
    store.room = v;
};
const roomKey = ref(0); //to refresh component
const radioModel= (value)=>{
    console.log(1);
}
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
                :isDisable="store.subject == null"
                @selected="roomSelected"
                :default="$t('room')"
                :options="rooms"
                :icon="ClassIcon"
            />
        </div>
    </div>
    <!-- attendance table -->
    <div
        v-if="store.room != null && store.subject != null"
        class="border rounded-xl overflow-hidden mt-2"
    >
        <table class="table-auto w-full">
            <thead>
                <tr class="bg-skin-neutral10 text-left">
                    <th>
                        {{ $t("identify") }}
                    </th>
                    <th>
                        {{ $t("fullName") }}
                    </th>
                    <th>
                        {{ $t("attendance") }}
                    </th>
                    <th>
                        {{ $t("dayOff") }}
                    </th>
                    <th>
                        {{ $t("status") }}
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y-[0.5px]">
                <tr v-for="(student, id) in students" :key="id">
                    <td>{{ id }}</td>
                    <td>{{ student.name }}</td>
                    <td>
                        <RadioButtonGroup v-model:value="student.attendance" class="flex" :name="id" :options="attendanceOption" />
                    </td>
                    <td>
                        <DayOffStudent
                            :today="today"
                            :dayOff="student.totalOff"
                        />
                    </td>
                    <td>
                        <StatusStudent :status="student.status" />
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<style scoped>
td {
    @apply py-2 px-4 first-letter:capitalize;
}
th {
    @apply px-4 py-2 first-letter:capitalize;
}
</style>
