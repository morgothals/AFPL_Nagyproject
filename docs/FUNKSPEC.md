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
