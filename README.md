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
      