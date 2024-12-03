<template>
    <div class="plinko-game">
        <!--  <h1>Plinko Játék</h1> -->
        <div class="balance">
            Egyenleg: {{ balance }} Ft
        </div>

    <div class="controls">
      <label for="betAmount">Tét összege:</label>
      <input type="number" v-model.number="betAmount" min="1" />

      <label for="riskLevel">Kockázati szint:</label>
      <select v-model="riskLevel">
        <option value="low">Alacsony</option>
        <option value="medium">Közepes</option>
        <option value="high">Magas</option>
      </select>

      <label for="rows">Sorok száma:</label>
      <input type="number" v-model.number="rows" min="8" max="16" />

      <button @click="startGame">Bet</button>
    </div>

    <div class="game-area">
      <canvas ref="plinkoCanvas" width="500" height="600"></canvas>
    </div>

    <div class="result" v-if="gameResult">
      <h2>{{ gameResult }}</h2>
      <p>Nyeremény: {{ payout }} Ft</p>
    </div>
  </div>
</template>

<script>
import Matter from 'matter-js';

export default {
    name: 'PlinkoGame',
    data() {
        return {
            balance: 1000,
            betAmount: 10,
            riskLevel: 'low',
            rows: 8,
            gameResult: null,
            payout: 0,
            engine: null,
            render: null,
            world: null,
            multipliers: [],
            multiplierAreas: [],
            slotLimiters: [],
            slots: 8,
            slotwidth: 10,
            pegColumns: 10,
        };
    },
    mounted() {
        this.initPlinko();
    },
    methods: {
        startGame() {
            if (this.betAmount <= 0) {
                alert('A tétnek nagyobbnak kell lennie, mint 0!');
                return;
            }

      if (this.betAmount > this.balance) {
        alert('Nincs elég egyenleged a fogadáshoz!');
        return;
      }

      // Levonjuk a tétet az egyenlegből
      this.balance -= this.betAmount;

      // Hozzáadjuk a labdát
      this.addBall();
    },
      initPlinko() {


      // Inicializáljuk a Matter.js motort és a renderelést
      const { Engine, Render, World, Bodies, Events } = Matter;

            this.engine = Engine.create();
            this.world = this.engine.world;

      const canvas = this.$refs.plinkoCanvas;

      this.render = Render.create({
        canvas: canvas,
        engine: this.engine,
        options: {
          width: canvas.width,
          height: canvas.height,
          wireframes: true,  // Állítsd true-ra, hogy láthatóak legyenek a fizikai objektumok
          background: '#ffffff',
        },
      });

      // Piramis létrehozása
      const pegRadius = 5;
      const pegRows = this.rows;
      const pegColumns = this.rows;
      const pegSpacingX = canvas.width / pegColumns;
      const pegSpacingY = (canvas.height - 150) / pegRows;

      for (let row = 0; row < pegRows; row++) {
        for (let col = 0; col <= row; col++) {
          const x =
            canvas.width / 2 -
            (row * pegSpacingX) / 2 +
            col * pegSpacingX +
            pegSpacingX / 2;
          const y = 50 + row * pegSpacingY;
          const peg = Bodies.circle(x, y, pegRadius, {
            isStatic: true,
            render: { fillStyle: '#000000' },
          });
          World.add(this.world, peg);
        }
      }

      // Alap létrehozása
      const ground = Bodies.rectangle(
        canvas.width / 2,
        canvas.height + 25,
        canvas.width,
        50,
        {
          isStatic: true,
        }
      );
      World.add(this.world, ground);

      // Falak létrehozása
      const leftWall = Bodies.rectangle(-25, canvas.height / 2, 50, canvas.height, {
        isStatic: true,
      });
      const rightWall = Bodies.rectangle(
        canvas.width + 25,
        canvas.height / 2,
        50,
        canvas.height,
        {
          isStatic: true,
        }
      );
      World.add(this.world, [leftWall, rightWall]);

            // Szorzók és rekeszek létrehozása



            this.createMultiplierAreas();




            /*      // A szorzók szövegének kirajzolása
                  const szorzo_label = this.render.context; // A canvas rajzolási kontextusa
                  this.render.options.afterRender = () => {
                      szorzo_label.font = '16px Arial'; // Betűstílus és méret
                      szorzo_label.fillStyle = '#fff'; // Szöveg színe (fekete)
                      szorzo_label.textAlign = 'center'; // Szöveg középre igazítása

                      for (let i = 0; i < slots; i++) {
                          const x = i * slotWidth + slotWidth / 2; // Szorzó pozíciója középen
                          const y = canvas.height - 50; // Szorzó szövegének magassága
                          const multiplier = this.multipliers[i]; // Szorzó érték
                          szorzo_label.fillText(`${multiplier}x`, x, y); // Szöveg kirajzolása
                      }
                  };
      */
            // Események kezelése
            Events.on(this.engine, 'collisionStart', (event) => {
                event.pairs.forEach((pair) => {
                    const { bodyA, bodyB } = pair;

                    if (!bodyA || !bodyB) {
                        return; // Ha bármelyik test nem létezik, kilépünk
                    }

                    // Ellenőrizzük a testek címkéit
                    if ((bodyA.label === 'Multiplier' && bodyB.label === 'Ball') ||
                        (bodyB.label === 'Multiplier' && bodyA.label === 'Ball')) {
                        const multiplierBody = bodyA.label === 'Multiplier' ? bodyA : bodyB;
                        const ballBody = bodyA.label === 'Ball' ? bodyA : bodyB;
                        this.handleBallLanding(ballBody, multiplierBody.multiplier);
                    }
                });
            });



            Matter.Render.run(this.render);
            var runner = Matter.Runner.create();

            // run the engine
            Matter.Runner.run(runner, this.engine);
            //Ezek már így futnak




            /*       // Kirajzoljuk a szorzókat szövegként
                   const context = this.render.context;

                   this.render.options.afterRender = () => {
                       console.log("afterRender fut");
                       context.font = '32px Arial';
                       context.fillStyle = '#fff';
                       for (let i = 0; i < slots; i++) {
                           const x = i * slotWidth + slotWidth / 2;

                           const text = `${this.multipliers[i]}x`;
                           context.fillText(
                               text,
                               x - context.measureText(text).width / 2,
                               canvas.height - 40
                           );
                       }
                   };*/
            const slots = this.slots;
            const slotWidth = this.slotWidth;
            // Eseménykezelő az afterRender eseményhez
            Events.on(this.render, 'afterRender', () => {
                //console.log("afterRender fut");
                const context = this.render.context;
                context.font = '16px Arial';
                context.fillStyle = '#fff';

                for (let i = 0; i < slots; i++) {
                    const x = i * slotWidth;
                    const text = `${this.multipliers[i]}x`;
                    context.fillText(
                        text,
                        x - context.measureText(text).width / 2,
                        canvas.height - 20
                    );
                }
            });
        },

        createMultiplierAreas() {
            const { Engine, Render, World, Bodies, Events } = Matter;
            const canvas = this.$refs.plinkoCanvas;
            this.slots = this.pegColumns + 2;
            const slots = this.slots;
            this.slotWidth = canvas.width / slots;
            const slotWidth = this.slotWidth
            // this.multipliers = this.getMultipliers(slots);
            this.multipliers = this.getExponentialMultipliers(slots);

      for (let i = 0; i <= slots; i++) {
        const x = i * slotWidth;
        const slot = Bodies.rectangle(x, canvas.height - 100, 5, 200, {
          isStatic: true,
          render: { fillStyle: '#000000' },
        });
        World.add(this.world, slot);
      }

      // Szorzó értékek megjelenítése
      for (let i = 0; i < slots; i++) {
        const x = i * slotWidth + slotWidth / 2;
        const multiplierText = Matter.Bodies.rectangle(
          x,
          canvas.height - 20,
          slotWidth,
          20,
          {
            isStatic: true,
            isSensor: true,
            label: 'Multiplier',
            render: {
              fillStyle: 'transparent',
            },
          }
        );
        multiplierText.multiplier = this.multipliers[i];
        World.add(this.world, multiplierText);
      }

      // Események kezelése
      Events.on(this.engine, 'collisionStart', (event) => {
        event.pairs.forEach((pair) => {
          const bodies = [pair.bodyA, pair.bodyB];
          bodies.forEach((body) => {
            if (body.label === 'Multiplier' && pair.other.label === 'Ball') {
              this.handleBallLanding(pair.other, body.multiplier);
            }
          });
        });
      });

      // Motor indítása
      Engine.run(this.engine);
      Render.run(this.render);

      // Kirajzoljuk a szorzókat szövegként
      const context = this.render.context;
      this.render.options.afterRender = () => {
        context.font = '16px Arial';
        context.fillStyle = '#000000';
        for (let i = 0; i < slots; i++) {
          const x = i * slotWidth + slotWidth / 2;
          const text = `${this.multipliers[i]}x`;
          context.fillText(
            text,
            x - context.measureText(text).width / 2,
            canvas.height - 5
          );
        }
      };
    },
      addBall() {


      const { Bodies, World } = Matter;
      const canvas = this.$refs.plinkoCanvas;

      // Labda létrehozása a vásznon kívül
      const ball = Matter.Bodies.circle(canvas.width / 2, 10, 10, {
        restitution: 0.5,
        label: 'Ball',
        render: { fillStyle: '#FF0000' },
      });
      World.add(this.world, ball);
    },
    handleBallLanding(ball, multiplier) {
      // Ellenőrizzük, hogy a labda már nem került feldolgozásra
      if (ball.isProcessed) return;

      ball.isProcessed = true;

            const payout = this.betAmount * multiplier;
            this.balance += payout;
            this.payout = payout;
            this.gameResult = `A labda ${multiplier}x szorzóba esett!`;
            console.log('Balance:', this.balance);

      // Eltávolítjuk a labdát a világból
      Matter.World.remove(this.world, ball);
    },
    getMultipliers(slots) {
      let multipliers;
      if (this.riskLevel === 'low') {
        multipliers = this.generateMultipliers(slots, [0.5, 1.5]);
      } else if (this.riskLevel === 'medium') {
        multipliers = this.generateMultipliers(slots, [0, 2]);
      } else if (this.riskLevel === 'high') {
        multipliers = this.generateMultipliers(slots, [0, 5]);
      }
      return multipliers;
    },
    generateMultipliers(slots, range) {
      const [min, max] = range;
      const middle = Math.floor(slots / 2);
      const multipliers = [];

            for (let i = 0; i < slots; i++) {
                const distance = Math.abs(i - middle);
                const factor = distance / middle;
                const multiplier = parseFloat(
                    (min + (max - min) * factor).toFixed(2)
                );
                multipliers.push(multiplier);
            }
            return multipliers;
        },

        getExponentialMultipliers(slots) {
            // Középső érték meghatározása a kockázati szint alapján
            const baseline = this.riskLevel === 'low' ? 0.5 :
                this.riskLevel === 'medium' ? 0.75 : 0;

            // Exponenciális növekedési alap
            const base = this.riskLevel === 'low' ? 1.1 :
                this.riskLevel === 'medium' ? 1.5 : 2;

            // Maximális szorzó érték
            const maxMultiplier = this.riskLevel === 'low' ? 3 :
                this.riskLevel === 'medium' ? 8 : 15;

            const middle = Math.floor(slots / 2); // Középpont
            const multipliers = [];

            for (let i = 0; i < slots; i++) {
                const distanceFromMiddle = Math.abs(i - middle); // Távolság a középponttól
                const factor = Math.pow(base, distanceFromMiddle); // Exponenciális növekedés

                // Szorzó kiszámítása a baseline alapján
                const multiplier = parseFloat(
                    Math.min(maxMultiplier, baseline + factor - 0.7).toFixed(2)
                );

                multipliers.push(multiplier);
            }

            return multipliers;
        }
    },
};
</script>

<style scoped>
.plinko-game {
  text-align: center;
}

.balance {
  font-size: 1.5em;
  margin-bottom: 10px;
}

.controls {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-wrap: wrap;
  margin-bottom: 20px;
}

.controls label {
  margin-right: 5px;
}

.controls input,
.controls select {
  margin-right: 15px;
  margin-bottom: 10px;
}

.controls button {
  padding: 10px 20px;
  font-size: 1em;
}

.game-area {
  position: relative;
  margin: 0 auto;
}

canvas {
  border: 1px solid #ccc;
}

.result {
  margin-top: 20px;
  font-size: 1.2em;
}
</style>
