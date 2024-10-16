<template>
  <div>
    <h1 class="text-3xl font-bold">Home Page</h1>



    <div class="flex mt-10">
      <!-- Box per utenti autenticati (loggedIn = true) -->
      <div v-if="store.loggedIn" class="bg-green-100 p-6 rounded-lg shadow-md w-full text-center">
        <h2 class="text-xl font-semibold mb-4">Benvenuto!</h2>
        <p class="mb-4">Sei autenticato. Puoi accedere alla dashboard.</p>
        <NuxtLink to="/dashboard" class="block bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 mb-4">
          Vai alla Dashboard
        </NuxtLink>
      </div>

      <!-- Box per utenti non autenticati (loggedIn = false) -->
      <div v-else class="bg-gray-100 p-6 rounded-lg shadow-md w-full text-center">
        <h2 class="text-xl font-semibold mb-4">Non sei autenticato</h2>
        <p class="mb-4">Effettua il login per accedere ai tuoi contenuti.</p>
        <NuxtLink to="/auth/login" class="block bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">
          Vai al Login
        </NuxtLink>
      </div>
    </div>

  </div>
</template>


<script setup>

const store = useMyStore();

definePageMeta({
  layout: 'default',
})
</script>
