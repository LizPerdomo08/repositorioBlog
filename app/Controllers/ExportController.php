<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ExportController extends BaseController
{
    public function index()
    {
        //
    }

    public function exportarBase()
    {
        $archivo = 'D:\BD\\2023-10-25_144958.sql'; 

        if (file_exists($archivo)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($archivo) . '"');
            readfile($archivo);
            exit;
        } else {
            echo 'La base de datos no fue encontrada';
        }
    }
}
