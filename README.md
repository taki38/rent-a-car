# -rent-a-car-
#Clonez le projet
$ git clone https://github.com/taki38/rent-a-car.git

#Allez dans le répertoire
$ cd rent-a-car

#Installer les dépendances (Vendor)

$ composer install

#Creation de la Base de données et des tables
Editez la ligne 18 du .env pour mettre vos informations

$ php bin/console doctrine:database:create

$ php bin/console doctrine:migrations:migrate

#Chargez les fixtures Fixtures
$ php bin/console hautelook:fixtures:load --no-interaction

#Lancer l'application application
$ symfony server:start

#Pour se connectez :

Utilisateur avec ROLE_USER

email : user@email.fr / password : 123456789

Utilisateur avec ROLE_ADMIN

email : admin@email.fr / password : 123456789


# Si vous souhaitez devenir un développeur professionnel je vous recommande fortement : https://www.smaine.me/