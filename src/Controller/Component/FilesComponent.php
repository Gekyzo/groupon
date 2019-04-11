<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Filesystem\File;
use Cake\Log\Log;

/**
 * Files component
 */
class FilesComponent extends Component
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
    public $components = ['Images'];

    /**
     *   
     * Crea la carpeta o carpetas que reciba como parámetro.
     * @param string $folder El nombre de la carpeta donde mover el archivo.
     * @param array $files Array de archivo o archivos a mover.
     */
    public function moveFile($folder, $files)
    {
        foreach ($files as $file) {
            $fileAbsolutePath = $this->Images->getAbsolutePath($folder, $file['name']);
            $file['path'] = $fileAbsolutePath;
            $tempFile = new File($file['tmp_name']);
            try {
                $tempFile->copy($fileAbsolutePath);
                Log::info('Subida del archivo ' . $fileAbsolutePath, ['folder']);
            } catch (Exception $e) {
                Log::error('No ha sido posible subir' . $fileAbsolutePath . '. Error: ' . $e, ['folder']);
            }
        }
    }
}
