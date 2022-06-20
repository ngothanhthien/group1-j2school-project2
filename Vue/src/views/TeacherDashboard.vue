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
        link: "/user"
    },
    {
        title: t("history"),
        icon: HistoryIcon,
        link: "/user/history"
    },
];
//const props=defineProps([])
</script>

<template>
    <div class="bg-skin-background">
        <!-- Navigation drawer -->
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
                        <div class="first-letter:capitalize">
                            {{ $t("hello") }}, Ngô Thanh Thiên!
                        </div>
                    </div>
                </div>
                <div class="py-2 px-2">
                    <div v-for="tab in navigationDrawer">
                        <router-link :to="tab.link"
                            class="cursor-pointer flex items-center font-medium px-4 py-2 mb-1.5 rounded-full"
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
        <div>
            <router-view></router-view>
        </div>
    </div>
</template>
<style scoped>
.router-link-exact-active{
    @apply font-medium text-skin-primary bg-skin-primary30
}
</style>
