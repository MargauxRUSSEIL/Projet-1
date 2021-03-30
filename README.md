# API Projet 1

## Installation

Suivez les étapes ci-dessous pour obtenir un accès vers l'API du projet 1. 

### Prérequis

Il faut avoir installé sur votre machine : 

* [Composer](https://getcomposer.org/download/)
* [Symfony](https://symfony.com/download)
* [WAMP](https://www.wampserver.com) - Seulement sur Windows
* [MAMP](https://www.mamp.info/en/downloads/) - Seulement sur macOS

### Récupérer le projet

Après avoir clone le projet, lancez la commande 

```
composer install
```

afin de générer un dossier /vendor. 

Après avoir lancé votre serveur, sur phpmyadmin :
* Créez une base de donnée que vous appelez *api_cy*, au format *utf8_general_ci*
* Insérer le fichier *api_cy.sql*, (présent dans /db), dans la base de donnée

## Lancer le projet

Créez un fichier **.env.local** dans lequel vous mettez vos informations de connexion à la base de donnée :

```
DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=5.7
```
*Remplacez db_user par le nom d'utilisateur de base de données, db_password par son mot de passe et db_name par le nom de la base de données (api_cy). Pensez aussi à mettre à jour votre port et votre version de serveur.*

Rendez-vous sur le répertoire du projet, lancez le serveur symfony :

```
cd Projet-1
symfony server:start
```

Les requêtes sur les différentes tables de la base de donnée sont ensuite accessibles ici : [https://127.0.0.1:8000/api/](https://127.0.0.1:8000/api/)

> :warning: Pour les questions, rendez-vous sur Discord, channel projet-1 !
