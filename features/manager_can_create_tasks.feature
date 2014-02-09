# language: pl
Aspekt: Zeby moc przekazywac informacje o zleceniu do realizacji
Jako kierownik
Muszę mieć możliwość dodawania zleceń

Scenariusz: Wprowadzanie zlecenia o dowolnym statusie
Zakładając że jestem zalogowany jako Kierownik
I klikam przycisk dodaj zlecenie
Kiedy wprowadzam następujące zlecenie poprzez formularz:
| klient | Deadline     | numer | opis   | priorytet | status     | maszyna |
| BMW    | 2014-02-03   |  7    | folia  | 2         | wstrzymane | agfa    |
Wtedy Powinienem na liscie wszystkich zlecen zobaczyc nastepujace zlecenia:
| numer | status     |
|  1    | wstrzymane |

