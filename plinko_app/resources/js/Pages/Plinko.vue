<template>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <div>
    <h1>Plinko Játék</h1>
    <plinko-game></plinko-game>
  </div>
</template>

<script>
import PlinkoGame from '../Components/PlinkoGame.vue';

export default {
  components: {
    PlinkoGame,
  },
};
</script>
