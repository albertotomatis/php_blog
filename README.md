# BLOG PHP

E' scritto in **PHP** con **OOP**, senza l'ausilio di framework.<br>	
E' possibile utilizzarlo come modello **BACK-END** per creare un blog, cambiando solo il front-end.<br>

Segue il MVC, nella cartella classes c'è un **MODELLO** (DatabaseTable) per le **QUERY** al database **MYSQL** e le **ROUTES**.<br>
Dentro la cartella classes, c'è la cartella **CONTROLLER**.<br>
Nella cartella templates ci sono le varie **VISTE**.<br>
Inoltre è presente nella cartella includes un file blog.sql contenente le tabelle del database già create.<br>

E' possibile effettuare operazioni **CRUD** ai post, alle categorie e agli autori.

E' possibile inoltre assegnare **PERMESSI BINARI** agli utenti e aggiungere nuovi permessi fino a un massimo di 64.

E' presente una funzione di **CERCA con FILTRI** riguardante i post.

Solo l'admin può **REGISTRARE** nuovi autori.<br>
Eseguire il **LOGIN** come admin@email.it e inserire come password 123456789<br>
Le password sono salvate nel db con l'HASH.

E' possibile **MODIFICARE LA PASSWORD**.

L'utente loggato accede alla **DASHBOARD**.







