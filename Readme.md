# Selenite

This code is NOT production ready! Do not expect this to be written as if I was
paid a fair wage when writing it!!

The app will be deployed on [localhost](http://127.0.0.1:8080)

Default login is test@testing.com:itestnow

## Explaination of my app

I have a calculator for calculating how long it takes to resource grind the most
difficult to obtain resource in the game. That was my original functionality
that I proposed. I also have a timer for in game events on the index page. This
is fetched and updated using my api, so no page refreshes are needed. Pressing a
refresh button makes everything work!

My final functionality for CRUD is my user section as well as the index page
where you see the next location of the Void Trader Baro Ki'Teer. This can later
be used to add custom guides, but right now, it serves as a means to an end. A
means for me to showcase that I can do CRUD operations. In this app, you can
create users. You can read user data, as shown in the top bar and also in the
profile page. You can update your username and password, which is Update
functionality. And you can delete your user.

PS: I no longer use my own database of planets, as I have moved to a new API
which does not need me to use my own data. I made the move due to some features
being unavailable in the official api for warframe, which I was using prior.
However I still read user info in my profile page so CRUD is still being used

As for the MVC pattern: I tried my best to follow it, and I believe I succeeded.
I have separated all the logic and the models and the UI. I even allow the UI
files to all be .html instead of .php. This also emphasises the focus on the
views being purely aesthetic rather there being logic in them. I also had some
major changes to the way I wanted to make my app. And I believe the MVC pattern
allowed me to modify bits of code here and there and undergo a somewhat big
modification with ease.

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
