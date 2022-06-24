<script setup>
import { ref } from "vue";
import { useAttendanceStore } from "@/stores/attendance";
import BookIcon from "@/components/icons/BookIcon.vue";
import ClassIcon from "@/components/icons/ClassIcon.vue";
import GroupIcon from "@/components/icons/GroupIcon.vue";
import ClockIcon from "@/components/icons/ClockIcon.vue";
import SelectBox from "@/components/SelectBox.vue";
import RadioButtonGroup from "@/components/RadioButtonGroup.vue";
import StatusStudent from "@/components/StatusStudent.vue";
import DayOffStudent from "@/components/DayOffStudent.vue";
import Button from "@/components/Button.vue";
import { useI18n } from "vue-i18n";
const { t } = useI18n();
const store = useAttendanceStore();
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
const totalStudent = Object.keys(students).length;
const offStudents = ref({});
const totalOnStudent = ref(totalStudent);
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
const studentAttendance = (id) => {
    if (students[id]["attendance"].value == 1) {
        delete offStudents.value[id];
        getTotalOnStudent();
    } else {
        offStudents.value[id] = 1;
        getTotalOnStudent();
    }
};
const getTotalOnStudent = () =>
    (totalOnStudent.value =
        totalStudent - Object.keys(offStudents.value).length);
const attendanceSend = () => {};
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
                        <RadioButtonGroup
                            :value="student.attendance"
                            class="flex"
                            :name="id"
                            :options="attendanceOption"
                            @update:value="studentAttendance(id)"
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
                <tr>
                    <td colspan="5">
                        <div class="w-64 text-xl mx-auto my-2">
                            <!-- time -->
                            <div class="flex items-center justify-center mb-1">
                                <div>
                                    <ClockIcon class="w-6 h-6 fill-current" />
                                </div>
                                <div class="flex items-center">
                                    <div>
                                        <input
                                            class="w-12"
                                            type="text"
                                            value="15:30"
                                        />
                                    </div>
                                    <div>-</div>
                                    <div>
                                        <input
                                            class="w-12"
                                            type="text"
                                            value="17:30"
                                        />
                                    </div>
                                </div>
                            </div>
                            <!-- student count -->
                            <div
                                class="mb-2 font-medium text-skin-dark-secondary text-3xl text-center flex items-center justify-center"
                            >
                                <div class="select-none">
                                    {{ totalOnStudent }}/{{ totalStudent }}
                                </div>
                                <div class="ml-2">
                                    <GroupIcon class="w-10 h-10 fill-current" />
                                </div>
                            </div>
                            <div class="w-40 mx-auto">
                                <Button
                                    @buttonClick="attendanceSend"
                                    class="bg-skin-primary text-white"
                                    >{{ $t("attendance") }}</Button
                                >
                            </div>
                        </div>
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
