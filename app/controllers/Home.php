<?php
class Home extends Controller
{
    
    
    public function __construct() 
    {
        $this->usuario = $this->model('usuario');
        $this->correo = $this->model('usuario');;

    }
    public function index()
    {
        if(isset($_SESSION['logueado']))
        {
            $datosUsuario = $this->usuario->getUsuario($_SESSION['usuario']);
            $datosPerfil = $this->usuario->getPerfil($_SESSION['logueado']);
            if($datosPerfil){
                $datosRed =[
                    'usuario'=> $datosUsuario,
                    'perfil' => $datosPerfil
                ];
                $this->view('pages/home', $datosRed);
            }else{
                $this->view('pages/perfil/completarPerfil', $_SESSION['logueado']);

            }
            
            
            
            

        }else{
            redirection('/home/login'); 
        }
       /* $this->view('pages/login'); */
    }
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD']== 'POST'){
            $datosLogin = [
                'usuario' => trim($_POST['usuario']),
                'contrasena' => trim($_POST['contrasena'])
            ];

            $datosUsuario = $this->usuario->getUsuario($datosLogin['usuario']);
            
            var_dump($datosUsuario);

            if($this->usuario->verificarContrasena($datosUsuario, $datosLogin['contrasena'])){
                $_SESSION['logueado'] = $datosUsuario->idPrivilegio;
                $_SESSION['usuario'] = $datosUsuario->usuario;
                redirection('/home');

            }else{
                $_SESSION['errorLogin'] = "El usuario o Contraseña son incorrectas";
                redirection('/home');
            }

        }else {
            if(isset($_SESSION['logueado'])){
                redirection('/home');
            }else{

            $this->view('pages/login');
            }
        }
    }
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD']== 'POST'){
            $datosRegistro = [
                'privilegio' => 2 ,
                'correo' => trim($_POST['correo']),
                'usuario' => trim($_POST['usuario']),
                'contrasena' => password_hash(trim($_POST['contrasena']), PASSWORD_DEFAULT)
            ];
            if($this->correo->verificarCorreo($datosRegistro)){
                if($this->usuario->verificarUsuario($datosRegistro)){
                    if($this->usuario->register($datosRegistro)){
                        redirection('/home');
                        $_SESSION['LoginComplete'] = 'Usuario Registrado con Exito';
                 }else{
                    
                }
            }else{
                $_SESSION['usuarioError'] = 'El usuario no esta disponible, intenta con otro usuario';
                $this->view('pages/register');
            }
            }else{
                $_SESSION['usuarioError'] = 'Ya existe una cuenta con este correo';
                $this->view('pages/register');
            }
        }else {
            if(isset($_SESSION['logueado'])){
                redirection('/home');
            }else{

            $this->view('pages/register');
            }
            
        }
    }

    public function logout()
    {
        session_start();
        
        $_SESSION = [];
        
        session_destroy();

        redirection('/home');
    }

    public function insertarRegistrosPerfil()
    {
        $fechaNacimiento = trim($_POST['fechanacimiento']);
        $edad = $this->calcularEdad($fechaNacimiento);
        

        $carpeta = "C:/xampp/htdocs/redsocial/public/img/imgperfil/";
        opendir($carpeta);
        $rutaImagen ='img/imgperfil/'. $_FILES['imagen']['name'];
        $ruta = $carpeta . $_FILES['imagen']['name'];
        copy($_FILES['imagen']['tmp_name'], $ruta);
        
        $datos =[
            'idusuario'=> trim($_POST['id_user']),
            'nombre'=> trim($_POST['nombre']),
            'genero'=> trim($_POST['genero']),
            'fechanacimiento'=> $fechaNacimiento,
            'edad'=> $edad,
            'ruta'=> $rutaImagen
        ];
        

        
        if($datos['edad'] < 15){
             $_SESSION['usuarioError']= 'Debes se mayor de 15 años registrarte';
             $this->view('pages/perfil/completarPerfil');
            }else{
                
                if($this->usuario->insertarPerfil($datos)){
                    redirection('/home');
            }
        }
        

    }

    public function calcularEdad($fechaNacimiento)
    {
        $fechaNacimiento = new DateTime($fechaNacimiento);
        $hoy = new DateTime();
        $edad = $hoy->diff($fechaNacimiento)->y;

        return $edad;
        
    }


}
