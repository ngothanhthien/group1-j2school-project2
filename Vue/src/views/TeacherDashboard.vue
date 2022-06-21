<script setup>
//import {ref} from 'vue'
import CalendarIcon from "../components/icons/CalendarIcon.vue";
import HistoryIcon from "../components/icons/HistoryIcon.vue";
import { useI18n } from "vue-i18n";
const { t } = useI18n();
const navigationDrawer = [
    {
        title: t("attendance"),
        icon: CalendarIcon,
        link: "/user",
    },
    {
        title: t("history"),
        icon: HistoryIcon,
        link: "/user/history",
    },
];
//const props=defineProps([])
</script>

<template>
    <div class="bg-skin-background grid grid-cols-12">
        <!-- Navigation drawer -->
        <div class="h-screen p-2 col-span-3">
            <div class="bg-skin-surface h-full rounded-lg divide-y">
                <!-- avatar -->
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
                        <div class="first-letter:capitalize">
                            {{ $t("hello") }}, Ngô Thanh Thiên!
                        </div>
                    </div>
                </div>
                <!-- menu item -->
                <div class="py-2 pr-2">
                    <div v-for="tab in navigationDrawer">
                        <router-link
                            :to="tab.link"
                            class="text-skin-base hover:bg-skin-neutral10 cursor-pointer flex items-center font-medium px-4 py-2 rounded-r-full"
                        >
                            <div class="mr-4">
                                <component
                                    :is="tab.icon"
                                    class="w-6 h-6 fill-current"
                                />
                            </div>
                            <div class="first-letter:capitalize">
                                {{ tab.title }}
                            </div>
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-9 h-screen py-2 pr-2">
            <div class="bg-skin-surface h-full rounded-lg p-4">
                <router-view></router-view>
            </div>
        </div>
    </div>
</template>
<style scoped>
.router-link-exact-active {
    @apply font-medium text-skin-primary bg-skin-primary30;
}
</style>
