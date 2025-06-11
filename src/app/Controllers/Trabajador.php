<?php
namespace App\Controllers;

use App\Models\tiendaModel;
use App\Models\UsuarioModel;

class Trabajador extends BaseController
{
    public function inicio()
    {
        $session = session(); // accede a la sesión actual
        $tiendaDatos = new tiendaModel();
        $productos = $tiendaDatos->findAll();

        // Ejemplo: obtener datos del usuario que inició sesión
        $nombre = $session->get('nombre_usuario');
        $rol = $session->get('rol');
        $id_usuario = $session->get('id_usuario');
        $nombre_completo = $session->get('nombre_completo');
        $telefono = $session->get('telefono');
        $direccion = $session->get('direccion');

        // Puedes pasarlos a la vista si quieres
        return view("principalU", [
            'nombre' => $nombre,
            'rol' => $rol,
            'id_usuario' => $id_usuario,
            'nombre_completo' => $nombre_completo,
            'telefono' => $telefono,
            'direccion' => $direccion,
            'productos' => $productos

        ]);
        


    }
    
}
