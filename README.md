yiiPress
================

A mashup of Yii Web Application Framework and WordPress Content Management System.   
   
This allows us to use a WordPress theme to wrap our Yii Application and when Yii doesn't have a route registered and 404s, it falls back to WordPress and WordPress tries to load content for the given URL.

Repository for RoverRain Cash Rent Platfrom


# Deployment   
   
Use PHP's Composer Dependency Management System.   
   
You can [[download it here|http://getcomposer.org/download/]].   
   
Note the Windows Installer if you are on Windows.   
   

Documentation is [[available here|http://getcomposer.org/doc/]].   
   

Packages from [[here|https://packagist.org/]].   
   
   
Once Composer is installed, navigate to the root and run:   
   
    composer install   

This will install Yii and Wordpress among other dependencies.   
   

We should try VERY hard to manage dependecies with Composer and not include them in the repository.   
   