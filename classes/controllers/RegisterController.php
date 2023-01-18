<?php

class RegisterController {
    private $authorsTable;
    private $authentication;

    public function __construct(DatabaseTable $authorsTable, Authentication $authentication) {
        $this->authorsTable = $authorsTable;
        $this->authentication = $authentication;
    }

    public function registrationForm() {
        return ['template' => '/register/register.php'];
    }

    public function success() {
        return ['template' => '/register/registersuccess.php'];
    }

    public function registerUser() {
        $author['name'] = $_POST['name'];
        $author['email'] = $_POST['email'];
        $author['password'] = $_POST['password'];
        // id è null, cioè non inserito
        $author['id'] = '';
        // presumiamo che i dati siano validi
        $valid = true;
        $errors = [];

        // validazione name
        if(!(ctype_alnum($author['name']) && mb_strlen($author['name']) >= 8 
            && mb_strlen($author['name']) <= 12)) {
                $valid = false;
                $errors[] = 'Name not valid';
            }

        // validazone email
        if (!filter_var($author['email'], FILTER_VALIDATE_EMAIL)) {
            $valid = false;
            $errors[] = 'Email not valid';
        } else {
            // converte l'email in minuscole
            $author['email'] = strtolower($author['email']);
        }

        // validazione password
        if (!preg_match('/^[a-zA-Z0-9_\-\$@#!]{8,}$/', $author['password'])) {
            $valid = false;
            $errors[] = 'Password not valid';
        };

        // utente già registrato
        if (count($this->authorsTable->find('email', $author['email'])) > 0) {
            $valid = false;
            $errors[] = 'That email address is already registred';
        }

        // se valid è true, i campi possono essere aggiunti
        if ($valid == true) {
            // calcola l'hash della password e lo salva nel database
            $author['password'] = password_hash($author['password'], PASSWORD_DEFAULT);
            $this->authorsTable->save($author);

            header('location: index.php?route=author/success');
        } else {
            // se i dati non sono validi, ripresenta il form
            return ['template' => '/register/register.php',
                'variables' => ['errors' => $errors, 'author' => $author]
            ];
        }      
    }

    // lista autori
    public function list() {
		$authors = $this->authorsTable->findAll();
		return ['template' => '/permissions/authorlist.php',
				'variables' => [
						'authors' => $authors
					]
				];
	}

    // permessi autori
    public function permissions() {

		$author = $this->authorsTable->findById($_GET['id']);

		$reflected = new \ReflectionClass('Author');
		$constantPostsPermissions = $reflected->getConstant('POST_PERMISSIONS');
        $constantCategoriesPermissions = $reflected->getConstant('CATEGORIES_PERMISSIONS');
        $constantUserPermissions = $reflected->getConstant('USER_MANAGE');

		return ['template' => '/permissions/authorPermissions.php',
				'variables' => [
						'author' => $author,
						'postsPermissions' => $constantPostsPermissions,
                        'categoriesPermissions' => $constantCategoriesPermissions,
                        'userPermissions' => $constantUserPermissions
					]
				];	
	}

    public function savePermissions() {
        $uno = ($_POST['postsPermissions'] ?? []);
        $due = ($_POST['categoriesPermissions'] ?? []);
        $tre = ($_POST['userPermissions'] ?? []);
        $quattro = array_merge($uno, $due, $tre);

        $author = [
            'id' => $_GET['id'],
            'permissions' => array_sum($quattro)
        ];

        $this->authorsTable->save($author);
        header('location: index.php?route=author/list');
    }

    public function passwordForm() {
        return ['template' => '/author/modificaPassword.php'];
    }

    // l'utente registrato modifica la password attuale
    public function changePassword() {
        $valid = true;
        $errors = [];
        // prendo l'id dell'utente connesso
        $user = $this->authentication->getUser();
        $userId = $user->id;
        // validazione nuova password
        if (!preg_match('/^[a-zA-Z0-9_\-\$@#!]{8,}$/', $_POST['newPassword'])) {
            $valid = false;
            $errors[] = 'Password not valid';
        };
        // controllo vecchia password con hash
        if (!password_verify($_POST['password'], $user->password)){
            $valid = false;
            $errors[] = 'la password attuale non coincide';
        }
        
        if ($valid == true && password_verify($_POST['password'], $user->password)) {
            // salvo nuova password con hash
            $author['password'] = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
            $this->authorsTable->update_new('id', $userId, 'password',  $author['password']);
            header('location: index.php');
        }
        else {
            // se i dati non sono validi, ripresenta il form con gli errori
            return ['template' => '/author/modificaPassword.php',
                'variables' => ['errors' => $errors]
            ];
        }      
    }

    public function deleteUser() {
		$this->authorsTable->delete($_POST['id']);
        header('location: index.php?route=author/list');
	}
     
// fine classe
}