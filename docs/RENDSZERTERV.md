# RENDSZERTERV.md

## Logikai rendszerterv

### 1. Üzleti folyamatok modellje

#### 1.1 Üzleti domain modell

A weboldal egy online Plinko játékot valósít meg, amely a népszerű televíziós műsor, a "The Price is Right" játékán alapul. A játék során a játékosok labdát dobnak le egy piramis alakú, tüskékkel teli táblán, és várják, hogy az melyik nyereményt tartalmazó rekeszbe esik. A labda gravitáció segítségével esik le, miközben a tüskékről lepattanva véletlenszerű útvonalat jár be. A játékos nyereménye attól függ, hogy a labda melyik rekeszbe érkezik.

#### 1.2 Üzleti szereplők

- **Regisztrált felhasználók**: Akik játszhatnak a Plinko játékkal, pénzt vagy pontokat nyerhetnek, megtekinthetik a ranglistát, és szerkeszthetik a profiljukat.
- **Vendég felhasználók**: Akik regisztráció nélkül kipróbálhatják a játékot, de nyereményeiket nem menti a rendszer.
- **Adminisztrátor**: Kezeli a felhasználókat, felügyeli a játékot, és karbantartja a rendszert.

#### 1.3 Üzleti entitások

- **Felhasználók**
- **Játékok**
- **Tétek**
- **Nyeremények**
- **Ranglisták**

### 2. Követelmények

#### 2.1 Funkcionális követelmények

- Felhasználói regisztráció és bejelentkezés.
- Plinko játék lejátszása animációval.
- Különböző kockázati szintek (alacsony, közepes, magas) választása.
- Sorok számának beállítása (8-16 sor).
- Tét összegének megadása.
- Nyeremények számítása és jóváírása.
- Ranglista megjelenítése a legjobb játékosokkal.
- Felhasználói profil megtekintése és szerkesztése.
- Játéktörténet megtekintése.
- Vendég módú játék lehetősége.

#### 2.2 Nemfunkcionális követelmények

- **Reszponzív design**: A weboldal mobil eszközökön is jól működik.
- **Teljesítmény**: Gyors betöltési idő és zökkenőmentes játékélmény.
- **Biztonság**: Biztonságos adatkezelés és tranzakciók.
- **Skálázhatóság**: Növekvő felhasználói bázis és tranzakciók kezelésére alkalmas.

| Funkció                           | Részletes leírás                                                                                                                                       |
|-----------------------------------|--------------------------------------------------------------------------------------------------------------------------------------------------------|
| **Regisztráció lap**              | A felhasználó megadja a felhasználónevét, email címét és jelszavát.                                                                                    |
| **Bejelentkezés lap**             | A felhasználó bejelentkezik az email címével és jelszavával.                                                                                           |
| **Plinko játék felület**          | A játékos beállítja a kockázati szintet, a sorok számát, a tét összegét, majd elindítja a játékot.                                                     |
| **Kockázati szint választása**    | Három opció: alacsony, közepes, magas. A magasabb kockázat nagyobb nyereményt, de kisebb esélyt jelent.                                                |
| **Sorok számának beállítása**     | A játékos 8 és 16 sor között választhat. Több sor nagyobb nyereményeket, de kisebb esélyt jelent.                                                       |
| **Tét összegének megadása**       | A játékos megadja a fogadni kívánt összeget a megengedett minimum és maximum között.                                                                   |
| **Nyeremény kiszámítása**         | A labda leesése után a rendszer kiszámítja a nyereményt a tét és a szorzó alapján.                                                                     |
| **Pontszám mentése**              | A játék végeztével a rendszer elmenti a felhasználó nyereményét és frissíti az egyenlegét.                                                             |
| **Ranglista megjelenítése**       | A legjobb játékosok listájának megjelenítése a nyeremények alapján.                                                                                    |
| **Profil szerkesztése**           | A felhasználó módosíthatja a profilképét, felhasználónevét és jelszavát.                                                                               |
| **Játéktörténet megtekintése**    | A felhasználó megtekintheti korábbi játékait és nyereményeit.                                                                                          |
| **Vendég mód**                    | Regisztráció nélküli játék lehetősége, nyeremények mentése nélkül.                                                                                     |
| **Adminisztrációs felület**       | Az adminisztrátor felhasználókat kezelhet, ellenőrizheti a játékokat és a tranzakciókat.                                                               |

### 3. Feldolgozási folyamatok

#### 3.1 Használati esetek

