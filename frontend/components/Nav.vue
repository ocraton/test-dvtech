<template>
    <header class="bg-white">
        <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
            <div class="flex">

                <span class="sr-only">Your Company</span>
                <img class="h-8 w-auto" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=600"
                    alt="">

            </div>
            <div class="hidden lg:flex lg:gap-x-12">
                <NuxtLink to="/" class="text-sm font-semibold leading-6 text-gray-900">Home</NuxtLink>
                <NuxtLink v-if="store.loggedIn" to="/dashboard" class="text-sm font-semibold leading-6 text-gray-900">Dashboard</NuxtLink>
            </div>
            <div class="hidden lg:flex lg:justify-end">
                <NuxtLink to="/auth/login" v-if="!store.loggedIn" class="text-sm font-semibold leading-6 text-gray-900">
                    LogIn <span aria-hidden="true">&rarr;</span></NuxtLink>
                <template v-else>
                    <button @click="logout" class="text-sm font-semibold leading-6 text-gray-900">LogOut <span
                            aria-hidden="true">&rarr;</span></button>
                </template>
            </div>
        </nav>
    </header>

</template>

<script setup>

const store = useMyStore();

const token = useCookie("auth_token");

async function logout() {
        try {
            
            await $fetch('http://localhost/api/logout', {
                method: 'post',
                headers: {
                    Authorization: `Bearer ${token.value}`
                }
            })

            token.value = null

            store.value.loggedIn = false;
            
            navigateTo('/auth/login');

        } catch (error) {
            console.error('Errore durante il logout:', error);
        }
    }


</script>