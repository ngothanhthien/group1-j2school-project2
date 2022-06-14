<script setup>
//import {ref} from 'vue'
import LockIcon from "../components/icons/LockIcon.vue";
import UserIcon from "../components/icons/UserIcon.vue";
//const props=defineProps([])
</script>

<template>
    <div
        class="relative w-full h-screen bg-cover bg-no-repeat"
        style="
            background-image: url('../../public/img/background-user-login.webp');
        "
    >
        <div
            class="absolute -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 flex flex-col w-full max-w-md px-4 py-8 bg-white rounded-lg shadow dark:bg-gray-800 sm:px-6 md:px-8 lg:px-10"
        >
            <div class="self-center mb-5 text-xl font-light sm:text-2xl">
                Đăng nhập
            </div>
            <div>
                <form action="#" autoComplete="off">
                    <div class="flex flex-col mb-2">
                        <div class="flex relative">
                            <span
                                class="rounded-l-md inline-flex items-center px-3 border-t bg-white border-l border-b border-gray-300 shadow-sm text-sm"
                            >
                                <UserIcon class="w-5 h-5 fill-current" />
                            </span>
                            <input
                                type="text"
                                class="rounded-r-lg flex-1 appearance-none border text-skin-base border-gray-300 w-full py-2 px-4 bg-white placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-skin-primary focus:border-transparent"
                                placeholder="Tài khoản"
                            />
                        </div>
                    </div>
                    <div class="flex flex-col mb-6">
                        <div class="flex relative">
                            <span
                                class="rounded-l-md inline-flex items-center px-3 border-t bg-white border-l border-b border-gray-300 shadow-sm text-sm"
                            >
                                <LockIcon class="w-5 h-5 fill-current" />
                            </span>
                            <input
                                type="password"
                                id="sign-in-email"
                                class="rounded-r-lg flex-1 text-skin-base appearance-none border border-gray-300 w-full py-2 px-4 bg-white placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-skin-primary focus:border-transparent"
                                placeholder="Mật khẩu"
                            />
                        </div>
                    </div>
                    <div class="flex items-center mb-4 -mt-4">
                        <div class="flex ml-auto">
                            <a
                                href="#"
                                class="inline-flex text-xs font-thin sm:text-sm text-skin-base"
                            >
                                Quên mật khẩu?
                            </a>
                        </div>
                    </div>
                    <div class="flex w-full">
                        <button
                            type="submit"
                            class="py-2 px-4 bg-skin-primary hover:bg-skin-primary-hover text-white w-full transition text-center text-base font-semibold shadow-md rounded-lg"
                        >
                            Đăng nhập
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
