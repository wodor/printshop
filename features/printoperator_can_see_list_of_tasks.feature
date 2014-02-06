Feature: 
Zeby moc obslugiwać maszyny i wykonywać zlecenia
 	Jako operator maszyn wielkoformatowych 
	Muszę widziec listę oczekujacych zleceń wg priorytetu im wyzszy tym wazniejszy 
	
Scenario: Wyswietlanie listy zlecen
Zakladajac że są następujące zlecenia:
| klient | Deadline     | numer | opis   | specyfikacja | priorytet | status      | maszyna | 
| Makro  | 2014-01-31   |  6    | baner  | dlugitext    | 3         | oczekujące  | agfa    |
| Makro  | 2014-01-30   |  5    | baner2 | dlugitext    | 2         | oczekujące  | agfa    |
| Makro  | 2014-01-29   |  4    | baner2 | dlugitext    | 1         | oczekujące  | agfa    |
| BMW    | 2014-02-03   |  7    | folia  | dlugitext    | 2         | w produkcji | roland  |
| Rolex  | 2014-02-05   |  8    | OWV    | dlugitext    | 3         | wstrzymane  | roland  |
| ToiToi | 2014-02-02   |  9    | PCV    | dlugitext    | 2         | zakończone  | roland  |
| ToiToi | 2014-02-02   |  9    | PCV    | cncnncncc    | 2         | oczekujące  | cnc     |
Kiedy loguję się
Powinienem na liscie zlecen “druk” zobaczyc nastepujace zlecenia:
| numer |
|  6    | 
|  5    |
|  4    |
I powinienem widziec “dlugitext” po rozwinieciu zlecenia “7" 

Scenario: Wprowadzanie zlecenia o dowolnym statusie
Zakładając że jestem zalogowany jako Kierownik
I klikam przyciski dodaj zlecenie
Kiedy wprowadzam następujące zlecenie poprzez formularz:
| klient | Deadline     | numer | opis   | priorytet | status     | maszyna |
| BMW    | 2014-02-03   |  7    | folia  | 2         | wstrzymane | agfa    |
Powinienem na liscie wszystkich zlecen zobaczyc nastepujace zlecenia:
| numer | status     |
|  1    | wstrzymane |


Scenario: Kierownik moze obejrzec listę wszytkich zlecen z filtrowaniem i sortowaniem 
Zakladajac ze jestem zalogownay jako kierownik
I sa nastepujace zlecenia [...]
Kiedy wchodzę na listę wszystkich zlecen
Powinienem zobaczyc nastepujaca liste zlecen:
| numer |
|  4    |
|  5    |
|  6    |
|  7    |
|  8    |
|  9    |
Kiedy w filtrze “Klient” wybieram “BMW”:
Powinienem zobaczyc nastepujaca liste zlecen:
| numer |
	| 7    |


Scenario: operator maszyn wielkoformatowych moze zmieniac status zlecenia przyciskiem na liscie
Zakladajac ze jestem zalogownay jako operator 
I sa nastepujace zlecenia [...]
Kiedy klikam na link Edytuj przy zleceniu “7”
Wtedy widzę formularz edycji zlecenia
Kiedy zmieniam opis na “folia cienka”
I klikam przycisk zapisz 
Wtedy jestem na liscie zlecen
I widzę opis “folia cienka” przy zleceniu “7”
I w historii zmian zlecenia “7” widzę 
	| data    | pole | stara wartosc | nowa wartosc |
	| dzisiaj | opis | folia         | folia cienka |


Scenario: operator maszyn wielkoformatowych moze zmieniac zlecenie

Scenario: Kierownik moze zmieniac priorytet zleceń
Scenario: Gdy zmieniane jest zlecenie mam dostęp do poprzedniej wersji
#Scenario: Wprowadzanie klienta		
Scenario: Wprowadzanie maszyn z typem


	

