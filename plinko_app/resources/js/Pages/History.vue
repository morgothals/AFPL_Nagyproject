<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>

    <Head title="Plinko" />
    <GuestLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                Néhány adat a plinko játékról:
            </h2>
        </template>



        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800">
                    <div class="p-6 text-gray-900 dark:text-gray-100"style="text-align: center;">
                        A Plinkót általában 50 000 dollárig játsszák. A versenyző egy ingyenes zsetont kap, és akár további négyet is nyerhet kisebb nyeremények kiosztásával.
 Minden nyereménynél a versenyzőnek megjelenik egy ár, és ki kell választania, hogy a megjelenített kettő közül melyik számjegy – az első vagy a második – a helyes.
A versenyző megnyeri a kis díjat és egy extra zsetont a megfelelő számjegy kiválasztásáért.
Az összes elem beárazása után a versenyző egy-egy zsetont helyez egy pegboardra (a babgéphez hasonló stílusban), ahol végül az alul található kilenc mező egyikébe esik.
Ezen terek értékei szimmetrikusan vannak elrendezve. Kívülről befelé nézve a sorozat 100–500–1000–0 dollár, a középső mező értéke 10 000 dollár.
A versenyző megnyeri a megfelelő pénzösszeget, amikor a zseton egy mezőre esik, és a zseton lekerül a tábláról.
Ha egy zseton megakad a táblán, akkor az kilazul, és visszakerül a versenyzőhöz, hogy újra leessen. A folyamatot addig ismételjük, amíg a chipkészlet el nem fogy.
A Plinko áras játékként 1983 januárjában debütált. Eredetileg a központ 5000 dollárt ért, ami a 25 000 dolláros lehetséges fődíjért.
                    </div>
                </div>
            </div>
        </div>

    </GuestLayout>
</template>