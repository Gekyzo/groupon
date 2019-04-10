<?php
namespace App\Controller\Component;

use Cake\Core\Configure;
use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;

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
     * Lista de componentes requeridos
     */
    public $components = ['Files', 'Folders'];


    /**
     * Método principal
     * @param string $folderName El nombre de la carpeta donde se va a incluir el archivo.
     * @param string $data Los datos del archivo.     
     */
    public function mainUpload($folderName, $data)
    {
        /**
         * Switch relacional entre el slug de la carpeta y el nombre real del directorio.
         */
        switch ($folderName) {
            case 'Category':
                $folderName = 'categories';
                break;
            default:
                return false;
                break;
        }
        $folderName = Configure::read('Fol.images') . $folderName . '\\';

        /**
         * Creamos la carpeta en caso de que no exista
         */
        try {
            if (!$this->Folders->checkFolderExists($folderName)) {
                $this->Folders->createFolders($folderName);
            }
            $this->Files->moveFile($folderName, $data);
        } catch (Exception $e) {
            debug($e);
        }
    }
}
