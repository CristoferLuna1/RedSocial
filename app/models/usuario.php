<?php

class usuario
{
    private $db;

    public function __construct() 
    {
        $this->db = new Base;
    }

    public function getUsuario($usuario)
    {
        $this->db->query('SELECT * FROM usuarios WHERE usuario =:user');
        $this->db->bind('user',$usuario);
        return $this->db->register();
    }

    public function getPerfil($idusuario)
    {
        $this->db->query('SELECT * FROM perfil WHERE idusuario= :id');
        $this->db->bind(':id',$idusuario);
        return $this->db->register();

    }

    public function verificarContrasena($datosUsuario, $contrasena)
    {
        if(password_verify($contrasena, $datosUsuario->contrasena)){
            return true;
        }else{
            return false;
        }
    }




    public function verificarUsuario($datosUsuario)
    {
        $this->db->query('SELECT * FROM usuarios WHERE usuario = :user');
        $this->db->bind(':user',$datosUsuario['usuario']);
        $this->db->register();
        if($this->db->rowCount())
        {
            return false;
        }else{
            return true;
        }
    }



    public function verificarCorreo($datosUsuario)
    {
        $this->db->query('SELECT * FROM usuarios WHERE correo = :correo');
        $this->db->bind(':correo', $datosUsuario['correo']);
        if($this->db->rowCount()){
            return false;
        }else
        {
            return true;
        }
    }

    public function register($datosUsuario)
    {
        /* var_dump($datosUsuario); */
        $this->db->query('INSERT INTO usuarios(idPrivilegio,correo,usuario,contrasena) VALUES (:privilegio, :correo, :usuario, :contrasena)');
        $this->db->bind(':privilegio', $datosUsuario['privilegio']);  
        $this->db->bind(':correo', $datosUsuario['correo']);
        $this->db->bind(':usuario', $datosUsuario['usuario']);
        $this->db->bind(':contrasena', $datosUsuario['contrasena']);
        
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function insertarPerfil($datos)
    {
        $this->db->query('INSERT INTO perfil(idUsuario,fotoPerfil, nombreCompleto, genero, fecha_nacimiento, edad) VALUES(:id,:rutaFoto,:nombre,:genero,:fechanacimiento, :edad)');
        $this->db->bind(':id', $datos['idusuario']);
        $this->db->bind(':rutaFoto', $datos['ruta']);
        $this->db->bind(':nombre', $datos['nombre']);
        $this->db->bind(':genero', $datos['genero']);
        $this->db->bind(':fechanacimiento', $datos['fechanacimiento']);
        $this->db->bind(':edad', $datos['edad']);
    
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    
    }

    


}