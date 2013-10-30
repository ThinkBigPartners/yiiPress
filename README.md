yiiPress
================

A mashup of Yii Web Application Framework and WordPress Content Management System.   
   
This allows us to use a WordPress theme to wrap our Yii Application and when Yii doesn't have a route registered and 404s, it falls back to WordPress and WordPress tries to load content for the given URL.


# Deployment   
   
Use PHP's Composer Dependency Management System.   
   
http://getcomposer.org/download/
   
Note the Windows Installer if you are on Windows.   
   

Composer documentation is available here: http://getcomposer.org/doc/   
   

Packages from here: https://packagist.org/
   
   
Once Composer is installed, navigate to the root and run:   
   
    composer install   

This will install Yii and Wordpress among other dependencies.   
   
Once everything is installed, hit the web server. It will walk you through configuring WordPress. The default configuration uses the following credentials (changing values WordPress Web Configurator will not change them).
   
    DB_USER: root
    DB_PASSWORD: abc   
    DB_HOST: localhost   
   
If these settings don't work for you, you can change them in wp/wp-config.php.

You will next need to configure Yii, the following configuration files exist:   
   
    protected/config/main.php //Global config regardless of environment
    protected/config/main_local.php //Local config such as local DB settings turn on gii
    protected/config/main_prod.php //Production config
   
   
Use Case
===========
   
We maintain a number of projects where the client isn't highly technical, but wants to be able to make updates to the content porition of the website. Since WordPress does this really well, we knew we wanted to use it. We use Yii extensively so a solution to use Yii and Wordpress together was required. This is that solution.