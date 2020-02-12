# kobe-coding-challenge starter

Starter kit for the Kobe coding challenge, using Lumen and Vue.

# Get started

```bash
# Build docker containers
cd kobe-coding-challenge
docker-compose build

# Run all
docker-compose up

# Run commands inside containers
docker-compose exec <container> <command>
# e.g. docker-compose exec lumen-api php artisan migrate
```

Lumen backend: http://localhost:8000/
Vue frontend: http://localhost:3000/

# Code challenge begins

## Important notes
This section will be constantly updated / appended throughout the project until completion.

The following are personal notes taken, during the development of this project:
1. Modified Dockerfile to resolve installation of ``mysql-client``, resolved to ``mariadb-client``.
1. ``docker-compose.yml`` config for ``vue-spa`` port is open to ``8080``.
1. ``phpmyadmin`` is an additional image, built together among the other ``docker`` images.
1. 

## Installation

### Setting up local environment
1. Perform the following steps, to build and run docker images:
   ```bash
   # Proceed to project folder.
   cd kobe-coding-challenge-starter
   # Builds, recreates, starts, and attaches to containers for a service (along with building the images, before starting the containers).
   docker-compose up -d --build
   # Run migrations, seeding is optional.
   docker-compose exec lumen-api php artisan migrate --seed
   # Run migrations with refresh, seeding is optional.
   docker-compose exec lumen-api php artisan migrate:refresh --seed
   ```
   If there is an issue with rebuilding, perform the tasks below then rinse-and-repeat:
   ```bash
   # Stop all found processes
   docker stop $(docker ps -a -q)
   # Remove all found processes
   docker rm -f $(docker ps -a -q)
   # Spin them up again.
   docker-compose up -d --build
   # Run cache:clear once in a while, if required.
   docker-compose exec lumen-api php artisan cache:clear
   ```
1. Import and prepare your POSTMAN collection of example API requests (optional):
    ```
    ./KOBE-Coding-Challenge-Starter.postman_collection.json
    ```
    It is located at the project root folder, where you'll be able to run example API requests.
    This file is constantly updated when there's continued development on the ``lumen-api`` application.
    Also, a useful collection to perform internal tests with the ``lumen-api`` application.
1. Connect to your ``docker`` containers:
    1. lumen-api (lumen) - http://localhost:8000
    1. vue-spa (vue) - http://localhost:8080
    1. db (mysql) - hostname:db, port:3306, database:lumen auth:root/root
    1. phpmyadmin - http://localhost:8082
1. Proceed to define and update ``Dockerfile`` build configurations (and fixes), along with ``composer`` and ``yarn`` requirements.
1. Start building with ``lumen`` and ``vue``.

### lumen-api
#### Step 1
1. Define the ``Dockerfile`` build configurations for ``php`` and ``nginx``, along with ``composer.json`` requirements.
1. Enable ``eloquent`` and ``facades``.
1. Define ``user`` MVC (with migration files), and override ``Authenticate.php`` middleware to use **api token authentication**. 
1. Added ``phpmyadmin`` to ``docker-compose.yml`` image build.
1. Proceeded to turn on middleware for user authentication.
1. Proceeded further to add ``LoginController`` functions, for user login and validation.
1. 
1. 

#### vue-spa
##### Step 1
1. 
