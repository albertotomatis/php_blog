<?php

class EntryPoint {  
private $route;
private $method;
private $routes;
private $authentication;

public function __construct(string $route, string $method, Routes $routes, Authentication $authentication) {
    $this->route = $route;
    $this->routes = $routes;
    $this->method = $method;
    $this->authentication = $authentication;
    $this->checkUrl();
}

private function checkUrl() {
    if ($this->route !== strtolower($this->route)) {
        http_response_code(301);
        header('location: ' . strtolower($this->route));
    }
}

private function loadTemplate($templateFileName, $variables = []) {
    extract($variables);
    include __DIR__ . '/../templates/' . $templateFileName; 
}

public function run() {
    echo $this->loadTemplate('layout.php', ['loggedIn' => $this->authentication->isLoggedIn()]);
    
    $routes = $this->routes->getRoutes();

    if (isset($routes[$this->route]['login']) &&
        isset($routes[$this->route]['login']) &&    
        !$this->authentication->isLoggedIn()) {
            header('location: http://localhost/serverside/blog_php/templates/login/loginerror.php');
    } else if (isset($routes[$this->route]['permissions']) 
        && !$this->routes->checkPermission($routes[$this->route]['permissions'])) {
        header('location: index.php?route=login/error');	
    } 
    else {
        $controller = $routes[$this->route]
        [$this->method]['controller'];
        $action = $routes[$this->route]
        [$this->method]['action'];
        $page = $controller->$action();

        if (isset($page['variables'])) {
            $this->loadTemplate($page['template'],
            $page['variables']);
        } else {
            $this->loadTemplate($page['template']);
        }
    }
}
//fine classe
}   