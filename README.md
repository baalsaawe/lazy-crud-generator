# lazy-crud-generator

[![Latest Stable Version](https://poser.pugx.org/nagahshi/lazy-crud-generator/v/stable)](https://packagist.org/packages/nagahshi/lazy-crud-generator) [![Total Downloads](https://poser.pugx.org/nagahshi/lazy-crud-generator/downloads)](https://packagist.org/packages/nagahshi/lazy-crud-generator) [![Latest Unstable Version](https://poser.pugx.org/nagahshi/lazy-crud-generator/v/unstable)](https://packagist.org/packages/nagahshi/lazy-crud-generator) [![License](https://poser.pugx.org/nagahshi/lazy-crud-generator/license)](https://packagist.org/packages/nagahshi/lazy-crud-generator)

based in kepex/laravel-crud-generator using prettus/l5-repository.


###Installing

	composer require nagahshi/lazy-crud-generator


Add to config/app.php the following line to the 'providers' array:

    LazyCrudGenerator\LazyCrudGeneratorServiceProvider::class,


![Preview](https://raw.githubusercontent.com/nagahshi/lazy-crud-generator/master/preview.gif)


###Usage

Use the desired model name as the input 


CRUD for students table

	php artisan make:lazycrud student

or the whole database

	php artisan make:lazycrud all

whole database with custom layout

	php artisan make:lazycrud all --master-layout=layouts.master 

Because sometimes you need boilerplate code only for view and controller, you can use an existing model with custom controller name

	php artisan make:crud student --master-layout=master --custom-controller=dashboard	

For more options 

	php artisan help make:lazycrud

###Custom Templates

The best power of this plugin relies on you making your own templates and generating the code the way you like

Run this command:

    php artisan vendor:publish

and you will have now in resources/templates/ the files you need to modify

If you want to go back to the default, just delete them
