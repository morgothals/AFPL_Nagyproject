<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>

  <Head title="Történet" />
  <div>
    <div v-if="isLoading">
    </div>
    <component v-else :is="layout">
      <template #header>
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
          Néhány adat a plinko játékról:
        </h2>
      </template>
      <div class="py-12 bg-gray-50 dark:bg-gray-900">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
          <div class="overflow-hidden bg-white shadow-lg rounded-lg dark:bg-gray-800">
            <div class="p-6 text-gray-900 dark:text-gray-100">
              <h2 class="text-2xl font-bold leading-tight text-blue-600 dark:text-blue-400">
                Néhány adat a Plinko játékról:
              </h2>
              <p class="mt-4 text-sm leading-relaxed text-gray-700 dark:text-gray-300">
                A Plinkót általában 50 000 dollárig játsszák. A versenyző egy ingyenes zsetont kap, és akár további négyet
                    is
                    nyerhet kisebb nyeremények kiosztásával.
                    Minden nyereménynél a versenyzőnek megjelenik egy ár, és ki kell választania, hogy a megjelenített kettő
                    közül
                    melyik számjegy – az első vagy a második – a helyes.
                    A versenyző megnyeri a kis díjat és egy extra zsetont a megfelelő számjegy kiválasztásáért.
                    Az összes elem beárazása után a versenyző egy-egy zsetont helyez egy pegboardra (a babgéphez hasonló
                    stílusban),
                    ahol végül az alul található kilenc mező egyikébe esik.
                    Ezen terek értékei szimmetrikusan vannak elrendezve. Kívülről befelé nézve a sorozat 100–500–1000–0
                    dollár,
                    a
                    középső mező értéke 10 000 dollár.
                    A versenyző megnyeri a megfelelő pénzösszeget, amikor a zseton egy mezőre esik, és a zseton lekerül a
                    tábláról.
                    Ha egy zseton megakad a táblán, akkor az kilazul, és visszakerül a versenyzőhöz, hogy újra leessen. A
                    folyamatot
                    addig ismételjük, amíg a chipkészlet el nem fogy.
                    A Plinko áras játékként 1983 januárjában debütált. Eredetileg a központ 5000 dollárt ért, ami a 25 000
                    dolláros
                    lehetséges fődíjért.
              </p>
            </div>
          </div>
          <div class="mt-8">
            <div class="overflow-hidden bg-white shadow-lg rounded-lg dark:bg-gray-800">
              <div class="p-6 text-gray-900 dark:text-gray-100">
                <h2 class="text-2xl font-bold leading-tight text-blue-600 dark:text-blue-400">Játék menete</h2>
                <p class="mt-4 text-sm leading-relaxed text-gray-700 dark:text-gray-300">
                  Játékunkban minden felhasználó 1000 Forint értékű játékpénzzel kezdi pályafutását. A játékban beállíthatjuk egy labda értékét, 
                    ami aztán a labdát tartalmazó rekesz értékével került beszorzásra. Állítható ezen kívül a kockázati szint, ami annyit jelent, 
                    hogy minél nagyobb a kockázat, annál nagyobbak az eltérések a rekeszek értékei között. A játékot érdemes minél több labdával 
                    egyszerre elindítani, hiszen a gravitációnak köszönhetően egy labda mindig ugyanazt az utat fogja bejárni, több esetében viszont 
                    a labdák egymással is ütköznek, ezzel biztosítva a játék véletlenszerűségét. 
                </p>
              </div>
            </div>
          </div>
          <div class="mt-8">
            <div class="overflow-hidden bg-white shadow-lg rounded-lg dark:bg-gray-800">
              <div class="p-6 text-gray-900 dark:text-gray-100">
                <h2 class="text-2xl font-bold leading-tight text-blue-600 dark:text-blue-400">Rangsor</h2>
                <p class="mt-4 text-sm leading-relaxed text-gray-700 dark:text-gray-300">
                  Az oldalon ezen kívül megtalálható egy ranglista is, így a felhasználók akár versenyezhetnek is egymással, hogy kinek sikerül a legtöbb 
					          nyeremény összegyűjtése. 
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </component>
    <footer class="py-4 bg-gray-800 text-center text-gray-200 dark:bg-gray-900 dark:text-gray-400">
      <p class="text-sm">Jó szórakozást kívánunk a játékhoz!</p>
    </footer>
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
    },
  },
  mounted() {
    axios
      .get('/api/auth/status')
      .then((response) => {
        this.status = response;
        this.isAuthenticated = this.status.data.authenticated
      })
      .finally(() => {
        this.isLoading = false;
      });
  },
};
</script>