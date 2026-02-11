<?php

use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

require __DIR__ . '/../app/helper/settings.php';
require __DIR__ . '/../app/route/route.php';

<<<<<<< Updated upstream
$app->run();
=======
$app->run();
>>>>>>> Stashed changes
