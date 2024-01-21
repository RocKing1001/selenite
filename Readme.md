# Selenite

This code is NOT production ready! Do not expect this to be written as if I was
paid a fair wage when writing it!!

The app will be deployed on [localhost](http://127.0.0.1:8080)

## Explaination of my app

I have a calculator for calculating how long it takes to resource grind the most
difficult to obtain resource in the game. That was my original functionality
that I proposed. I also have a timer for in game events on the index page. This
is fetched and updated using my api, so no page refreshes are needed. Pressing a
refresh button makes everything work! My final functionality for CRUD is my user
section. This can later be used to add custom guides, but right now, it serves
as a means to an end. A means for me to showcase that I can do CRUD operations.
In this app, you can create users. You can read user data, as shown in the top
bar and also in the profile page. You can update your username and password,
which is Update functionality. And you can delete your user.

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

[GNU General Public License v3](https://www.gnu.org/licenses/gpl-3.0.en.html)
