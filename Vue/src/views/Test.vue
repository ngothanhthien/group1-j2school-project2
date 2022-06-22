<script setup>
//import {ref} from 'vue'
import RadioBox from "@/components/RadioBox.vue";
import StatusStudent from "@/components/StatusStudent.vue";
import DayOffStudent from "@/components/DayOffStudent.vue";
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
//const props=defineProps([])
</script>
<template>
    <div class="border rounded-xl">
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
                        <DayOffStudent :today="today" :dayOff="student.totalOff" />
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
    @apply py-1 px-2 first-letter:capitalize;
}
th {
    @apply px-2 py-2 first-letter:capitalize;
}
</style>
