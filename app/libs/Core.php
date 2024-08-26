<?php
class Core
{
    protected $currentController = 'Home';
    protected $currentMethod = 'index';
    protected $parameters = [];

    public function __construct()
    {
        $url = $this->getURL();

        // Verificar si $url es un arreglo y no está vacío
        if ($url && file_exists("../app/controllers/" . ucwords($url[0]) . ".php")) {
            $this->currentController = ucwords($url[0]);
            unset($url[0]);
        }

        $controllerFile = "../app/controllers/" . $this->currentController . ".php";
        if (file_exists($controllerFile)) {
            include_once $controllerFile;

            if (class_exists($this->currentController)) {
                $this->currentController = new $this->currentController;
            } else {
                throw new Exception("La clase '{$this->currentController}' no se encontró en el archivo '{$controllerFile}'.");
            }
        } else {
            throw new Exception("El archivo del controlador '{$controllerFile}' no se encontró.");
        }

        if (isset($url[1])) {
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }

        $this->parameters = $url ? array_values($url) : [];
        call_user_func_array([$this->currentController, $this->currentMethod], $this->parameters);
    }

    public function getURL()
    {
        if (isset($_GET["url"])) {
            $url = trim($_GET["url"], "/");
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode("/", $url);
            return $url;
        }
        // Retornar un arreglo con controlador y método por defecto si "url" no está presente en $_GET
        return ['home', 'index'];
    }
}
