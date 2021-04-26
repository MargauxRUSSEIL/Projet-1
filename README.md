# Projet 1

## Récupérer l'API

Suivez les étapes ci-dessous pour obtenir un accès vers l'API du projet 1. 
Tous les détails concernant la documentation de l'API et la relation des tables de la db sont disponibles sur [ce document](https://docs.google.com/document/d/1JGb5cFcxdDX0LbYnx0emAiKLOLUVOO7Amn6_KUNiN5c/edit).

### Prérequis

Il faut avoir installé sur votre machine : 

* [Composer](https://getcomposer.org/download/)
* [Symfony](https://symfony.com/download)
* [WAMP](https://www.wampserver.com) - Seulement sur Windows
* [MAMP](https://www.mamp.info/en/downloads/) - Seulement sur macOS

### Option 1 : git clone

Dans cette option, vous repartez à zéro avec un répo à jour. 

Après avoir clone le projet dans un nouveau répertoire local, placez vous à la racine /Projet-1, et lancez les commandes suivantes :

```
composer update
composer install
```
Cela va instancier le projet.

Après avoir lancé votre serveur MAMP ou WAMP, sur phpmyadmin :
* Supprimez (ou renommez dans le cas où vous souhaitez conserver une copie) l'ancienne base de donnée *api_cy*
* Créez une nouvelle base de donnée que vous appelez *api_cy*, au format *utf8_general_ci*
* Importer le nouveau fichier *api_cy.sql*, (présent dans le dossier /db du projet), dans la base de donnée afin de la compléter

### Option 2 : git pull

Dans cette option, vous recupérez la nouvelle version directement dans votre répertoire de travail actuel. 

Placez vous à la racine /Projet-1, et lancez les commandes suivantes :

```
git pull
git checkout main
```
Vous avez maintenant la dernière version du projet, et vous êtes placé sur la branche *main*.

Instanciez maintenant le projet avec les commandes suivantes :

```
composer update
composer install
```

Après avoir lancé votre serveur MAMP ou WAMP, sur phpmyadmin :
* Supprimez (ou renommez dans le cas où vous souhaitez conserver une copie) l'ancienne base de donnée *api_cy*
* Créez une nouvelle base de donnée que vous appelez *api_cy*, au format *utf8_general_ci*
* Importer le nouveau fichier *api_cy.sql*, (présent dans /db), dans la base de donnée afin de la compléter

## Lancer le projet 

### Base de donnée

Créez un fichier **.env.local** à la racine /Projet-1 dans lequel vous mettez vos informations de connexion à la base de donnée :

```
DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/api_cy?serverVersion=5.7
```
*Remplacez db_user par le nom d'utilisateur de base de données, db_password par son mot de passe. Concervez bien api_cy en nom de base de données. Pensez aussi à mettre à jour votre port et votre version de serveur.*
> :warning: Attention ici à bien mettre l'IP 127.0.0.1, "localhost" ne fonctionnera pas. 


> :red_circle: Pour éviter tout conflit et erreur lors des migrations, pensez à supprimer toutes les "Versions" présentent dans le dossier /migrations.

Lancez les commandes suivantes pour créer votre première migration vers la nouvelle base de donnée :
```
php bin/console make:migration
php bin/console doctrine:migrations:migrate
```
*Faire entrer jusqu'à la fin du process, jusqu'à obtenir un Success*

### Interface Web

Pour avoir accès à l'interface API sur votre navigateur, lancez le serveur symfony à la racine /Projet-1 :

```
symfony server:start
OU
php -S localhost:8000 -t public/
```
OU
```
php -S localhost:8000 -t public/
```

Les requêtes sur les différentes tables de la base de donnée sont ensuite accessibles ici : [https://127.0.0.1:8000/api/](https://127.0.0.1:8000/api/).

> :warning: Pour les questions, rendez-vous sur Discord, channel projet-1. 
