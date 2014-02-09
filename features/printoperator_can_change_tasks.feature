# language: pl
Scenariusz: Operator maszyn moze zmieniac zlecenie
  Zakładając że jestem zalogowany jako operator
  I klikam na link Edytuj przy zleceniu "7"
  Wtedy widzę formularz edycji zlecenia
  Kiedy zmieniam opis na "folia cienka"
  I klikam przycisk zapisz
  Wtedy jestem na liscie zlecen
  I widzę opis "folia cienka"  przy zleceniu "7"
  I w historii zmian zlecenia "7"  widzę
    | data    | pole | stara wartosc | nowa wartosc |
    | dzisiaj | opis | folia         | folia cienka |