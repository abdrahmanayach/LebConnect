<?php

namespace App\Core;

class Controller
{
    protected function render($view, $data = [])
    {
        extract($data);
        $viewPath = __DIR__ . '/../views/' . $view . '.php';
        if (file_exists($viewPath)) {
            include $viewPath;
        } else {
            throw new \Exception("View file '$view.php' not found.");
        }
    }

    protected function redirect($url)
    {
        header('Location: ' . $url);
    }

    protected function isAuth()
    {
        return isset($_SESSION['user_id']);
    }

    protected function json($data)
    {
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}
