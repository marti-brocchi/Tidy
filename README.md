# saw-progetto21

Database progetto: saw21.dibris.unige.it

Nome Utente: S4784539

Pass Utente: $LaxMarti2122

--------------------------------------------------------------------------------------

Locale - Dati condivisi: **quando scarichiamo il codice dell'altro son da modificare leggermente in DB_connect.php**

Nome Utente: 4784539

Pass Utente: LaxMarti2122 (LAX), LaxMarti2122! (MARTI)

Nome DataBase: saw_progetto21_db (LAX), saw_progetto_21_db (MARTI)

--------------------------------------------------------------------------------------
**Home**
- Decidere il destino della sezione shop (lax vota per tenerla senza linkarla)
- Rivedere immagini sfondo delle sezioni (anche su tutte le altre pagine)

**Registrazione**
- Controllo campi vuoti js + controllo email js ? (già implementati HTML5)

**Login**
- Controllo campi vuoti js + controllo email js ? (già implementati HTML5)

**Change password**
- Controllo nuove password coincidano js (stesso controllo di registrazione)
- Controllo campi vuoti js + controllo email js ? (già implementati HTML5)

**Motore di Ricerca**
- Pensare a come fare query ricerca in modo intelligente
- Stampare risultati ottenuti e link a relative pagine prodotti

**Shop**
- Fare valutazioni prodotti
- Aumentare qualità immagini bracciali

**Carrello**

**Bug Fix**
- ho fixato la visualizzazione nel carrello e ho fatto in modo che aggiungesse i prodotti richiesti da sloggato dopo il login _(figo)_
- in scriptShop.js devo levare il for e usare il bubbling
- c'è ancora qualche log sbagliato perché mi sa che l'ho sovrascritto male io (lax)

**Controlli Sicurezza**
- xss controllato
- controllare protezione da injection
- cambiando i parametri nei link
- controllare protezione ricerca
- controllare ogni volta che vengono stampati dati

**Falle nella Sicurezza da fixare**
- se avvii da link scriptEmailCheck.php?email=...   ti ritorna se quella mail è registrata o meno 
  - come facciamo? lo mettiamo fuori dalla document root? perché anche se sei loggato non potresti vedere sta roba
  - idea migliore che mi è venuta è cambiare la richiesta da get a post _Nota:_ secondo me lo buchi anche con post
  - gestire anche caso in cui non gli viene passato nulla (deve tornare false) 
  - _Commento:_ scriverei alla Ribba prima di essere bocciati per sta cazzata 
 
- checkout.php viene visualizzata anche da link e se non ho ordinato nulla (poco male?) _Commento:_ si risolve facilmente, basta un piccolo controllo che prima o poi farò

- la DBconnect.php siamo sicuri possa stare lì? _Risposta:_ la Ribba ha detto che normalmente non va bene, ma per il progetto di saw va bene

