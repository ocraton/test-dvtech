<template>
  <div>
    <h1 class="text-3xl font-bold">Breweries List</h1>

    <BreweriesList />

  </div>
</template>


<script setup>


definePageMeta({
  layout: 'default',
  middleware: 'auth',
})
</script>