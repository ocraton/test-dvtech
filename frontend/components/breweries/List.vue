<template>

    <div v-if="breweries">

        <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            <li class="col-span-1 divide-y divide-gray-200 rounded-lg bg-white shadow" v-for="brewery in breweries.data"
                :key="brewery.id">
                <div class="flex w-full items-center justify-between space-x-6 p-6">
                    <div class="flex-1 truncate">
                        <div class="flex items-center space-x-3">
                            <h3 class="truncate text-md font-medium text-gray-900">{{ brewery.name }}</h3>
                        </div>
                        <p class="mt-1 truncate text-sm text-gray-500">
                            <span
                                class="inline-flex flex-shrink-0 items-center rounded-full bg-green-50 px-1.5 py-0.5 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">
                                {{ brewery.brewery_type }}
                            </span>
                        </p>
                        <p class="mt-1 truncate text-sm text-gray-500">{{ brewery.state }}</p>
                        <p class="mt-1 truncate text-sm text-gray-500">{{ brewery.city }} ({{ brewery.state_province }})</p>
                    </div>
                </div>
            </li>
        </ul>

    </div>

    <div v-else>
        <p>loading...</p>
    </div>


    <Paginator @change="refetch" :currentPage="currentPage" :perPage="perPage" />

</template>


<script setup>

import { reactive } from 'vue';

const runtimeConfig = useRuntimeConfig()
const store = useMyStore()
const token = useCookie('auth_token')

const currentPage = ref(1)
const perPage = 5;

const { data: breweries, pending, refresh  } = await useAsyncData('breweries', () =>
  $fetch(`http://localhost/api/breweries?page=${currentPage.value}&per_page=${perPage}`, {
    headers: {
      Authorization: `Bearer ${token.value}`,
    }
  }), { defer: true }
);

function refetch(pageNumber){
    currentPage.value = pageNumber
    refresh()
}
</script>