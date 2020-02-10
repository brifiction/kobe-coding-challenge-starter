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
1. Modified Dockerfile to resolve installation of ``mysql-client``, resolved to ``mysql-client-*``.
1. ``docker-compose.yml`` config for ``vue-spa`` port is open to ``8080``.
1. Performed multiple ``renovate`` pull requests, to update ``npm`` packages. Prevented ``lumen`` and php-related 
pull requests.

## Installation

### Setting up local environment
1. Perform the following steps, to build and run docker images:
```bash
cd ``kobe-coding-challenge-starter``.
run ``docker-compose up --build``.
```
1. 