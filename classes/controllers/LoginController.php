<?php
class Login {
    private $authentication;

    public function __construct(Authentication $authentication) {
        $this->authentication = $authentication;
    }

    public function error() {
        return ['template' => '/login/loginerror.php'];
    }

    public function loginForm() {
        return ['template' => '/login/login.php'];
    }

    public function processLogin() {
        if ($this->authentication->login($_POST['email'],
        $_POST['password'])) {
            header('location: index.php?route=login/success');
        } else {
            return ['template' => '/login/login.php',
                'variables' => [
                    'error' => 'Invalid username/password'
                ]
                ];
        }
    }

    public function success() {
        return ['template' => '/login/loginsuccess.php'];
    }

    public function logout() {
        // cancella i dati della sessione e disconette l'utente
        session_destroy();
        return ['template' => '/login/logout.php'];
    }

// fine classe    
}