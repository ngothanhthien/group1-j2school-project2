<script setup>
//import {ref} from 'vue'
import CalendarIcon from "../components/icons/CalendarIcon.vue";
const navigationDrawer=[
    {
        title: "Điểm danh"
    }
];
//const props=defineProps([])
</script>

<template>
    <div class="bg-skin-background">
        <div class="h-screen p-2">
            <div class="bg-skin-surface h-full w-1/4 rounded-lg divide-y">
                <div class="px-3.5 py-2">
                    <div class="flex">
                        <div>
                            <img
                                src="/img/user-avt.jpg"
                                class="object-cover rounded-full border-2 border-skin-onSurface h-20 w-20"
                            />
                        </div>
                    </div>
                    <div>
                        <div>Chào, Ngô Thanh Thiên!</div>
                    </div>
                </div>
                <div class="px-3.5 py-2">
                    <div>
                        <div
                            class="cursor-pointer flex items-center text-skin-primary font-medium px-4 py-2 mb-1.5 rounded-full bg-skin-primary30"
                        >
                            <div class="mr-4">
                                <CalendarIcon class="w-6 h-6 fill-current" />
                            </div>
                            <div>Điểm danh</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
