BeeTest
=======

A Symfony project created on March 1, 2016, 2:54 pm.

This is a REST Review System created with Symfony 3

To install this project, follow this easy steps:

composer install

php bin/console doctrine:database:create
php bin/console doctrine:schema:update --force
php bin/console  doctrine:fixtures:load --fixtures=src/UserBundle/DataFixtures/ORM/ --fixtures=src/AppBundle/DataFixtures/ORM/

Done!



To properly test this REST api, you could install HTTTPie, a very simple to use tool, very useful in testing.

To Get the reviews, one must first login:

http POST http://localhost/beetest/web/app_dev.php/oauth/v2/token \
    grant_type=password \
    client_id=1_3bcbxd9e24g0gk4swg0kwgcwg4o8k8g4g888kwc44gcc0gwwk4 \
    client_secret=4ok2x70rlfokc8g0wws8c8kwcokw80k44sg48goc0ok4w0so0k \
    username=admin \
    password=pass


**Change 'localhost/beetest/web' with your local settings;

The response will be something like:

{
    "access_token": "MDFjZGI1MTg4MTk3YmEwOWJmMzA4NmRiMTgxNTM0ZDc1MGI3NDgzYjIwNmI3NGQ0NGE0YTQ5YTVhNmNlNDZhZQ",
    "expires_in": 3600,
    "refresh_token": "ZjYyOWY5Yzg3MTg0MDU4NWJhYzIwZWI4MDQzZTg4NWJjYzEyNzAwODUwYmQ4NjlhMDE3OGY4ZDk4N2U5OGU2Ng",
    "scope": null,
    "token_type": "bearer"
}


Use the access_token to access the API

Usage examples:
------------------------
$ http GET http://localhost/beetest/web/app_dev.php/reviews \
    "Authorization:Bearer MDFjZGI1MTg4MTk3YmEwOWJmMzA4NmRiMTgxNTM0ZDc1MGI3NDgzYjIwNmI3NGQ0NGE0YTQ5YTVhNmNlNDZhZQ"

$ http GET http://localhost/beetest/web/app_dev.php/reviews/1 \
    "Authorization:Bearer MDFjZGI1MTg4MTk3YmEwOWJmMzA4NmRiMTgxNTM0ZDc1MGI3NDgzYjIwNmI3NGQ0NGE0YTQ5YTVhNmNlNDZhZQ"


$ http POST http://localhost/beetest/web/app_dev.php/reviews/ product="Nexus 6p" rating=9 content="Un telefon reusit. Singurul dezavantaj e ca nu e iPhone" \
    "Authorization:Bearer MDFjZGI1MTg4MTk3YmEwOWJmMzA4NmRiMTgxNTM0ZDc1MGI3NDgzYjIwNmI3NGQ0NGE0YTQ5YTVhNmNlNDZhZQ"

That's it !



Documentation used:

https://gist.github.com/tjamps/11d617a4b318d65ca583
