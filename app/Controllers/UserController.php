<?php

namespace App\Controllers;
use App\Models\UserModel;

class UserController extends BaseController{

    public function index()
    {
        $usuario = new UserModel();
        $usuarios = $usuario->findAll();

        $data = [
            'usuarios' => $usuarios
        ];

        return view('users/index', $usuarios);
    }

    public function usuarios()
    {
        $db = \Config\Database::connect();
        $usuarios = $db->query('select * from users')->getResultArray();

        $data = [
            'usuarios' => $usuarios
        ];
        
        return view('users/usuarios', $data);
    }
}