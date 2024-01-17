<script setup>
import { Head } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import ResponsiveNavLink from '@/Components/Table.vue';
</script>

<template>
    <Head title="user" />
    
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">User</h2>
        </template>

        <div class="py-0">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">You're logged in!</div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
