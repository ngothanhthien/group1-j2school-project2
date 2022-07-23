<script setup>
import {reactive,unref,ref} from 'vue'
import {adminLoginApi} from '@/api'
import {validateEmail} from '@/logic/regex'
import {setCookie} from '@/logic/cookie'
import {ADMIN_TOKEN,ADMIN_INFO} from '@/cookieName'
import EmailIcon from "@/components/icons/EmailIcon.vue"
import LockIcon from "@/components/icons/LockIcon.vue"
const form=reactive({
  email:'',
  password:'',
});
const error=ref('');
const login=async (button)=>{
  if(form.email==''){
    error.value="Email không được để trống";
    return;
  }
  if(form.password==''){
    error.value="Mật khẩu không được để trống";
    return;
  }
  if(!validateEmail(form.email)){
    error.value="Email của bạn không hợp lệ"
    return;
  }
  button.disabled=true;
  button.textContent="Đang đăng nhập..."
  const response=await fetch(adminLoginApi,{
    method: "POST",
    body: JSON.stringify(unref(form)),
    headers:{
      'Content-Type': 'application/json',
      'Accept':'application/json',
    },
  });
  if(response.status==401){
    error.value="Sai tài khoản hoặc mật khẩu";
    button.disabled=false;
    button.textContent="Đăng nhập";
    return;
  }
  //login success
  const responseData=await response.json();
  const EXPIRE_DAY=60;
  setCookie(ADMIN_TOKEN,responseData.token,EXPIRE_DAY);
  setCookie(ADMIN_INFO,responseData.admin,EXPIRE_DAY);
}
const clearError=()=>{
  error.value='';
}
</script>

<template>
  <div
    class="h-screen flex items-center justify-center"
    style="
      background-image: url('/img/adminLogin.webp');
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center center;
    "
  >
    <div
      class="flex flex-col w-full max-w-md px-4 py-8 bg-white rounded-lg shadow sm:px-6 md:px-8 lg:px-10 adminTheme opacity-80"
    >
      <div
        class="self-center mb-3 text-3xl font-light text-gray-600 sm:text-2xl"
      >
        Giáo vụ
      </div>
      <div class="text-skin-error text-center mb-1 select-none">
        &nbsp;{{error}}&nbsp;
      </div>
      <div>
        <form @submit.prevent>
          <div class="flex flex-col mb-2">
            <div class="flex relative">
              <span
                class="rounded-l-md inline-flex items-center px-3 border-t bg-white border-l border-b border-gray-300 text-skin-base shadow-sm text-sm"
              >
                <EmailIcon class="w-5 h-5 fill-current" />
              </span>
              <input
                type="text"
                v-model="form.email"
                class="rounded-r-lg flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-skin-primary focus:border-transparent"
                placeholder="Email"
                @focus="clearError"
              />
            </div>
          </div>
          <div class="flex flex-col mb-6">
            <div class="flex relative">
              <span
                class="rounded-l-md inline-flex items-center px-3 border-t bg-white border-l border-b border-gray-300 text-skin-base shadow-sm text-sm"
              >
                <LockIcon class="h-5 w-5 fill-current" />
              </span>
              <input
                autocomplete="on"
                type="password"
                v-model="form.password"
                class="rounded-r-lg flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-skin-primary focus:border-transparent"
                placeholder="Mật khẩu"
                @focus="clearError"
              />
            </div>
          </div>
          <div class="flex w-full">
            <button
                @click="login($event.target)"
              class="py-2 px-4 bg-skin-primary hover:bg-skin-primary-hover text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md rounded-lg"
            >
              Đăng nhập
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>
