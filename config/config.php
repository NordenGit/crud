
<?php
use Illuminate\Database\Capsule\Manager as Capsule;

require_once '../vendor/autoload.php';

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'sqlite',
    'database'  => __DIR__.'/../database.sqlite',
    'prefix'    => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();
?>
