Silex doctrine orm provider
===========================

This is a custom doctrine orm service provider for silex framework.
It could be usefull if you do not want to use the doctrine dbal provider
provided by silex.

Installation
===========================
| git clone https://github.com/theComicsdealer/silex-doctrine-orm-provider.git
| run composer install to install dependancies
| That's it!

Configuration
=============================

In you app.php file register the proviser

code block
   $params = array(
     "doctrine.db_options" => array(
         'dbname' => 'dbname',
         'user' => 'dbuser',
         'password' => 'dbpass',
         'host' => '127.0.0.1',
         'driver' => 'pdo_mysql'
     ),
     "dev_mode" => true,
     "path" => path_to_your_entities_repository
   );

   $app['doctrine'] = $app->register(new SilexDoctrineProvider(), 

In config/cli-config.php add

code block

   $app = require __DIR__.'/../src/app.php';

   $helperSet = new \Symfony\Component\Console\Helper\HelperSet(array(
     'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($app['doctrine'])
   ));
   return $helperSet;

Enjoy!
