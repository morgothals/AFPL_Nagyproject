# FUNKSPEC.md

## 1. Bevezetés

### 1.1 Cél

A dokumentum célja a Plinko weboldal funkcionális specifikációjának részletes bemutatása, amely alapján a fejlesztők elkészíthetik a rendszert.

### 1.2 Jelenlegi Helyzet

Jelenleg kevés olyan online platform létezik, amely a Plinko játékot csak mint élményt kínálja valós kifizetés nélkül felhasználóbarát környezetben. Főleg a 18 év alatti játékosok olyan weboldalt keresnek, amik megadja nekik az élményt anélkül, hogy az korhatárhoz kötött lenne, ugyanakkor biztosítsa az egészséges verseny lehetőségét pontszámokban.

### 1.3 Hatály

A dokumentum a Plinko weboldal fejlesztésére vonatkozik, amelyet három fejlesztő valósít meg öt hét alatt, teszteléssel együtt.

## 2. Rendszerleírás

### 2.1 Rendszer célja

Az online Plinko játék lehetőséget biztosít a felhasználóknak a játékra, játék pénzes tétek elhelyezésére, nyeremények megszerzésére és versengésre a ranglistán, mindezt egy biztonságos és megbízható környezetben.

### 2.2 Felhasználói esetek (Use-Case)

- **Regisztráció és bejelentkezés**
- **Játék beállítása és indítása**
- **Nyeremény kiszámítása és jóváírása**
- **Ranglista megtekintése**
- **Profil szerkesztése**
- **Játéktörténet megtekintése**
- **Vendég módú játék**

## 3. Funkcionális követelmények

### 3.1 Regisztráció/Bejelentkezés

- Felhasználói fiók létrehozása felhasználónév, email és jelszó megadásával.
- Email cím egyediségének ellenőrzése.
- Bejelentkezés után a felhasználó hozzáfér a teljes funkcionalitáshoz.
- Jelszó visszaállítás email alapján.


### 3.3 Játék beállítása

- **Tét megadása**: Minimum és maximum tét összegének betartása.
- **Kockázati szint kiválasztása**: Alacsony, közepes, magas.
- **Sorok számának beállítása**: 8 és 16 között.

### 3.4 Játék indítása és lejátszása

- A labda leejtése a tábla tetején.
- Animáció megjelenítése a labda mozgásáról.
- A labda véletlenszerű útvonalat jár be a tüskék között.

### 3.5 Nyeremény kiszámítása és jóváírása

- A nyeremény a tét és a rekeszhez tartozó szorzó szorzata.
- A szorzók a kockázati szint és a sorok száma alapján változnak.
- Nyeremény automatikus jóváírása a felhasználó egyenlegére.

### 3.6 Ranglista

- Legjobb játékosok megjelenítése a nyeremények alapján.
- Szűrési lehetőségek: napi, heti, havi, összesített.

### 3.7 Profil kezelése

- Felhasználói adatok és profilkép módosítása.
- Jelszó megváltoztatása.
- Egyenleg megtekintése.

### 3.8 Játéktörténet

- Korábbi játékok, tétek, nyeremények és játék paraméterek megtekintése.

### 3.9 Vendég mód

- Játék lehetősége regisztráció nélkül.
- Nyeremények és tétek nem kerülnek mentésre.

## 4. Nem-funkcionális követelmények

- **Reszponzív design** minden eszközön.
- **Teljesítmény**: Gyors betöltés és gördülékeny működés.
- **Biztonság**: Felhasználói adatok védelme.
- **Skálázhatóság**: Növekvő felhasználói szám és tranzakciók kezelése.
- **Felhasználóbarát felület**: Könnyű navigáció és használat.
- **Megbízhatóság**: Stabil működés, hibamentes játékélmény.

## 5. Rendszer működése

### 5.1 Játék folyamat

