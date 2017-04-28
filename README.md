# reunion
Gestor de reuniones y actas para grupos de trabajo, unidades administrativas, etc

Installing
----------

Clone code at your develop workstation
```
$ git clone https://github.com/Universidad-de-Sevilla/reunion.git reunion
```

Init composer from Terminal: 
```
$ composer install
```

Copy config files
```
$ cp config/dev.sample.php config/dev.php
$ cp config/prod.sample.php config/prod.php
```

Create cache and logs directories (and set necessary privileges)
```
$ mkdir -p var/cache/profiler var/cache/twig var/logs var/private_uploads
```
 
Create **reunion** database (mysql):

```
CREATE DATABASE reunion;
CREATE USER `reunion`@`localhost` IDENTIFIED BY "SuperMegaPass3000.";
GRANT ALL ON reunion.* TO `reunion`@`localhost`;
REVOKE GRANT OPTION ON reunion.* FROM `reunion`@`localhost`;
FLUSH PRIVILEGES;
```

Dump initials entities in database:
```
$ bin/console orm:schema-tool:update --force --dump-sql
```


Running
-------

To browse errors and debug access the webapp from your navigator with:
`http://localhost/reunion/web/index_dev.php` or better `http://reunion.dev/index_dev.php` 
(you need to configura a vhost in apache)
'''
<VirtualHost *:80>
    DocumentRoot "/var/www/reunion/web"
    ServerName reunion.dev
</VirtualHost>
'''
