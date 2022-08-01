
# Setup

Sistemare il file .env in base alle proprie esigenze

Lanciare ambiente docker

```
$ cd <HOME-PROGETTO>
$ docker-compose up -d
```

Aggiornare pacchetti

```
$ composer install
$ composer update
```

Aggiornare node_modules

```
$ yarn install
$ yarn dev
```

Eseguire migrations

```
$ php bin/console doctrine:migrations:migrate
```
