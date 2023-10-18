<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ExportController extends BaseController
{
    public function index()
    {
        //
    }

    public function exportDatabase()
    {
        // Ruta donde se guardará el archivo de respaldo
        $backupFilePath = WRITEPATH . 'logs/' . date('Y-m-d_His') . '.sql';

        // Comando mysqldump
        $command = "\"C:\\Program Files\\MySQL\\MySQL Server 8.0\\bin\\mysqldump.exe\" -u isa -150503 -h localhost blog > $backupFilePath 2> error.log";



        exec($command, $output, $return); // Agregamos $output y $return

        
        if ($return !== 0) {
            // Hubo un error en la ejecución de mysqldump
            // Puedes imprimir el contenido de $output para obtener más detalles
            var_dump($output);
            // Puedes registrar el error en tus registros de aplicación
            log_message('error', 'Error al ejecutar mysqldump: ' . var_export($output, true));
        }
        
        // Descargar el archivo de respaldo
        if (file_exists($backupFilePath)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($backupFilePath) . '"');
            readfile($backupFilePath);
            exit;
        }
        echo 'Proceso terminado!';
    }
}