<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Filesystem\Folder;
use Cake\Log\Log;

/**
 * Folders component
 */
class FoldersComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    /**
     * Comprueba si existe una determinada carpeta a través del atributo 'path' de la clase de Cake 'Folder'
     * @return boolean
     */
    public function checkFolderExists(...$folders)
    {
        foreach ($folders as $folder) {
            $folderDir = new Folder($folder);
            if ($folderDir->path) {
                return true;
            }
            return false;
        }
    }

    /**
     *   
     * Crea la carpeta o carpetas que reciba como parámetro.
     * @param string $folders El nombre de una o múltiples carpetas
     */
    public function createFolders(...$folders)
    {
        foreach ($folders as $folder) {
            $folderDir = new Folder($folder);
            try {
                $folderDir->create($folder);
                Log::info('Creación de la carpeta ' . $folder, ['folder']);
            } catch (Exception $e) {
                Log::error('No ha sido posible crear la carpeta' . $folder . '. Error: ' . $e, ['folder']);
            }
        }
    }
}
