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
                'password' => '$2y$10$wOvAPESVSFGzPwRj2PeH/ecBdvkYgsUreMDYxgD/glkcCStXH7e0y',
                'role' => 'admin',
                'created' => '2019-04-16 11:05:27',
                'deleted' => NULL,
            ],
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
