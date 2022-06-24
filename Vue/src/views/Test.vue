<script setup>
//import {ref} from 'vue'
import Modal from "@/components/Modal.vue";
import GroupIcon from "@/components/icons/GroupIcon.vue";
import ClockIcon from "@/components/icons/ClockIcon.vue";
//const props=defineProps([])
</script>

<template>
    <div class="w-64 text-xl">
        <Modal class="">
            <template v-slot:body>
                <div class="flex items-center justify-center mb-2">
                    <div><ClockIcon class="w-6 h-6 fill-current" /></div>
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
                <div
                    class="font-medium text-skin-dark-secondary text-3xl text-center flex items-center justify-center"
                >
                    <div>18/25</div>
                    <div class="ml-2">
                        <GroupIcon class="w-10 h-10 fill-current" />
                    </div>
                </div>
            </template>
            <template v-slot:footer>
                <div class="flex justify-center">
                    <div
                        class="mr-2 text-skin-primary first-letter:capitalize font-medium cursor-pointer hover:bg-skin-neutral5 py-1 px-2"
                    >
                        {{ $t("confirm") }}
                    </div>
                    <div
                        class="first-letter:capitalize font-medium cursor-pointer opacity-60 hover:bg-skin-neutral5 py-1 px-2"
                    >
                        {{ $t("cancel") }}
                    </div>
                </div>
            </template>
        </Modal>
    </div>
</template>
