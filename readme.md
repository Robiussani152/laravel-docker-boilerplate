## Docker setup for laravel project

Build the image:
```bash
docker build .
```
Build the image with tag:
```bash
docker build -t <tag_name> .
```
List your Docker images:
```bash
docker image ls
```
Stop the running container:
```bash
docker ps
docker stop <container_id>
```
Rebuild the image with no cache to ensure changes apply:
```bash
docker build --no-cache -t <tag_name> .
```
Mapping port inside the container to port on your host
```bash
docker run --rm -p <host-port>:<container-port> <tag_name>
```
Run all services with:
```bash
docker compose up
```
Run all services and build:
```bash
docker compose up --build
```
Run all services and detached with:
```bash
docker compose up -d
```
Check config:
```bash
docker compose run --rm php -i | grep opcache
```
Run production setup with:
```bash
docker compose -f docker-compose.yml -f docker-compose.prod.yml up --build
```
Checking Running Containers:
```bash
docker compose ps
```
Or
```bash
docker ps
```
Start specific services:
```bash
docker-compose up nginx
```
Run composer, Artisan and npm command like:
```bash
docker-compose run --rm composer create-project laravel/laravel .
docker-compose run --rm composer require spatie/laravel-permission

docker-compose run --rm artisan migrate
docker-compose run --rm artisan make:model Post -m
docker-compose run --rm artisan tinker

docker-compose run --rm composer dump-autoload
docker-compose run --rm npm install
docker-compose run --rm npm run dev
```
Inside a container:
```bash
docker exec -it php sh
```
Build a specific container:
```bash
docker-compose build supervisor
```
Stop a specific container:
```bash
docker-compose stop supervisor
```
Make ssl certs using `mkcert` [repo link](https://github.com/FiloSottile/mkcert)
```bash
mkcert laravel-docker.test
mkcert ws.laravel-docker.test
```