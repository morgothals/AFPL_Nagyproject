<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>

    <Head title="Plinko" />
    <GuestLayout>



        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800">
                    <div style="display: flex; justify-content: center; align-items: center;">
                    <img src="kepek/sor.jpg" class="rounded img-fluid" alt="Beer" style="max-width: 80vmin; ">
                </div>
                    <div class="p-6 text-gray-900 dark:text-gray-100"style="text-align: center;">
                        Hello, ez itt egy Plinko játék ahol akár igazi pénzt is nyerhetsz.
                    </div>
                    <div class="p-6 text-gray-500 dark:text-gray-100"style="text-align: center;">
                        Csak 3 éven felülieknek.
                    </div>
                </div>
            </div>
        </div>

    </GuestLayout>
</template>
