<?php
namespace App\Controller\Component;

use Cake\Core\Configure;
use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
use Cake\Log\Log;

/**
 * Uploadimage component
 */
class UploadimageComponent extends Component
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    /**
     * Listado de carpetas necesarias para almacenar imágenes de la aplicación
     * @var array
     */
    private $requiredFolders = ['categories'];

    /**
     * Método principal
     */
    public function mainUpload()
    {
        self::createFolders($this->requiredFolders);
    }

    /**
     * Funciones privadas a ejecutar por mainUpload()
     */

    /**
     * Comprobar si existe una determinada carpeta a través del atributo 'path' de * la clase de Cake 'Folder'
     */
    private function checkFoldersExists($folder)
    {
        if ($folder->path) {
            return true;
        }
        return false;
    }

    /**
     *   
     * Creo las carpetas que require la aplicación para su funcionamiento
     * @param array $folders El nombre de una o múltiples carpetas
     * @see https://www.php.net/manual/en/functions.arguments.php#functions.variable-arg-list
     */
    private function createFolders(...$folders)
    {
        foreach ($folders[0] as $folder) {
            $newFolderDir = Configure::read('Fol.images') . $folder . '\\';
            $folderDir = new Folder($newFolderDir);
            if (!self::checkFolderExists($folderDir)) {
                try {
                    $folderDir->create($newFolderDir);
                    Log::info('Creación de la carpeta ' . $newFolderDir, ['dirCreation']);
                } catch (Exception $e) {
                    Log::error('No ha sido posible crear la carpeta' . $newFolderDir . '. Error: ' . $e, ['dirCreation']);
                }
            }
        }
    }
}
