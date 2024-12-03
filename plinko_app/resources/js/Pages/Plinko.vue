<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>


<template>

  <Head title="Plinko" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
        Plinko Játék
      </h2>
    </template>



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <div>
      <plinko-game></plinko-game>
    </div>
  </AuthenticatedLayout>
</template>

<script>
import PlinkoGame from '../Components/PlinkoGame.vue';
export default {
  components: {
    PlinkoGame,
  },
};
</script>
