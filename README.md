## Development

### Up dockers containers:

```bash
docker-compose up
```
Nginx will be available on `localhost:80` and PostgreSQL on `localhost:5432`.

[More info](docs/docker.md)

### Run comands

```bash
docker-compose run composer <cmd>
```
`cmd` - needs commands

### Create user
```bash
docker-compose run composer php bin/console fos:user:create test_user
```

## API

[Authorization](docs/authorization.md)

[API routes](docs/api.md)
