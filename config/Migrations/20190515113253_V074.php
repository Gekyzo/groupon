<?php
use Migrations\AbstractMigration;

class V074 extends AbstractMigration
{

    public function up()
    {

        $this->table('promotions')
            ->changeColumn('body', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->update();
    }

    public function down()
    {

        $this->table('promotions')
            ->changeColumn('body', 'float', [
                'default' => null,
                'length' => null,
                'null' => false,
            ])
            ->update();
    }
}

