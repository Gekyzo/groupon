<?php
use Migrations\AbstractSeed;

/**
 * Promotions seed.
 */
class PromotionsSeed extends AbstractSeed
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
                'name' => 'Cena en Kiro Sushi',
                'price_old' => '100',
                'price_new' => '40',
                'state' => 'active',
                'body' => 'Disfruta de la mejor comida asiática de Logroño.',
                'available_since' => '2019-01-01 00:00:00',
                'available_until' => '2019-12-31 23:59:00',
                'created' => '2019-05-29 11:01:12',
                'deleted' => NULL,
            ],
            [
                'id' => '2',
                'name' => 'Cabrito asado en Cachetero',
                'price_old' => '60',
                'price_new' => '35',
                'state' => 'active',
                'body' => 'Disfruta del un Cabrito asado en el mejor asador de Logroño.',
                'available_since' => '2019-01-01 00:00:00',
                'available_until' => '2019-12-01 00:00:00',
                'created' => '2019-05-29 11:56:18',
                'deleted' => NULL,
            ],
            [
                'id' => '3',
                'name' => 'Tapeo en Torres Gastrobar',
                'price_old' => '22',
                'price_new' => '8',
                'state' => 'active',
                'body' => 'Siempre es un acierto hacer una parada para comer y beber algo. Gran variedad de vinos, para todos los gustos.

Una combinación de tapas tradicionales con otras más actualizadas.',
                'available_since' => '2019-01-01 00:00:00',
                'available_until' => '2020-01-01 00:00:00',
                'created' => '2019-05-29 14:04:51',
                'deleted' => NULL,
            ],
            [
                'id' => '4',
                'name' => 'Menu degustación La Cocina de Ramón',
                'price_old' => '32',
                'price_new' => '25',
                'state' => 'active',
                'body' => 'Productos de primerísima calidad, y muy innovador en la cocina. Se nota que hay profesionalidad y empeño.',
                'available_since' => '2019-01-01 00:00:00',
                'available_until' => '2020-01-01 00:00:00',
                'created' => '2019-05-29 14:06:52',
                'deleted' => NULL,
            ],
            [
                'id' => '5',
                'name' => 'Circuito termal en Saline Spa',
                'price_old' => '50',
                'price_new' => '20',
                'state' => 'active',
                'body' => 'Relájate con esta novedosa experiencia. Flota como si estuvieras en el Mar Muerto, pero sin moverte de Logroño.',
                'available_since' => '2019-01-01 00:00:00',
                'available_until' => '2020-01-01 00:00:00',
                'created' => '2019-05-29 13:55:03',
                'deleted' => NULL,
            ],
            [
                'id' => '6',
                'name' => 'Sesión de Spa GOLD',
                'price_old' => '95',
                'price_new' => '70',
                'state' => 'active',
                'body' => 'Disfruta de un circuito completo de Spa y sauna Coreana con un masaje de tu elección.

La duración total del circuito es de dos horas.',
                'available_since' => '2019-01-01 00:00:00',
                'available_until' => '2020-01-01 00:00:00',
                'created' => '2019-05-29 13:57:39',
                'deleted' => NULL,
            ],
            [
                'id' => '7',
                'name' => 'Masaje bienestar en Columnata Spa',
                'price_old' => '45',
                'price_new' => '30',
                'state' => 'active',
                'body' => 'Cierra los ojos. Olvídate del estrés diario y del ritmo de vida frenético que llevas y ahora concéntrate en ti, en tu cuerpo, en tu mente.',
                'available_since' => '2019-01-01 00:00:00',
                'available_until' => '2020-01-01 00:00:00',
                'created' => '2019-05-29 13:59:20',
                'deleted' => NULL,
            ],
            [
                'id' => '8',
                'name' => 'Ritual Dao',
                'price_old' => '50',
                'price_new' => '25',
                'state' => 'active',
                'body' => 'Inspirada en la ceremonia del té de Japón, The Ritual of Chadō adopta el arte de la atención, despertando tu alma e inspirándote para vivir cada momento con una profundidad y armonía ',
                'available_since' => '2019-01-01 00:00:00',
                'available_until' => '2020-01-01 00:00:00',
                'created' => '2019-05-29 14:02:28',
                'deleted' => NULL,
            ],

            [
                'id' => '9',
                'name' => '2 noches + desayuno + cava + Spa en hotel 4',
                'price_old' => '50',
                'price_new' => '29.5',
                'state' => 'active',
                'body' => 'Disfruta de una escapada con encanto al Pirineo Aragonés con 1 o 2 noches con desayuno incluido, circuito Spa y cava en el precioso hotel Real Villa Anayet ¡De 4 estrellas!',
                'available_since' => '2019-01-01 00:00:00',
                'available_until' => '2020-01-01 00:00:00',
                'created' => '2019-05-29 14:15:27',
                'deleted' => NULL,
            ],
            [
                'id' => '10',
                'name' => 'Tour de enoturismo',
                'price_old' => '150',
                'price_new' => '45',
                'state' => 'active',
                'body' => 'Escápate de enoturismo a la Rioja, la Ruta del Vino más internacional, cuna de grandes vinos y bodegas centenarias.

Elige entre una selección de Escapadas de enoturismo repartidas entre La Rioja y la Rioja Alavesa, con o sin hotel, y descubre los secretos de la cata en esta reconocida región con nombre de vino.

también podrás combinar Catas de Vino y Paseos a caballo entre viñedos, visitas culturales y más actividades',
                'available_since' => '2019-01-01 00:00:00',
                'available_until' => '2020-01-01 00:00:00',
                'created' => '2019-05-29 14:17:14',
                'deleted' => NULL,
            ],
            [
                'id' => '11',
                'name' => 'Escapada Ezcaray con Visita a Bodega',
                'price_old' => '119',
                'price_new' => '96',
                'state' => 'active',
                'body' => 'Disfruta de esta espectacular escapada para los amantes del vino y de la naturaleza en pleno Valle de Ezcaray 
Este apartamento para 2 adultos cuenta con cocina totalmente equipada y dispuesta para cualquier receta culinaria. 
Pásalo en grande con la visita a la bodega que tenemos preparada para ti. ¡Te encantará!',
                'available_since' => '2019-01-01 00:00:00',
                'available_until' => '2020-01-01 00:00:00',
                'created' => '2019-05-29 14:19:21',
                'deleted' => NULL,
            ],
            [
                'id' => '12',
                'name' => 'Escapada romántica en Haro',
                'price_old' => '135',
                'price_new' => '95',
                'state' => 'active',
                'body' => 'Una completa escapada para visitar Haro, alojarse en un hotel emblemático mezcla perfecta de tradición y modernidad, disfrutar de la rica gastronomía local riojana con un menú tradicional con diferentes opciones entre las que elegir, y una visita a reconocida bodega de Rioja con vinos de gran calidad que podrás catar al finalizar la interesante visita guiada a las instalaciones de la bodega.',
                'available_since' => '2019-01-01 00:00:00',
                'available_until' => '2020-01-01 00:00:00',
                'created' => '2019-05-29 14:21:40',
                'deleted' => NULL,
            ],
        ];

        $table = $this->table('promotions');
        $table->insert($data)->save();
    }
}
