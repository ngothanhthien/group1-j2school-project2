import {onMounted,onBeforeUnmount} from 'vue'
export const clickOutside = (el_ref,cb)=>{
    const listener=(e)=>{
        if(e.target==el_ref.value||e.composedPath().includes(el_ref.value)){
            return
        }
        if(typeof cb == 'function'){
            cb();
        }
    }
    onMounted(() => {
        window.addEventListener('click',listener)
    })
    onBeforeUnmount(() => {
        window.removeEventListener('click',listener)
    })
}