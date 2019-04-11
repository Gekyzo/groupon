<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link https://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{

    /**
     * Displays a view
     *
     * @param array ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Http\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\Http\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
    public function display(...$path)
    {
        $count = count($path);
        if (!$count) {
            return $this->redirect('/');
        }
        if (in_array('..', $path, true) || in_array('.', $path, true)) {
            throw new ForbiddenException();
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        /**
         * Cargamos la lista de categorías y promociones
         */
        $this->loadModel('Categories');
        $this->loadModel('Promotions');
        $categories = $this->Categories->find('all')->toArray();
        /**
         * Opciones comunes para la query de promociones
         */
        $commonOptions = [
            'contain' => ['Images'],
            'conditions' => ['Promotions.state' => 'active'],
            'order' => ['Promotions.id' => 'DESC', 'Promotions.available_since' => 'DESC'],
            'limit' => 5
        ];
        /**
         * Query de Últimas promociones
         */
        $customOptions = [];
        $lastPromotions = $this->Promotions->find('all', $this->tempOptions($commonOptions, $customOptions))->toArray();
        /**
         * Query de Promociones destacadas
         */
        $customOptions = ['order' => ['rand()']];
        $bestPromotions = $this->Promotions->find('all', $this->tempOptions($commonOptions, $customOptions))->toArray();

        /**
         * Mandamos datos a la vista
         */
        $this->set(compact('page', 'subpage', 'categories', 'lastPromotions', 'bestPromotions'));

        try {
            $this->render(implode('/', $path));
        } catch (MissingTemplateException $exception) {
            if (Configure::read('debug')) {
                throw $exception;
            }
            throw new NotFoundException();
        }
    }

    /**
     * Permisos para usarios CON SESIÓN INICIADA
     */
    public function isAuthorized($user)
    {
        parent::isAuthorized($user);
        $action = $this->request->getParam('action');
        if (in_array($action, ['display'])) {
            return true;
        }
    }

    /**
     * Defino permisos para cualquier visitante.
     * Incluye los UNLOGGED.
     */
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow('display');
    }

    /**
     * Genera un array temporal de opciones para aplicar en una consulta find().
     * Permite concatenar nuevos valores a una opción que ya existe, pero no sobreescribirlos.
     * (en caso de querer sobreescribir, no sería una opción común)
     * @param array ...$options Los arrays que vamos a mergear para crear las opciones
     * @return array $tempOptions El array temporal con las opciones para la consulta
     */
    public function tempOptions(array ...$options): array
    {
        $tempOptions = [];
        foreach ($options as $option) {
            $tempOptions = array_merge_recursive($tempOptions, $option);
        }
        return $tempOptions;
    }
}
