<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>


<template>

  <Head title="Plinko" />

  <AuthenticatedLayout>
    <div class="flex justify-center items-center h-screen">
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