1. A felhasználó bejelentkezik vagy vendég módban játszik.
3. Beállítja a játék paramétereit: tét, kockázati szint, sorok száma.
4. A "Játék indítása" gombra kattint.
5. A labda leejtése és animáció megjelenítése.
6. A labda megérkezik egy rekeszbe, nyeremény kiszámítása.
7. Nyeremény jóváírása a felhasználó egyenlegére.
8. Ranglista frissítése.

### 5.2 Nyeremény számítása

- **Szorzók**: A rekeszekhez tartozó szorzók előre meghatározottak a kockázati szint és sorok száma alapján.
- **Nyeremény**: Nyeremény = Tét * Szorzó.

## 6. Adatmodell

![Adatmodell ábra](../pic/adatmodell.png?raw=true "Adatmodell")

### 6.1 Felhasználók

| Oszlopnév  | Típus          | Leírás                    |
|------------|----------------|---------------------------|
| id         | INT (auto-incr)| Egyedi azonosító          |
| username   | VARCHAR(255)   | Felhasználónév            |
| email      | VARCHAR(255)   | Email cím (egyedi)        |
| password   | VARCHAR(255)   | Jelszó (hash-elve)        |
| balance    | DECIMAL(10,2)  | Felhasználó egyenlege     |
| avatar     | VARCHAR(255)   | Profilkép URL             |
| created_at | TIMESTAMP      | Létrehozás dátuma         |
| updated_at | TIMESTAMP      | Módosítás dátuma          |

### 6.2 Játékok

| Oszlopnév   | Típus          | Leírás                     |
|-------------|----------------|----------------------------|
| id          | INT (auto-incr)| Egyedi azonosító           |
| user_id     | INT            | Felhasználó azonosítója    |
| bet_amount  | DECIMAL(10,2)  | Tét összege                |
| risk_level  | ENUM           | Kockázati szint            |
| rows        | INT            | Sorok száma                |
| payout      | DECIMAL(10,2)  | Nyeremény összege          |
| result_slot | INT            | Rekesz száma               |
| played_at   | TIMESTAMP      | Játék időpontja            |
| created_at  | TIMESTAMP      | Létrehozás dátuma          |
| updated_at  | TIMESTAMP      | Módosítás dátuma           |

## 7. Megvalósítás

### 7.1 Használt Technológiák

- **Backend**: PHP 8+, Laravel 10+
- **Frontend**: HTML5, CSS3, Bootstrap 5, JavaScript, Vue.js vagy React, HTML5 Canvas
- **Adatbázis**: MySQL vagy MariaDB
- **Verziókezelés**: Git, GitHub

### 7.2 Fejlesztői eszközök

- **IDE**: Visual Studio Code vagy PHPStorm
- **Függőségkezelő**: Composer, NPM
- **Szerver**: XAMPP, MAMP vagy Docker
- **Egyéb**: Postman (API teszteléshez), PHPUnit (teszteléshez)

## 8. Üzleti folyamatok modellje

### 8.1 Jelenlegi üzleti folyamatok modellje

A játékosok különböző online kaszinó oldalakon játszanak, amelyek nem mindig nyújtanak biztonságos és megbízható szolgáltatást, vagy nem kínálják a Plinko játékot. Általában ezeket az oldalkat nem lehet regisztráció nélkül használni, ami korhatárhoz vagy lakóhely területéhez kötött.

### 8.2 Igényelt üzleti folyamatok modellje

Egy megbízható, biztonságos és felhasználóbarát weboldal, ahol a felhasználók élvezhetik a Plinko játékot és versenghetnek a ranglistában.

## 9. Fogalomtár

- **Plinko tábla**: A játék felülete, amely egy piramis alakú, tüskékkel teli tábla.
- **Labda**: A játékban használt elem, amelyet a játékos "leejt".
- **Rekesz**: A tábla alján található mezők, amelyek meghatározzák a nyereményt.
- **Tét**: A játékos által fogadott pénzösszeg.
- **Szorzó**: A nyeremény kiszámításához használt érték, amely a rekeszhez tartozik.
- **Kockázati szint**: A játék nehézségi szintje, amely befolyásolja a szorzókat és a nyerési esélyeket.
