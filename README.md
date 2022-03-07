# Test technique

### Cette application permet d'afficher sous forme de grapique le nombre de personne présente dans une organisation, un batiment et une pièce.


### 1 Configuration :wrench:

- ouvrir un terminal et taper la commande suivante `cd api`
- installer les dépendances `composer install`
- créer sa base de données
- créer le fichier de config `config.ini` dans le dossier app
  - puis renseigner les champs suivants : \
        *DB_HOST=*   (adresse du serveur ex: 127.0.0.1) \
        *DB_USERNAME=*   (identifiant dans la base de données) \
        *DB_PASSWORD=*   (mot de passe de l'utilisateur)\
        *DB_NAME=*   (nom de la base de données)

- importer le fichier test.sql présent dans le dossier /api/docs


### 2 Lancement :computer:

- lancer la commande `php -S localhost:8080` dans le dossier `api`