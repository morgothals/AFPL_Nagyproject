<template>
    <div class="plinko-game">
        <h1>Plinko Játék</h1>
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

        <div class="game-area d-flex justify-content-center align-items-center mt-4">
            <canvas ref="plinkoCanvas" width="600" height="600"></canvas>
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
                    wireframes: false,  // Állítsd true-ra, hogy láthatóak legyenek a fizikai objektumok
                    //Ha true ra van állítva nincs kitöltés csak wireframe!!!
                    background: '#000',
                },
            });

            // Piramis létrehozása
            const pegColumns = this.rows;
            const pegRadius = 5; // A körök sugara
            const pegRows = this.rows; // A sorok száma
            const pegSpacingX = canvas.width / (pegRows + 2); // Vízszintes távolság a körök között
            const pegSpacingY = (canvas.height - 150) / pegRows; // Függőleges távolság a sorok között






            for (let row = 0; row < pegRows; row++) {
                // Az első sorban 3 kör legyen, a többi sorban növekedjen
                const pegColumns = row === 0 ? 3 : row + 3;

                for (let col = 0; col < pegColumns; col++) {
                    const x =
                        canvas.width / 2 -
                        ((pegColumns - 1) * pegSpacingX) / 2 + // Középre igazítás
                        col * pegSpacingX; // Az aktuális oszlop pozíciója
                    const y = 100 + row * pegSpacingY; // Az aktuális sor pozíciója

                    // Kör létrehozása
                    const peg = Bodies.circle(x, y, pegRadius, {
                        isStatic: true,
                        render: { fillStyle: '#fff' }, // Fehér kitöltés
                    });

                    // Kör hozzáadása a világhoz
                    World.add(this.world, peg);
                }
            }

            // Alap létrehozása
            const ground = Bodies.rectangle(
                canvas.width / 2,  // Téglalap középpontjának X koordinátája
                canvas.height - 50, // Téglalap középpontjának Y koordinátája
                canvas.width, // Téglalap szélessége
                10, // Téglalap magassága
                {
                    isStatic: true,// A téglalap statikus, nem mozog
                    render: { fillStyle: '#fff' }

                }

            );
            World.add(this.world, ground);

            // Falak létrehozása
            const leftWall = Bodies.rectangle(0, canvas.height / 2, 10, canvas.height, {
                isStatic: true,
            });
            const rightWall = Bodies.rectangle(
                canvas.width,
                canvas.height / 2,
                10,
                canvas.height,
                {
                    isStatic: true,
                    render: { fillStyle: '#fff' }
                }
            );
            World.add(this.world, [leftWall, rightWall]);

            // Szorzók és rekeszek létrehozása
            const slots = pegColumns + 2;
            const slotWidth = canvas.width / slots;
            this.multipliers = this.getMultipliers(slots);

            for (let i = 0; i <= slots; i++) {
                const x = i * slotWidth - slotWidth / 2;
                const slot = Bodies.rectangle(x, canvas.height - 65, 3, 30, {
                    isStatic: true,
                    render: { fillStyle: '#fff' },
                });
                World.add(this.world, slot);
            }

            // Szorzó értékek megjelenítése
            for (let i = 0; i < slots; i++) {
                const x = i * slotWidth + slotWidth / 2;
                const multiplierText = Matter.Bodies.rectangle(
                    x,
                    canvas.height - 50,
                    slotWidth,
                    40,
                    {
                        isStatic: true,
                        isSensor: true,
                        label: 'Multiplier',
                        render: {
                            fillStyle: 'transparent',
                            //fillStyle: '#fff',
                        },
                    }
                );
                multiplierText.multiplier = this.multipliers[i];
                World.add(this.world, multiplierText);
            }


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
                    const bodies = [pair.bodyA, pair.bodyB];
                    bodies.forEach((body) => {
                        if (body.label === 'Multiplier' && pair.other.label === 'Ball') {
                            this.handleBallLanding(pair.other, body.multiplier);
                        }
                    });
                });
            });

            // Motor indítása
            Matter.Runner.run(this.engine);
            Matter.Engine.run(this.engine);
            Render.run(this.render);




            // Kirajzoljuk a szorzókat szövegként
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
                const factor = 1 - distance / middle;
                const multiplier = parseFloat(
                    (min + (max - min) * (1 - factor)).toFixed(2)
                );
                multipliers.push(multiplier);
            }
            return multipliers;
        },
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
