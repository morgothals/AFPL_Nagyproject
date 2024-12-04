# Tesztelési Jegyzőkönyv

## 1. Áttekintés

**Projekt neve:**  Plinko Game  
**Verzió:**  1.0  
**Dátum:**  2024.12.04  
**Készítette:**  Borbás Péter, Korózs Attila, Galuska Gergely  
**Tesztelő:**  Borbás Péter  

## 2. Tesztelési Célok

- Ellenőrizni, hogy a kezdő egyenleg helyesen jelenik meg
- Tesztelni a tét összege módosíthatóságát
- Ellenőrizni, hogy a kockázati szint váltása megfelelően működik
- Megvizsgálni, hogy a rendszer figyelmeztet, ha a tét összege nulla
- Ellenőrizni, hogy a rendszer nem engedi a fogadást, ha nincs elég egyenleg
- Tesztelni, hogy a fogadás után csökkenti az egyenleget
- Ellenőrizni, hogy a fogadás után labdát ad hozzá a játékhoz
- Ellenőrizni a szorzók frissítését a kockázati szint váltásakor
- Ellenőrizni, hogy a nyeremény helyesen van kiszámítva
- Ellenőrizni, hogy a nyeremény összege helyesen jelenik meg
- Megvizsgálni, hogy az API hívások helyesen frissítik az egyenleget

## 3. Tesztelési Módszerek

- Módszer 0: Manuális tesztelés
- Módszer 1: Unit tesztelés Vue.js komponensek használatával
- Módszer 2: API hívások szimulálása mock-olással

## 4. Tesztelési Környezet

- **Operációs rendszer:** Windows 10  
- **Szoftververzió:** Google Chrome 116, Mozilla Firefox 102  
- **Hardver:** Intel i7 10. generáció, 16 GB RAM  
- **Egyéb:** Internetkapcsolat: 100 Mbps

## 5. Tesztesetek

| Teszteset azonosító | Leírás                                                       | Elvárt eredmény                                            | Aktuális eredmény    | Megjegyzések           |
|---------------------|-------------------------------------------------------------|------------------------------------------------------------|----------------------|------------------------|
| TC-001              | Kezdő egyenleg helyes megjelenítése                          | Az egyenleg 1000 Ft-ként jelenik meg a képernyőn           | Sikeres              | Teszt környezet: Chrome|
| TC-002              | Tét összege módosíthatósága                                 | A tét összege sikeresen módosítható                         | Sikeres              |                        |
| TC-003              | Kockázati szint váltása működése                            | A kockázati szint változtatása sikeresen frissíti a változót | Sikeres              |                        |
| TC-004              | Figyelmeztetés tét összeg nulla esetén                      | A rendszer figyelmeztet, ha a tét nulla                     | Sikeres              |                        |
| TC-005              | Fogadás, ha nincs elég egyenleg                             | A rendszer nem enged fogadni, ha nincs elég egyenleg       | Sikeres              |                        |
| TC-006              | Egyenleg csökkentése fogadás után                           | Az egyenleg a fogadás után csökken az elvárt módon          | Sikeres              |                        |
| TC-007              | Labda hozzáadása fogadás után                              | A játékban hozzáadódik egy labda fogadás után              | Sikeres              |                        |
| TC-008              | Szorzók frissítése kockázati szint váltásakor              | A szorzók változnak a kockázati szint váltásakor            | Sikeres              |                        |
| TC-009              | Nyeremény kiszámítása helyesen                              | A nyeremény kiszámítása helyesen történik                   | Sikeres              |                        |
| TC-010              | Nyeremény helyes megjelenítése                              | A nyeremény 200 Ft-ként jelenik meg a képernyőn            | Sikeres              |                        |
| TC-011              | API hívás sikeres egyenleg frissítésekor                   | Az API sikeresen frissíti az egyenleget                    | Sikeres              |                        |
| TC-012              | Egyenleg betöltése az API-ból                               | Az API sikeresen betölti az egyenleget                      | Sikeres              |                        |

## 6. Tesztelési Eredmények

- **Sikeres tesztek:**  11/11  
- **Sikertelen tesztek:**  0  
- **Kérdések és észrevételek:**  
  - Minden funkció a vártnak megfelelően működik.
