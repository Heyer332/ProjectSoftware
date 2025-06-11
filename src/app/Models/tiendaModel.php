<?php

namespace App\Models;
use CodeIgniter\Model;

class tiendaModel extends Model
{
    protected $table = 'productos'; // tu tablas
    protected $primaryKey = 'id_producto';
    protected $allowedFields = ['id_producto','detalleProducto ','precio', 'stok',]; // columnas permitidas

    // puedes agregar métodos personalizados si lo necesitas
    public function obtenerProductos()
    {
        return $this->findAll(); // trae todos los registros
    }
}
    