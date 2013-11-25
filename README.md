README
======

[This project](https://github.com/scabbiafw/scabbia2-skel/) is the skeleton application using [Scabbia2 PHP Framework](http://scabbiafw.com/) and its bundles. It is designed to helps you to jump-start developing projects with the Scabbia2 without setting up a configuration from scratch.


Installation
------------
##### Alternative 1: Zip Package #####

Download [Skeleton Application](https://github.com/scabbiafw/scabbia2-skel/archive/master.zip) and launch `php scabbia upgrade`.

##### Alternative 2: Git #####

On Terminal or Command Prompt:
``` bash
git clone https://github.com/scabbiafw/scabbia2-skel project
cd project
php scabbia upgrade
```

##### Alternative 3: Composer #####

On *nix:
``` bash
php -r "eval('?>'.file_get_contents('https://getcomposer.org/installer'));"
php composer.phar create-project scabbiafw/scabbia2-skel -s dev project
```

On Windows:
Download and install [Composer-Setup.exe](http://getcomposer.org/Composer-Setup.exe) then run:
``` bat
composer create-project scabbiafw/scabbia2-skel -s dev project
```


Update
------
``` bash
php scabbia upgrade
```


Requirements
------------
* PHP 5.4.0+ (http://www.php.net/)
* Composer Dependency Manager** (http://getcomposer.org/)
* Scabbia2 PHP Framework** (http://scabbiafw.com/)

** Will be auto-installed during composer execution


License
-------
See [LICENSE](LICENSE)


Contributing
------------
* Fork the repo, push your changes to your fork, and submit a pull request.
* If something does not work, please report it using GitHub issues.
