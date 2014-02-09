# language: pl
Aspekt: Zeby moc obslugiwać maszyny i wykonywać zlecenia
        Jako operator maszyn wielkoformatowych
        Muszę widziec listę oczekujacych zleceń wg priorytetu im wyzszy tym wazniejszy

Założenia:
Zakładając że są następujące zlecenia:
    | klient | Deadline     | numer | opis   | specyfikacja | priorytet | status      | maszyna |
    | Makro  | 2014-01-31   |  6    | baner  | dlugitext    | 3         | oczekujące  | agfa    |
    | Makro  | 2014-01-30   |  5    | baner2 | dlugitext    | 2         | oczekujące  | agfa    |
    | Makro  | 2014-01-29   |  4    | baner2 | dlugitext    | 1         | oczekujące  | agfa    |
    | BMW    | 2014-02-03   |  7    | folia  | dlugitext    | 2         | w produkcji | roland  |
    | Rolex  | 2014-02-05   |  8    | OWV    | dlugitext    | 3         | wstrzymane  | roland  |
    | ToiToi | 2014-02-02   |  9    | PCV    | dlugitext    | 2         | zakończone  | roland  |
    | ToiToi | 2014-02-02   |  9    | PCV    | cncnncncc    | 2         | oczekujące  | cnc     |

Scenariusz: Wyswietlanie listy zlecen
  Zakładając ze jestem zalogowany jako operator
  Wtedy na pulpicie widzę “druk” zobaczyc nastepujace zlecenia:
    | numer |
    |  6    |
    |  5    |
    |  4    |
  I powinienem widziec “dlugitext” po rozwinieciu zlecenia “7"


Scenariusz: Operator maszyn moze zmieniac zlecenie
  Zakładając ze jestem zalogowany jako operator
  I klikam na link Edytuj przy zleceniu “7”
  Wtedy widzę formularz edycji zlecenia
  Kiedy zmieniam opis na “folia cienka”
  I klikam przycisk zapisz
  Wtedy jestem na liscie zlecen
  I widzę opis “folia cienka” przy zleceniu “7”
  I w historii zmian zlecenia “7” widzę
      | data    | pole | stara wartosc | nowa wartosc |
      | dzisiaj | opis | folia         | folia cienka |


#Scenariusz: Operator maszyn moze zmieniac status zlecenia przyciskiem na liscie
#Scenariusz: operator maszyn wielkoformatowych moze zmieniac zlecenie
#Scenariusz: Kierownik moze zmieniac priorytet zleceń
#Scenariusz: Gdy zmieniane jest zlecenie mam dostęp do poprzedniej wersji
#Scenariusz: Wprowadzanie klienta
#Scenariusz: Wprowadzanie maszyn z typem


	

