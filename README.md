# START GAMING website v.0

<picture>
    <img alt="Website preview" src="http://portfolio.parfaitbene.com/wp-content/uploads/2023/06/start_games-img.png">
</picture>

# Nécessite 

Le projet a été testé avec les outils suivants :

- Symfony 5.2.6
- Mysql 5.7.24
- [Composer](https://getcomposer.org/)
- Use [EasyAdmin3](https://symfony.com/doc/5.4/the-fast-track/en/9-backend.html)


# App Setup

## Exercuter la commade suivante à la racine du projet :

`composer install`

## Définir vos paramètres de connexion à la base de données dans le fichier .env :

`DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=5.7`

## Importer la base de données

- Créer votre base de données. Par exemple via phpMyAdmin
- Télécharger le fichier start-db.sql situé à la racine du projet. Ce fichier contient quelques données de base et de démonstration
- Importer le fichier dans votre base de données

# Démarrer l'application

Suivre les étapes de la documentation officielle au lien suivant :
[Running Symfony Applications](https://symfony.com/doc/5.2/setup.html#running-symfony-applications)

# Démonstration

Page d'administration [http://localhost:8000/admin](http://localhost:8000/admin)
