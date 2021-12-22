<?php
require_once __DIR__ . '/vendor/autoload.php';

// TODO: This can be dropped once we've released an actual package
require_once __DIR__ .
	'/vendor/markbiek/zoey-account-permissions/vendor/autoload.php';

// Load mock product data
require_once __DIR__ . '/mocks.php';

use Illuminate\Database\Capsule\Manager as DB;
use Jenssegers\Blade\Blade;

// Bootup our environment config
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Bootup the database connection
$db = new DB();
$db->addConnection([
	'driver' => 'mysql',
	'host' => $_ENV['DB_HOST'],
	'database' => $_ENV['DB_NAME'],
	'username' => $_ENV['DB_USER'],
	'password' => $_ENV['DB_PASS'],
	'charset' => 'utf8',
	'collation' => 'utf8_unicode_ci',
	'prefix' => '',
]);
$db->setAsGlobal();
$db->bootEloquent();

// Bootup our template engine
$GLOBALS['blade'] = new Blade('resources/views', 'cache');

if (!function_exists('render')) {
	function render(string $view, array $vars = []) {
		echo $GLOBALS['blade']->render($view, $vars);
	}
}
