<?php

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

return [
	'paths' => [
		// In a real application & package, we'd organize this config
		// so the app doesn't have to know about the package paths
		'migrations' => [
			'%%PHINX_CONFIG_DIR%%/db/migrations',
			'%%PHINX_CONFIG_DIR%%/vendor/markbiek/zoey-account-permissions/db/migrations',
		],
		'seeds' => [
			'%%PHINX_CONFIG_DIR%%/db/seeds',
			'%%PHINX_CONFIG_DIR%%/vendor/markbiek/zoey-account-permissions/db/seeds',
		],
	],
	'environments' => [
		'default_migration_table' => 'phinxlog',
		'default_environment' => 'development',
		'production' => [
			'adapter' => 'mysql',
			'host' => $_ENV['DB_HOST'],
			'name' => $_ENV['DB_NAME'],
			'user' => $_ENV['DB_USER'],
			'pass' => $_ENV['DB_PASS'],
			'port' => '3306',
			'charset' => 'utf8',
		],
		'development' => [
			'adapter' => 'mysql',
			'host' => $_ENV['DB_HOST'],
			'name' => $_ENV['DB_NAME'],
			'user' => $_ENV['DB_USER'],
			'pass' => $_ENV['DB_PASS'],
			'port' => '3306',
			'charset' => 'utf8',
		],
		'testing' => [
			'adapter' => 'mysql',
			'host' => $_ENV['DB_HOST'],
			'name' => $_ENV['DB_NAME'],
			'user' => $_ENV['DB_USER'],
			'pass' => $_ENV['DB_PASS'],
			'port' => '3306',
			'charset' => 'utf8',
		],
	],
	'version_order' => 'creation',
];
