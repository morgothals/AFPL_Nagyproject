# KOVSPEC.md

## 1. Áttekintés

Ez a dokumentum a Plinko weboldal követelmény specifikációit tartalmazza. A cél egy modern, interaktív online Plinko játék fejlesztése, amely lehetővé teszi a felhasználók számára a játékot, tétek elhelyezését, nyeremények megszerzését és versengést a ranglistán.

## 2. Jelenlegi Helyzet

Jelenleg kevés olyan online platform létezik, amely a Plinko játékot csak mint élményt kínálja valós kifizetés nélkül felhasználóbarát környezetben. Főleg a 18 év alatti játékosok olyan weboldalt keresnek, amik megadja nekik az élményt anélkül, hogy az korhatárhoz kötött lenne, ugyanakkor biztosítsa az egészséges verseny lehetőségét pontszámokban.

## 3. Vágyálom rendszer

Egy reszponzív webalapú Plinko játék, amely lehetővé teszi a felhasználóknak:

- Regisztrációt és bejelentkezést.
- Különböző kockázati szintek és sorok számának beállítását.
- Nyeremények megszerzését a labda véletlenszerű mozgása alapján.
- Ranglistán való versengést.
- Profiljuk testreszabását.

## 4. Funkcionális követelmények

- **Felhasználói regisztráció és bejelentkezés**.
- **Tét elhelyezése**: A felhasználó megadhatja a tét összegét a megengedett minimum és maximum között.
- **Kockázati szint választása**: Alacsony, közepes vagy magas kockázati szint kiválasztása.
- **Sorok számának beállítása**: 8 és 16 sor között.
- **Játék indítása és labda leejtése**.
- **Nyeremény kiszámítása és jóváírása**.
- **Ranglista megjelenítése**.
- **Profil szerkesztése**.
- **Játéktörténet megtekintése**.
- **Vendég mód**: Játék lehetősége regisztráció nélkül, nyeremények mentése nélkül.

## 5. Törvények

- **GDPR**: Megfelelés az adatvédelmi előírásoknak.
- **Szerencsejáték törvények**: Megfelelés a helyi szerencsejáték szabályozásoknak és engedélyeknek.

## 6. Jelenlegi üzleti folyamatok modellje

A játékosok különböző online kaszinó oldalakon játszanak, amelyek nem mindig nyújtanak biztonságos és megbízható szolgáltatást, vagy nem kínálják a Plinko játékot.
Általában ezeket az oldalkat nem lehet regisztráció nélkül használni, ami korhatárhoz vagy lakóhely területéhez kötött.

## 7. Igényelt üzleti folyamatok modellje

- **Regisztráció és bejelentkezés**: A felhasználók létrehozhatják a fiókjukat és bejelentkezhetnek.
- **Játék beállítása**: Tét összegének megadása, kockázati szint és sorok számának kiválasztása.
- **Játék indítása**: Labda leejtése és nyeremény kiszámítása.
- **Nyeremény jóváírása**: Nyeremények automatikus jóváírása a felhasználó egyenlegére.
- **Ranglista megtekintése**: A legjobb játékosok megtekintése.
- **Profil kezelése**: Felhasználói adatok szerkesztése.

## 8. Fogalomtár

- **Plinko**: Kaszinó játék, ahol a labdát leejtik egy piramis alakú, tüskékkel teli táblán, és a labda véletlenszerűen pattogva érkezik meg egy rekeszbe, amely meghatározza a nyereményt.
- **Kockázati szint**: A játék nehézségi szintje, amely befolyásolja a nyeremények mértékét és esélyét.
- **Sorok száma**: A tábla magassága, amely meghatározza a tüskék számát és a lehetséges útvonalak számát.
- **Tét**: Az a pénzösszeg, amelyet a játékos a játékba helyez.
- **Nyeremény**: A játékos által nyert pénzösszeg a tét és a szorzó alapján.

## 9. Követelménylista

| Funkció                         | Részletes leírás                                                                                         |
|---------------------------------|----------------------------------------------------------------------------------------------------------|
| **Regisztráció lap**            | Felhasználói fiók létrehozása felhasználónév, email és jelszó megadásával.                               |
| **Bejelentkezés lap**           | Bejelentkezés a rendszerbe email és jelszó megadásával.                                                  |
| **Játék beállítása**            | Tét összegének, kockázati szintnek és sorok számának megadása.                                           |
| **Játék indítása**              | Labda leejtése és animáció megjelenítése.                                                                |
| **Nyeremény kiszámítása**       | Nyeremény meghatározása a labda végső pozíciója és a szorzó alapján.                                     |
| **Nyeremény jóváírása**         | Nyeremény automatikus hozzáadása a felhasználó egyenlegéhez.                                             |
| **Ranglista megtekintése**      | Legjobb játékosok listájának megtekintése a nyeremények alapján.                                         |
| **Profil szerkesztése**         | Felhasználói adatok és profilkép módosítása.                                                             |
| **Játéktörténet megtekintése**  | Korábbi játékok, tétek és nyeremények megtekintése.                                                     |
| **Vendég mód**                  | Játék lehetősége regisztráció nélkül, nyeremények mentése nélkül.                                        |
| **Jelszó visszaállítás**        | Elfelejtett jelszó esetén email alapú visszaállítás.                                                     |
| **Kilépés gomb**                | Kijelentkezés a fiókból.                                                                                 |
