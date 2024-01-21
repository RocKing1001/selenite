# Selenite

This code is NOT production ready! Do not expect this to be written as if I was
paid a fair wage when writing it!!

The app will be deployed on [localhost](http://127.0.0.1:8080)

## Testing

1. First make a .env file in the root of the project. I have provided some
   sample values, it is advised to reset back to these if MYSQL is not working
   properly.

```env
# .env
MYSQL_ROOT_PASSWORD=root123
MYSQL_USER=dev
MYSQL_PASSWORD=secret123
MYSQL_DATABASE=devdb
```

2. Then run `docker compose up` OR `docker-compose up`
   - For systems running podman, running `sudo docker-compose up` is the only
     correct way to deploy

The SQL migrations are in `./migrations/` directory. They 'should' be loaded
automatically by MariaDB. If they are not, run them one by one.

## Port numbers

Nginx: `8080`

PhpMyAdmin: `8081`

NOTE: I have not set the port number of nginx to 80 because ports below 1000
need root access

## License

[GNU Public License v3](https://www.gnu.org/licenses/gpl-3.0.en.html)
