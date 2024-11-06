<template>
  <div class="plinko-game">
    <div class="controls">
      <label for="betAmount">Tét összege:</label>
      <input type="number" v-model.number="betAmount" min="1" />

      <label for="riskLevel">Kockázati szint:</label>
      <select v-model="riskLevel">
        <option value="low">Alacsony</option>
        <option value="medium">Közepes</option>
        <option value="high">Magas</option>
      </select>

      <button @click="startGame">Játék indítása</button>
    </div>

    <div class="game-area">
      <canvas ref="plinkoCanvas" width="400" height="600"></canvas>
    </div>

    <div class="result" v-if="gameResult">
      <h2>Eredmény: {{ gameResult }}</h2>
      <p>Nyeremény: {{ payout }} Ft</p>
    </div>
  </div>
</template>

<script>
export default {
  name: "PlinkoGame",
  data() {
    return {
      betAmount: 10,
      riskLevel: 'low',
      gameResult: null,
      payout: 0,
    };
  },
  methods: {
    startGame() {
      if (this.betAmount <= 0) {
        alert('A tétnek nagyobbnak kell lennie, mint 0!');
        return;
      }

      this.gameResult = null;
      this.payout = 0;

      const resultSlot = this.simulateBallDrop();
      const multiplier = this.getMultiplier(resultSlot);
      this.payout = this.betAmount * multiplier;

      this.gameResult = `A labda a(z) ${resultSlot}. rekeszbe esett!`;
    },
    simulateBallDrop() {
      const slots = 8;
      const resultSlot = Math.floor(Math.random() * slots) + 1;
      return resultSlot;
    },
    getMultiplier(slot) {
      const multipliers = {
        low: [0.5, 0.8, 1, 1.2, 1.5, 1.2, 1, 0.8],
        medium: [0, 0.5, 1, 1.5, 2, 1.5, 1, 0.5],
        high: [0, 0, 0.5, 1, 5, 1, 0.5, 0],
      };

      const index = slot - 1;
      return multipliers[this.riskLevel][index];
    },
  },
};
</script>

<style scoped>
.plinko-game {

}
</style>
