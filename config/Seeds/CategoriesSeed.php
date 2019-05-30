<?php
use Migrations\AbstractSeed;

/**
 * Categories seed.
 */
class CategoriesSeed extends AbstractSeed
{
    public function getDependencies()
    {
        return [
            'UsersSeed'
        ];
    }

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
                'name' => 'Belleza',
                'state' => 'active',
                'body' => 'Mens sana in corpore sana.',
                'image' => 'categories/belleza.png',
            ],
            [
                'id' => '2',
                'name' => 'Cultura',
                'state' => 'active',
                'body' => 'Tickets para los eventos que más te interesan.',
                'image' => 'categories/cultura.png',
            ],
            [
                'id' => '3',
                'name' => 'Experiencias',
                'state' => 'active',
                'body' => 'Si te gusta la adrenalina, este es tu sitio.',
                'image' => 'categories/experiencias.png',
            ],
            [
                'id' => '4',
                'name' => 'Viajes',
                'state' => 'active',
                'body' => 'Disfruta de una esa escapada que tanto esperabas.',
                'image' => 'categories/viajes.png',
            ],
            [
                'id' => '5',
                'name' => 'Restaurantes',
                'state' => 'active',
                'body' => 'La mejor oferta gastronómica de tu ciudad.',
                'image' => 'categories/restaurantes.png',
            ],
        ];

        $table = $this->table('categories');
        $table->insert($data)->save();
    }
}
