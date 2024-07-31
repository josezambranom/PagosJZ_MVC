<?php
namespace MVC;

class Router {
    // Arrays defined for app request (GET and POST);
    public array $getRoutes = [];
    public array $postRoutes = [];

    // Functions for app routing  (Routes and Functions)
    public function getRequest($route, $function) {
        $this->getRoutes[$route] = $function;
    }

    public function postRequest($route, $function) {
        $this->postRoutes[$route] = $function;
    }

    // Function to check if routes exist
    public function checkRoute() {
        $currentUrl = strtok($_SERVER['REQUEST_URI'], '?') ?? '/';
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method === "GET") {
            $function = $this->getRoutes[$currentUrl] ?? null;
        } else {
            $function = $this->postRoutes[$currentUrl] ?? null;
        }

        if ($function) {
            call_user_func($function, $this);
        } else {
            echo "Página no encontrada o ruta inválida";
        }
    }

    // Function to display the views to the users
    public function render($view, $data = []) {
        foreach ($data as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include_once __DIR__ . "/views/$view.php";
        $content = ob_get_clean();
        include_once __DIR__ . "/views/layout.php";
    }
}

?>