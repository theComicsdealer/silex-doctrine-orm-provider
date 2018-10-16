<?php
/**
 *  A custom doctrine service provider
 */

namespace Thecomicsdealer;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Silex\Application;
use Symfony\Component\HttpKernel\KernelEvents;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class SilexDoctrineProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
    
        $conn = $app['doctrine.db_options'];
        $isDevMode = $app['doctrine.dev_mode'];
        $entityPath = $app['doctrine.path'];

        $config = Setup::createAnnotationMetadataConfiguration($path, $isDevMode);

        try{
            $entityManager = EntityManager::create($conn, $config);
            $app['doctrine'] = $entityManager;
        }catch(Exception $e){
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }

}