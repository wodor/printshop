# language: pl
Aspekt: Zeby moc obslugiwać maszyny i wykonywać zlecenia
        Jako operator maszyn wielkoformatowych
        Muszę widziec listę oczekujacych zleceń wg priorytetu im wyzszy tym wazniejszy

Założenia:
Zakładając że są następujące modele maszyn:
  | typ   | nazwa   |
  | print | agfa    |
  | print | roland  |
  | cnc   | cNc     |
Zakładając że są następujące zlecenia:
    | klient | Deadline     | numer | opis   | specyfikacja | priorytet | status      | maszyna |
    | Makro  | 2014-01-31   |  6    | baner  | dlugitext    | 3         | oczekujące  | agfa    |
    | Makro  | 2014-01-30   |  5    | baner2 | dlugitext    | 2         | oczekujące  | agfa    |
    | Makro  | 2014-01-29   |  4    | baner2 | dlugitext    | 1         | oczekujące  | agfa    |
    | BMW    | 2014-02-03   |  7    | folia  | dlugitext    | 2         | w trakcie   | roland  |
    | Rolex  | 2014-02-05   |  8    | OWV    | dlugitext    | 3         | wstrzymane  | roland  |
    | ToiToi | 2014-02-02   |  9    | PCV    | dlugitext    | 2         | zakończone  | roland  |
    | ToiToi | 2014-02-02   |  10   | PCV    | cncnncncc    | 2         | oczekujące  | cnc     |

Scenariusz: Wyswietlanie listy zlecen
  Zakładając że jestem zalogowany jako operator
  Wtedy powinienem widziec "dlugitext" w specyfikacji zlecenia "6"
  I powinienem widziec "agfa" w rubryce maszyna zlecenia "6"
  Oraz na pulpicie widzę nastepujace zlecenia:
    | numer |
    |  6    |
    |  5    |
    |  4    |
    |  7    |
  I powinienem widziec "dlugitext" w specyfikacji zlecenia "5"
  I powinienem widziec "agfa" w rubryce maszyna zlecenia "5"


Scenariusz: Operator maszyn moze zmieniac status zlecenia przyciskiem na liscie
  Zakładając że jestem zalogowany jako operator
  Kiedy klikam przycisk statusu "W trakcie" dla zlecenia "6"
  Wtedy na pulpicie widzę nastepujace zlecenia:
      | numer |
      |  6    |
      |  5    |
      |  4    |
      |  7    |
  I powienienem widziec status "W trakcie" dla zlecenia "6"
  Kiedy klikam przycisk statusu "Zakończone" dla zlecenia "6"
  Wtedy na pulpicie widzę nastepujace zlecenia:
    | numer |
    |  5    |
    |  4    |
    |  7    |
  Kiedy kliknę na link "Zlecenia wykonane"
  Wtedy widzę nastepujace zlecenia:
    | numer |
    |  6    |
    |  9    |
  I powienienem widziec status "Zakończone" dla zlecenia "6"



#Scenariusz: operator maszyn wielkoformatowych moze zmieniac zlecenie
#Scenariusz: Kierownik moze zmieniac priorytet zleceń
#Scenariusz: Gdy zmieniane jest zlecenie mam dostęp do poprzedniej wersji
#Scenariusz: Wprowadzanie klienta
#Scenariusz: Wprowadzanie maszyn z typem


	

