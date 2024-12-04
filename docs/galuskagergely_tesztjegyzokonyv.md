# Tesztelési Jegyzőkönyv

## 1. Áttekintés

**Projekt neve:**  Plinko  
**Verzió:**  1.0  
**Dátum:**  2024.12.04.  
**Készítette:**  Borbás Péter, Korózs Attila, Galuska Gergely  
**Tesztelő:**  Galuska Gergely  

## 2. Tesztelési Célok

- Regisztráció és bejelentkezés hibamentes működésének tesztelése
- Játék megfelelő megjelenítésének tesztelése

## 3. Tesztelési Módszerek

- Oldal tesztelése böngészőkben (Opera GX, Google Chrome)

## 4. Tesztelési Környezet

- Operációs rendszer:  Windows 11
- Szoftververzió:  Google Chrome 129, Opera GX 114
- Hardver:   AMD Ryzen 7 5700X, 16 GB RAM
- Egyéb:  Internetkapcsolat: 910 Mbps

## 5. Tesztesetek

| Teszteset azonosító | Leírás                       | Elvárt eredmény          | Aktuális eredmény | Megjegyzések  |
|---------------------|-----------------------------|--------------------------|-------------------|---------------|
| TC-001              | Regisztrációs menüpont         | Megjelenik a menüpont | Sikeres | A regisztrációs felület hiba nélkül megjelenik  |
| TC-002              | Már van fiókod menüpont         | Átirányít a login oldalra | Sikeres | Átirányít|
| TC-003              | Regisztráció gomb	| A felhasználó be tud regisztrálni	| Sikeres | A felhasználót elmenti a rendszer	|
| TC-004              | Plinko menüpont         | Átirányít a játék oldalra	| Sikeres | Átirányít|
| TC-005              | Tét összege	| A labdák értéke változik	| Sikeres | A labdák értéke beállítható	|
| TC-006              | Kockázati szint	| Állítható a kockázat	| Sikeres | A rekeszek értéke megfelelően változik	|
| TC-007              | Bet gomb	| Elindít egy labdát	| Sikeres | A bet gomb megnyomására leesik egy labda	|
| TC-008              | A rekesz beszorozza az értéket	| A labda értéke a rekesz szorzója alapján változik	| Sikeres | Az összeghez hozzáadja a labda értékét	|
| TC-009              | Több labda	| Egyszerre több labdát is el lehet indítani	| Sikeres | Többszöri megnyomás esetén több labda esik le	|
| TC-010              | Adatbázisban frissül az összeg	| A ranglistán a felhasználó összege változik	| Sikeres | A nyeremény mentésre kerül	|
| TC-011              | Regisztrációnál nem adtam e-mailt	| Kéri hogy adjak meg e-mailt	| Sikeres | Kéri az adat megadását	|
| TC-012              | Regisztrációnál nem adtam meg felhasználót	| Kéri hogy adjak meg felhasználót	| Sikeres | Kéri az adat megadását	|
| TC-013              | Regisztrációnál nem adtam meg jelszót	| Kéri hogy adjak meg jelszót	| Sikeres | Kéri az adat megadását	|
| TC-014              | Regisztrációnál nem ismételtem meg a jelszót	| Kéri hogy adjak meg a jelszót ismét	| Sikeres | Kéri az adat megadását	|
| TC-015              | Regisztrációnál hiányzik a '@'	| Helyes e-mailt kér	| Sikeres | Kiír hibaüzenetet	|
| TC-016              | Jelszó nem megfelelő	| Kéri hogy adjak meg erősebb jelszót	| Sikeres | Hibaüzenetet ír ki	|
