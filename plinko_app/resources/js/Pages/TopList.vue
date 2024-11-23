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

          <table v-if="users.length" border="1" cellspacing="0" cellpadding="10">
      <thead>
        <tr>
          <th>#</th>
          <th>Név</th>
          <th>Egyenleg</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(user, index) in users" :key="user.id">
          <td>{{  index + 1  }}</td>
          <td>{{ user.name }}</td>
          <td>{{ formatCurrency(user.balance, 'HUF') }}</td>
        </tr>
      </tbody>
    </table>


        </div>
      </div>
    </div>

  </GuestLayout>
</template>


<script>
export default {
  methods: {
    formatCurrency(value, currency = 'HUF') {
      const roundedValue = Math.round(value);
      return new Intl.NumberFormat('hu-HU', {
        minimumFractionDigits: 0,
        style: 'currency',
        currency: currency, 
      }).format(roundedValue);
    }
  },
  data() {
    return {
      users: [], // A tömb tárolása
    };
  },
  mounted() {
    axios.get('/api/topusers') // Kérés a PHP API-hoz
      .then(response => {
        this.users = response.data.topusers; // A válaszból átvesszük a tömböt
      })
      .catch(error => {
        console.log('Error fetching data:', error);
      });
  },
};
</script>