- **Regisztráció**: A felhasználó megadja az adatait, és létrehoz egy fiókot.
- **Bejelentkezés**: A felhasználó bejelentkezik a rendszerbe.
- **Játék beállítása**: A felhasználó kiválasztja a kockázati szintet, sorok számát és megadja a tét összegét.
- **Játék indítása**: A felhasználó elindítja a Plinko játékot.
- **Labda leejtése**: A rendszer szimulálja a labda mozgását és megjeleníti az animációt.
- **Nyeremény kiszámítása**: A rendszer kiszámítja a nyereményt a tét és a szorzó alapján.
- **Nyeremény jóváírása**: A rendszer frissíti a felhasználó egyenlegét.
- **Ranglista megtekintése**: A felhasználó megtekinti a legjobb játékosok listáját.
- **Profil szerkesztése**: A felhasználó módosítja a profilját.
- **Játéktörténet megtekintése**: A felhasználó megtekinti korábbi játékait és nyereményeit.

#### 3.2 Aktivitási diagramok

**Játék folyamat**

```
[Felhasználó] --> [Bejelentkezés/Regisztráció] --> [Játék beállítása] --> [Játék indítása] --> [Labda leejtése és animáció] --> [Nyeremény kiszámítása] --> [Nyeremény jóváírása] --> [Ranglista frissítése]
```

**Profil szerkesztése**

```
[Felhasználó] --> [Bejelentkezés] --> [Profil oldal] --> [Adatok módosítása] --> [Mentés] --> [Visszaigazolás]
```

#### 3.3 Szekvencia diagramok

**Játék indítása és nyeremény jóváírása**

1. A felhasználó beállítja a játék paramétereit.
2. A felhasználó elindítja a játékot.
3. A rendszer ellenőrzi a felhasználó egyenlegét és levonja a tétet.
4. A rendszer szimulálja a labda mozgását és megjeleníti az animációt.
5. A rendszer kiszámítja a nyereményt.
6. A rendszer jóváírja a nyereményt a felhasználó egyenlegén.
7. A rendszer frissíti a ranglistát.


### 4. Funkcionális felépítés

#### 4.1 Komponensek

- **Front-end**: Blade sablonok, CSS (Bootstrap 5), JavaScript (pl. Vue.js vagy React), HTML5 Canvas az animációhoz.
- **Back-end**: Laravel keretrendszer, vezérlők, modellek, útvonalak.
- **Adatbázis**: MySQL vagy MariaDB.


### 5. Adatmodell


#### 5.1 Felhasználók

| Oszlopnév    | Típus          | Leírás                       |
|--------------|----------------|------------------------------|
| id           | INT (auto-incr)| Egyedi azonosító             |
| username     | VARCHAR(255)   | Felhasználónév               |
| email        | VARCHAR(255)   | Email cím (egyedi)           |
| password     | VARCHAR(255)   | Jelszó (hash-elve)           |
| balance      | DECIMAL(10,2)  | Felhasználó egyenlege        |
| avatar       | VARCHAR(255)   | Profilkép URL                |
| created_at   | TIMESTAMP      | Létrehozás dátuma            |
| updated_at   | TIMESTAMP      | Módosítás dátuma             |

#### 5.2 Játékok

| Oszlopnév    | Típus          | Leírás                       |
|--------------|----------------|------------------------------|
| id           | INT (auto-incr)| Egyedi azonosító             |
| user_id      | INT            | Felhasználó azonosítója      |
| bet_amount   | DECIMAL(10,2)  | Tét összege                  |
| risk_level   | ENUM           | Kockázati szint (alacsony, közepes, magas) |
| rows         | INT            | Sorok száma (8-16)           |
| payout       | DECIMAL(10,2)  | Nyeremény összege            |
| result_slot  | INT            | A rekesz, ahol a labda landolt |
| played_at    | TIMESTAMP      | Játék időpontja              |
| created_at   | TIMESTAMP      | Létrehozás dátuma            |
| updated_at   | TIMESTAMP      | Módosítás dátuma             |

#### 5.3 Ranglista

A ranglistát a **Játékok** tábla adatai alapján számítjuk, a felhasználók összesített nyereménye szerint.

### 6. Felhasználói felületek, menük

- **Főoldal**: Bejelentkezési és regisztrációs lehetőség, játék indítása vendég módban.
- **Játék felület**: Beállítások megadása (kockázati szint, sorok száma, tét), Plinko tábla megjelenítése, labda leejtése.
- **Profil oldal**: Felhasználói adatok megjelenítése és szerkesztése, egyenleg megtekintése.
- **Ranglista oldal**: Legjobb játékosok listája nyeremények alapján.
- **Játéktörténet oldal**: Korábbi játékok és nyeremények megtekintése.

### 7. Adatszótár, logikai adatmodell

Az adatszótár tartalmazza az adatbázis mezőit és azok jelentését, lásd az **Adatmodell** fejezetben.
