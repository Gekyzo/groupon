<?php
use Migrations\AbstractSeed;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => '1',
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => '$2y$10$ixbTImZkdjBlghpe4qTII.VBQZPRBCnbZb6D4Nhb6.cXvZ6Dku/Ge',
                'role' => 'admin',
                'created' => '2019-01-01 08:00:00',
                'last_active' => NULL,
                'deleted' => NULL,
            ],
            [
                'id' => '2',
                'name' => 'Client',
                'email' => 'client@gmail.com',
                'password' => '$2y$10$lvBlqxyXJMGezk2GNrqK7.vdClrEqKcusx5sh1u0A/BbFIkyV0bJ.',
                'role' => 'client',
                'created' => '2019-01-01 08:01:00',
                'last_active' => NULL,
                'deleted' => NULL,
            ],
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
