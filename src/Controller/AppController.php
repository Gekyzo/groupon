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

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Log\Log;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');

        /**
         * User Auth
         */
        $this->loadComponent('Auth', [
            'authorize' => 'Controller',
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                    ]
                ]
            ],
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            // If unauthorized, return them to page they were just on
            'unauthorizedRedirect' => $this->referer()
        ]);

        // Allow the display action so our PagesController
        // continues to work. Also enable the read only actions.
        //$this->Auth->allow(['display', 'view', 'index']);

        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
    }

    /**
     * Restringir a los usuarios crear Promociones
     */
    public function isAuthorized($user)
    {
        // Sólo los usuarios administrador tienen todos los permisos
        if ($user['role'] === 'admin') {
            return true;
        }
        return false;
    }

    /**
     * Creo la variable $currentUser y la paso a las vistas para trabajar con las Layout
     */
    public function beforeFilter(\Cake\Event\Event $event)
    {
        $user = $this->Auth->user();
        $this->set('currentUser', $user);
    }

    /**
     * Depura un objeto para que devuelva únicamente los campos que queramos
     * @param $object | Object El objeto que vamos a depurar
     * @param $fields | Array Los campos que queremos mantener
     * @return $res | Array El array resultante con los campos indicados
     */
    public function depure(Object $object, array $fields)
    {
        $object = $object->toArray();
        $res = [];
        foreach ($fields as $field) {
            $res[$field] = $object[$field];
        }
        return $res;
    }
}
