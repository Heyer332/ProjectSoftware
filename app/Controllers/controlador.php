<?php
namespace App\Controllers;
use App\Models\UsuarioModel;

class controlador extends BaseController
{
    public function index()
    {
        return view('login'); // Muestra la vista login.php
    }

   public function mostrarUsuarios()
    {
    $usuarioModel = new UsuarioModel();
    $usuarios = $usuarioModel->select('nombre_usuario, rol')->findAll(); // solo esos campos

    return $this->response->setJSON($usuarios);
    }


    public function iniciosesion(){

        $nombre = $this->request->getPost('nombre_usuario');
        $contra = $this->request->getPost('contraseña');
        
        $usuarioModel = new UsuarioModel();

        $usuario = $usuarioModel->where([
        'nombre_usuario' => $nombre,
        'contraseña' => $contra 
        ])->first();


         if ($usuario) {
        // Guardar usuario en la sesión
        $session = session();
        
        $session->set([
        'id_usuario' => $usuario['id_usuario'],
        'nombre_usuario' => $usuario['nombre_usuario'],
        'rol' => $usuario['rol'],
        'nombre_completo' => $usuario['nombre_completo'],
        'telefono' => $usuario['telefono'],
        'direccion' => $usuario['direccion'],
        'logueado' => true
        ]); 


        // Redirige según su rol
        if($usuario['rol'] == 'admin') {
            return redirect()->to('admin/inicio');
        } else {
            return redirect()->to('trabajador/inicio');
        }

        } else {
        return "Usuario o contraseña incorrecta.";
        }   
    }



}
