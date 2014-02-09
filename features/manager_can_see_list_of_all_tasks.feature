# language: pl
Aspekt: Aby miec kontrolę nad biezacymi zleceniami i wglad w historie
  Jako kierownik
  Muszę widziec listę wszystkich zlecen wraz z filtrami


Scenariusz: Kierownik moze obejrzec listę wszytkich zlecen z filtrowaniem i sortowaniem
  Zakladajac ze jestem zalogownay jako kierownik
  I że są następujące zlecenia:
    | klient | Deadline     | numer | opis   | specyfikacja | priorytet | status      | maszyna |
    | Makro  | 2014-01-31   |  6    | baner  | dlugitext    | 3         | oczekujące  | agfa    |
    | Makro  | 2014-01-30   |  5    | baner2 | dlugitext    | 2         | oczekujące  | agfa    |
    | Makro  | 2014-01-29   |  4    | baner2 | dlugitext    | 1         | oczekujące  | agfa    |
    | BMW    | 2014-02-03   |  7    | folia  | dlugitext    | 2         | w produkcji | roland  |
    | Rolex  | 2014-02-05   |  8    | OWV    | dlugitext    | 3         | wstrzymane  | roland  |
    | ToiToi | 2014-02-02   |  9    | PCV    | dlugitext    | 2         | zakończone  | roland  |
    | ToiToi | 2014-02-02   |  9    | PCV    | cncnncncc    | 2         | oczekujące  | cnc     |
  Kiedy wchodzę na listę wszystkich zlecen
  Wtedy Powinienem zobaczyc nastepujaca liste zlecen:
  | numer |
  |  4    |
  |  5    |
  |  6    |
  |  7    |
  |  8    |
  |  9    |
  Kiedy w filtrze “Klient” wybieram “BMW”:
  Wtedy Powinienem zobaczyc nastepujaca liste zlecen:
  | numer |
  | 7     |