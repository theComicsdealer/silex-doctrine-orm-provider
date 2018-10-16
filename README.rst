  $conn = array(
            'dbname' => 'wunder_db',
            'user' => 'root',
            'password' => '',
            'host' => '127.0.0.1',
            'driver' => 'pdo_mysql'
        );


$app = require __DIR__.'/../src/app.php';

$helperSet = new \Symfony\Component\Console\Helper\HelperSet(array(
    'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($app['doctrine'])
));
return $helperSet;