<script setup>
import { ref } from "vue";
import { useAttendanceStore } from "@/stores/attendance";
import BookIcon from "@/components/icons/BookIcon.vue";
import ClassIcon from "@/components/icons/ClassIcon.vue";
import SelectBox from "@/components/SelectBox.vue";
import RadioBox from "@/components/RadioBox.vue";
import StatusStudent from "@/components/StatusStudent.vue";
import DayOffStudent from "@/components/DayOffStudent.vue";
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
const students = [
    {
        id: "BKD123",
        name: "Nguyễn Minh Phúc",
        status: 1,
        totalOff: 0,
    },
    {
        id: "BKD124",
        name: "Ngô Bảo Châu",
        status: 2,
        totalOff: 1,
    },
    {
        id: "BKD125",
        name: "Lê Minh Khả",
        status: 0,
        totalOff: 5,
    },
];
const today=14;
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
        class="border rounded-xl overflow-hidden"
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
                <tr v-for="student in students" :key="student.id">
                    <td>{{ student.id }}</td>
                    <td>{{ student.name }}</td>
                    <td class="flex">
                        <RadioBox
                            :name="'attendance-' + student.id"
                            :text="$t('onSchool')"
                            value="1"
                            :isChecked="true"
                        />
                        <RadioBox
                            class="ml-2"
                            :name="'attendance-' + student.id"
                            :text="$t('offSchool')"
                            value="0"
                            :isChecked="false"
                        />
                        <RadioBox
                            class="ml-2"
                            :name="'attendance-' + student.id"
                            :text="$t('offSchoolWithReason')"
                            value="2"
                            :isChecked="false"
                        />
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
