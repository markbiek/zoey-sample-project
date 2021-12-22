<?php

use Phinx\Seed\AbstractSeed;

class AccountSeeder extends AbstractSeed {
	/**
	 * Run Method.
	 *
	 * Write your database seeder using this method.
	 *
	 * More information on writing seeders is available here:
	 * https://book.cakephp.org/phinx/0/en/seeding.html
	 */
	public function run() {
		$row = $this->fetchRow('SELECT COUNT(*) as cnt FROM accounts');
		if ($row['cnt'] > 0) {
			echo 'The accounts table already has data.';
			return;
		}

		$faker = Faker\Factory::create();
		$data = [];

		for ($i = 0; $i < 5; $i++) {
			// Make the first account an admin
			// Everyone else is randomly a Widget or Gizmo customer
			$roleId = $i == 0 ? 1 : rand(2, 3);

			$data[] = [
				'name' => "{$faker->firstName} {$faker->lastName}",
				'overdue' => rand(1, 2) % 2 == 0,
				'role_id' => $roleId,
			];
		}

		$accounts = $this->table('accounts');
		$accounts->insert($data)->saveData();
	}
}
