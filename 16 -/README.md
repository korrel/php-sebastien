# TITRE

On veut créer une plateform des bandes annonces de WOW

Projet :
- Créer un Dépôt Github
- Faire le lien entre le dépôt local
- Penser à la BDD...

Pages :

--- PARTIE 1 ---
- (index.php) Accueil -> Liste des bandes annonces triée par catégorie

- (movie_single.php?id=4) -> On peut voir un film
- (movie_add.php) -> On peut ajouter un film dans la BDD

--- PARTIE 2 ---
- (movie_edit.php?id=4) -> On peut modifier un film dans la BDD
- (movie_delete.php?id=4) -> On peut supprimer un film dans la BDD. On doit avoir un bouton supprimer sur la liste des films, on clique, on supprimer le film en question et on revient sur la liste des films.


--- PARTIE 3 ---
- (register.php) Inscription -> Formulaire d'inscription (email, user, mot de passe, confirmer le mot de passe)
- (login.php) Connexion -> Formulaire de connexion (email, mot de passe)

--- PARTIE 4 ---
- Les pages Voir, Ajouter, Modifier et supprimer un film ne sont accessible que par quelq'un qui est connecté.

--- PARTIE 5 ---
- (forget.php) Mot de passe oublié -> 1er formulaire où on saisit l'email, s'il existe, on envoie un lien à l'utilisateur par mail pour redéfinir son mot de passe. Ce lien doit être unique et optionnellement valide seulement 24h.(sinon 404). Si le lien est valide, on arrive sur un 2ème formulaire où on redéfinit son mot de passe (mot de passe, confirmer le mot de passe).

Structure :

BDD : 
- Movie : id, title, description, video_link, cover, released_at, category_id
- Category : id, name
- User : id, username, emil, password, token, token_expiration