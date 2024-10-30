#### X.x Aktivitási diagramok

**Játék folyamat**

```
[Felhasználó] --> [Bejelentkezés/Regisztráció] --> [Játék beállítása] --> [Játék indítása] --> [Labda leejtése és animáció] --> [Nyeremény kiszámítása] --> [Nyeremény jóváírása] --> [Ranglista frissítése]
```

**Profil szerkesztése**

```
[Felhasználó] --> [Bejelentkezés] --> [Profil oldal] --> [Adatok módosítása] --> [Mentés] --> [Visszaigazolás]
```

#### X.x Szekvencia diagramok

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
