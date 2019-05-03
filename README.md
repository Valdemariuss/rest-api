## Development

### Up dockers containers:

```bash
docker-compose up
```
Nginx will be available on `localhost:80` and PostgreSQL on `localhost:5432`.

[More info](docs/docker.md)

### Run comands

```bash
docker-compose exec php <cmd>
```
`cmd` - needs commands

### Init necessary database structure
```bash
docker-compose exec php php bin/console doctrine:schema:create
```

### Create user
```bash
docker-compose exec php php bin/console fos:user:create test_user
```

## API

[Authorization](docs/authorization.md)

[API routes](docs/api.md)
