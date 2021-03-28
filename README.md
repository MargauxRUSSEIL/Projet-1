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

afin de générer un dossier vendor. 

Après avoir lancé votre serveur, sur phpmyadmin :
* Créez une base de donnée que vous appelez *lpdw*, au format *utf8_general_ci*
* Insérer le fichier *lpdw.sql* dans la base de donnée

## Lancer le projet

Créez un fichier **.env.local** dans lequel vous mettez vos informations de connexion à la base de donnée :

```
DATABASE_URL=mysql://root:root@127.0.0.1:8889/lpdw?serverVersion=5.7.30
À COMPLÉTER AVEC LES AUTRES POSSIBILITÉS
```

Rendez-vous sur le répertoire du projet, lancez le serveur symfony :

```
cd Projet-1
symfony server:start
```

Les requêtes sur les différentes tables de la base de donnée sont ensuite accessibles ici : [https://127.0.0.1:8000/api/](https://127.0.0.1:8000/api/)

### Question ? Problème ?

Sur Discord ! Channel *projet-1*. 