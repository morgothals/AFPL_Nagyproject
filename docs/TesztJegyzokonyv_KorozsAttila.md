# Tesztelési Jegyzőkönyv

## 1. Áttekintés

**Projekt neve:**  Plinko  
**Verzió:**  1.1  
**Dátum:**  2024.12.04  
**Készítette:**  Borbás Péter, Korózs Attila, Galuska Gergely  
**Tesztelő:**  Korózs Attila 

## 2. Tesztelési Célok

- Biztosítani, hogy a felhasználói felület könnyen használható és átlátható.
- Ellenőrizni, hogy a weboldal mobilbarát és reszponzív legyen.
- Az adatbázis frissítése és adatkezelése megfelelően történik.
- A felhasználói session kezelése és lejárata megfelelően működik.
- Nyelvi beállítások tesztelése és a magyar nyelv helyes megjelenítése.
- A Ranglista sorrendjének helyes megjelenítése az egyenleg alapján.
- Böngészőkompatibilitás ellenőrzése különböző eszközökön.
- Hibakezelési és hibaüzenetek helyes megjelenítése felhasználói hibák esetén.


## 3. Tesztelési Módszerek

- Módszer 1: Manuális tesztelés böngészőben különböző eszközökön
- Módszer 2: SQL lekérdezések használata az adatbázis teszteléséhez


## 4 Tesztelési Környezet

### 4.1 Tesztelési Környezet 1

- **Operációs rendszer:** Windows 10
- **Szoftververzió:** Google Chrome 129, Mozilla Firefox 102
- **Hardver:** Intel i5 4. generáció, 16 GB RAM
- **Egyéb:** Internetkapcsolat: 1000 Mbps

## 4.2 Tesztelési Környezet 2

- **Operációs rendszer:** Android 13
- **Szoftververzió:** Google Chrome 129
- **Hardver:** Snapdragon 680, 6 GB RAM
- **Egyéb:** Internetkapcsolat: 480 Mbps

## 5. Tesztesetek

| Teszteset azonosító | Leírás                                       | Elvárt eredmény                              | Aktuális eredmény      | Megjegyzések            |
|---------------------|---------------------------------------------|----------------------------------------------|-----------------------|-------------------------|
| TC-001              | Felhasználói felület kezelhetősége           | Könnyen használható UI, nincsenek hibák      | Sikeres               |  |
| TC-002              | Reszponzív dizájn ellenőrzése                | Oldal reszponzív különböző képernyőkön       | Sikeres               | minden eszközön         |
| TC-003              | Felhasználói adatbevitel validálása          | Az adatok helyes formátumúak és validáltak   | Sikeres               |                         |
| TC-004              | SQL Injection elleni védelem                 | Az űrlapok védettek SQL Injection ellen      | Sikeres               |                         |
| TC-005              | Felhasználói session kezelése                | A session helyesen kezelődik és lejár        | Sikeres               |                         |
| TC-006              | Bejelenkezett oldal helyesen jelenik meg     | Csak a megfelelő menüpont jelenik meg.       | Sikeres               |                         |
| TC-007              | Adatbázis frissítése fogadás hozzáadásakor   | Az adatbázis helyesen frissül új eredmény esetén | Sikeres             |                         |
| TC-008              | A ranglista tesztelése                       | Az adatbázissal alapján jelenik meg.         | Sikeres               |                         |
| TC-009              | Nyelvi beállítások ellenőrzése               | Az oldal magyar nyelven jelenik meg          | Sikeres               |                         |
| TC-010              | Api hívások                                  | A specifikációnak megfelelően jelenik meg    | Sikeres               |                         |
| TC-011              | Böngészőkompatibilitás tesztelése            | Az oldal jól működik különböző böngészőkben  | Sikeres               |                         |
| TC-012              | Hibás adatbevitel kezelése                   | Hibaüzenet jelenik meg rossz adatbevitelkor  | Sikeres               |                         |
| TC-013              | Hibaüzenetek helyes megjelenítése            | Hibás működés esetén megfelelő hibaüzenet    | Sikeres               |                         |

## 6. Tesztelési Eredmények

- **Sikeres tesztek:**  13/13  
- **Sikertelen tesztek:**  0  
- **Kérdések és észrevételek:**  
  - Minden funkció a vártnak megfelelően működik.