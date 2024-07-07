# Halal Life Website
Halal Life

## Run Project
### clone the repositories

```
git clone https://github.com/mrleos/reksaleosaputra_technovation_halalLife.git
```

### Setup Local Server, Database and Run Server

Install all the dependencies using composer

     composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Run the database migrations & seeders (**Set the database connection in .env before migrating**)

    php artisan migrate

    if you not using migration, import database on halallife.sql to your local computer

Run the database seeders

    php artisan db:seed --class=RoleSeeder
    php artisan db:seed --class=UserSeeder

Genrate Key

    php artisan key:generate


Start the local development server

    php artisan serve

You can login using 
- User
    email : user@gmail.com
    password : 12345678
  
- Admin
    email : admin@gmail.com
    password : 12345678

Or create new user

