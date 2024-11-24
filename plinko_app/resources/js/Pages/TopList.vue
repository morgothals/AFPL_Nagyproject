<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import axios from 'axios';
</script>

<template>

  <Head title="Plinko" />
  <div>
    <div v-if="isLoading">
    </div>
    <component v-else :is="layout">
      <template #header>
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
          A legjobb játékosaink:
        </h2>
      </template>
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
                  <td>{{ index + 1 }}</td>
                  <td>{{ user.name }}</td>
                  <td>{{ formatCurrency(user.balance, 'HUF') }}</td>
                </tr>
              </tbody>
            </table>


          </div>
        </div>
      </div>
    </component>
  </div>

</template>


<script>
export default {
  name: 'App',
  components: {
    GuestLayout,
    AuthenticatedLayout,
  },
  data() {
    return {
      users: [],
      status: [],
      isAuthenticated: false,
      isLoading: true,
    };
  },
  computed: {
    layout() {
      return this.isAuthenticated ? AuthenticatedLayout : GuestLayout;
    },
  },
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
  mounted() {
    axios.get('/api/topusers') // Kérés a PHP API-hoz
      .then(response => {
        this.users = response.data.topusers; // A válaszból átvesszük a tömböt
      })
      .catch(error => {
        console.log('Error fetching data:', error);
      });
    axios.get('/api/auth/status')
      .then((response) => {
        this.status = response;
        this.isAuthenticated = this.status.data.authenticated
      })
      .catch((error) => {
        console.error('Error fetching data:', error);
      })
      .finally(() => {
        this.isLoading = false;
      });
  },
};
</script>
