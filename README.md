# php_blog

E' scritto in PHP con OOP, senza l'ausilio di framework.<br>	
E' possibile utilizzarlo come modello BACK-END per creare un blog, cambiando solo il front-end.<br>

Segue il MVC, nella cartella classes c'è un MODELLO (DatabaseTable) per le QUERY al database MYSQL e le Routes con metodi get e post.<br>
Dentro la cartella classes, c'è la cartella CONTROLLER.<br>
Nella cartella templates ci sono le varie VISTE.<br>
Inoltre è presente nella cartella includes un file blog.sql contenente le tabelle del database già create.<br>

E' possibile effettuare operazioni CRUD ai post, alle categorie e agli autori.

E' possibile inoltre assegnare PERMESSI BINARI agli utenti e aggiungere nuovi permessi fino a un massimo di 64.

E' presente una funzione di CERCA PER TITOLO riguardante i post.

Solo l'admin può REGISTRARE NUOVI AUTORI.
Per cui esegui il LOGIN come admin@email.it e inserisci come password 123456789
E' possibile MODIFICARE LA PASSWORD.

Ora puoi aggiornare i permessi (binari) all'utente già esistente oppure registrare nuovi autori e assegnare loro vari permessi.







