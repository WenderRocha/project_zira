import { useDark, useToggle } from '@vueuse/core'
import { reactive } from 'vue'
import { Inertia } from '@inertiajs/inertia'
import { useToast } from 'vue-toast-notification'
import 'vue-toast-notification/dist/theme-sugar.css';

const $toast = useToast();

export const isDark = useDark()
export const toggleDarkMode = useToggle(isDark)

export const sidebarState = reactive({
    isOpen: window.innerWidth > 1024,
    isHovered: false,
    handleHover(value) {
        if (window.innerWidth < 1024) {
            return
        }
        sidebarState.isHovered = value
    },
    handleWindowResize() {
        if (window.innerWidth <= 1024) {
            sidebarState.isOpen = false
        } else {
            sidebarState.isOpen = true
        }
    },
})

export const scrolling = reactive({
    down: false,
    up: false,
})

let lastScrollTop = 0

export const handleScroll = () => {
    let st = window.pageYOffset || document.documentElement.scrollTop
    if (st > lastScrollTop) {
        // downscroll
        scrolling.down = true
        scrolling.up = false
    } else {
        // upscroll
        scrolling.down = false
        scrolling.up = true
        if (st == 0) {
            //  reset
            scrolling.down = false
            scrolling.up = false
        }
    }
    lastScrollTop = st <= 0 ? 0 : st // For Mobile or negative scrolling
}

export const defaultDelete = (route, msgConfirm, msgDelete) => {

    Inertia.delete(route, {

        onBefore: () => confirm(msgConfirm),
        onSuccess: (page) => {
            $toast.error(msgDelete, {
                // override the global option
                position: 'top',
                dismissible: true,
                duration: 2300

            })

        },
        onError: (errors) => {
            let message = (errors.message) ?? 'Oops, Algo deu errado'
            $toast.error(message, {
                // override the global option
                position: 'top',
                dismissible: true,
                duration: 2300
            })
        },
    })

}


export const defaultSubmit = (form, route, msgSuccess, close) => {
    form.post(route, {
        onSuccess: (page) => {
            $toast.success(msgSuccess, {
                // override the global option
                position: 'top',
                dismissible: true,
                duration: 2300
            })

            form.reset();
            close()

        },
        onError: (errors) => {
            let message = (errors.message) ?? 'Oops, Algo deu errado'
            $toast.error(message, {
                // override the global option
                position: 'top',
                dismissible: true,
                duration: 2300
            })
        },
    })
}

export const defaultUpdate = (form, route, msgSuccess, close) => {
    form.put(route, {
        onSuccess: (page) => {
            $toast.info(msgSuccess, {
                // override the global option
                position: 'top',
                dismissible: true,
                duration: 2300
            })
            form.reset()
            close()
        },
        onError: (errors) => {
            let message = (errors.message) ?? 'Oops, Algo deu errado'
            $toast.error(message, {
                // override the global option
                position: 'top',
                dismissible: true,
                duration: 2300
            })
        },
    })
}
