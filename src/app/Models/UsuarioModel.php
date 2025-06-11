<?php

namespace App\Models;
use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table = 'usuarios'; // tu tablas
    protected $primaryKey = 'id_usuario';
    protected $allowedFields = ['id_usuario ','nombre_usuario', 'contraseña', 'rol','nombre_completo','telefono','direccion']; // columnas permitidas

    // puedes agregar métodos personalizados si lo necesitas
    public function obtenerUsuarios()
    {
        return $this->findAll(); // trae todos los registros
    }
}
