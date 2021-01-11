# Projet-1


API en Symfony
-------------------

- API:

    *Il n'y a pour l'instant que la table formations dans l'API pour que les groupes puissent avancées*

    * Utilisation API : 
        - Creer la base de données : 
            - php bin/console doctrine:database:create
        - Migrer la base de données : 
            1. php bin/console make:migration
            2. php bin/console doctrine:migrations:migrate
        - Ouvrir l'API dans le navigateur : 
            1. executer dans le terminal à la racine du projet : php -S localhost:8000 -t public/
            2. mettre dans l'URL : http://localhost:8000/api
        - Dans l'API pour ajouter/supprimer/modifier 
            * Aller dans les onglets delete/put/pach/post 
                * Clicker sur "Try it out"
                * Inserer les valeurs en JSON, executer et verifier si les données on bien été inserer dans la base.
