<?php
// controlles
include __DIR__ . '/../classes/controllers/PostController.php';
include __DIR__ . '/../classes/controllers/RegisterController.php';
include __DIR__ . '/../classes/controllers/LoginController.php';
include __DIR__ . '/../classes/controllers/CategoryController.php';
// classes
include __DIR__ . '/../classes/DatabaseTable.php';
include __DIR__ . '/../classes/Authentication.php';
include __DIR__ . '/../classes/Routes.php';
include __DIR__ . '/../classes/entity/Author.php';
include __DIR__ . '/../classes/entity/Post.php';
include __DIR__ . '/../classes/entity/Category.php';

class PostRoutes implements Routes {

    private $authorsTable;
    private $postTable;
    private $categoriesTable;
    private $postCategoriesTable;
    private $authentication;

    public function __construct() {
        include __DIR__ . '/../includes/DatabaseConnection.php';
        // & riferimento 
        $this->postTable = new DatabaseTable($pdo, 'post', 'id', 'post', [&$this->authorsTable,
            &$this->postCategoriesTable]);
        $this->authorsTable = new DatabaseTable($pdo, 'author', 'id', 'Author', [&$this->postTable]);
        $this->categoriesTable = new DatabaseTable($pdo, 'category', 'id', 'Category',
            [&$this->postTable, &$this->postCategoriesTable] );
        $this->postCategoriesTable = new DatabaseTable($pdo, 'post_category', 'categoryId');
        $this->authentication = new Authentication($this->authorsTable, 'email', 'password');   
    }

    public function getRoutes(): array {

        $postController = new PostController($this->postTable, $this->authorsTable,
        $this->categoriesTable, $this->authentication, $this->postCategoriesTable);
        $authorController = new RegisterController($this->authorsTable, $this->authentication);
        $loginController = new Login($this->authentication);
        $categoryController = new CategoryController($this->categoriesTable);

        // REST
        $routes = [
            'author/register' => [
                'GET' => [
                    'controller' => $authorController,
                    'action' => 'registrationForm' 
                ],
                'POST' => [
                    'controller' => $authorController,
                    'action' => 'registerUser' 
                ],
                // la prima volta eliminare queste righe, registrare l'admin e assegnarli i permessi. Poi rimetterle.
                'login' => true,
                // prima assegnare il permesso all'admin, poi scrivere questa riga
                'permissions' => Author::USER_MANAGE['REGISTER_NEW_USER']
            ],
            'author/success' => [
                'GET' => [
                    'controller' => $authorController,
                    'action' => 'success' 
                ]
            ],
            'author/permissions' => [
				'GET' => [
					'controller' => $authorController,
					'action' => 'permissions'
				],
				'POST' => [
					'controller' => $authorController,
					'action' => 'savePermissions'
				],
				'login' => true,
                // prima assegnare il permesso all'admin, poi scrivere questa riga
                'permissions' => Author::USER_MANAGE['EDIT_USER_ACCESS']
			],
			'author/list' => [
				'GET' => [
					'controller' => $authorController,
					'action' => 'list'
				],
				'login' => true,
                // prima assegnare il permesso all'admin, poi scrivere questa riga
                'permissions' => Author::USER_MANAGE['EDIT_USER_ACCESS']
			],
            'author/password' => [
				'GET' => [
                    'controller' => $authorController,
                    'action' => 'passwordForm' 
                ],
                'POST' => [
                    'controller' => $authorController,
                    'action' => 'changePassword' 
                ],
                'login' => true
			],
            'author/delete' => [
                'POST' => [
                    'controller' => $authorController,
                    'action' => 'deleteUser' 
                ]
            ],
            'login/error' => [
                'GET' => [
                    'controller' => $loginController,
                    'action' => 'error'
                ]
            ],
            'login' => [
                'GET' => [
                    'controller' => $loginController,
                    'action' => 'loginForm'
                ],
                'POST' => [
                    'controller' => $loginController,
                    'action' => 'processLogin'
                ]
            ],
            'login/success' => [
                'GET' => [
                    'controller' => $loginController,
                    'action' => 'success'
                ],
                'login' => true
            ],
            'logout' => [
                'GET' => [
                    'controller' => $loginController,
                    'action' => 'logout'
                ]
            ],
            'post/add' => [
                'POST' => [
                    'controller' => $postController,
                    'action' => 'saveEdit'
                ],
                'GET' => [
                    'controller' => $postController,
                    'action' => 'add'
                ],
                // metterlo in ogni rotta che richiede il login per essere visualizzata
                'login' => true,
                'permissions' => Author::POST_PERMISSIONS['ADD_POST']  
                ],
            'post/edit' => [
                'POST' => [
                    'controller' => $postController,
                    'action' => 'saveEdit'
                ],
                'GET' => [
                    'controller' => $postController,
                    'action' => 'edit'
                ],
                // metterlo in ogni rotta che richiede il login per essere visualizzata
                'login' => true
            ],
            'post/delete' => [
                'POST' => [
                    'controller' => $postController,
                    'action' => 'delete'
                ],
                'login' => true
            ],
            'post/list' => [
                'GET' => [
                    'controller' => $postController,
                    'action' => 'list', 'searchForm'
                ],
                'POST' => [
					'controller' => $postController,
					'action' => 'searchByTitle'
				]
            ],    
            'post/home' => [
                'GET' => [
                    'controller' => $postController,
                    'action' => 'home'
                ]
            ],
            'post/dashboard' => [
                'GET' => [
                    'controller' => $postController,
                    'action' => 'dashboard'
                ],
                'login' => true
            ],
            'post/yourposts' => [
                'GET' => [
                    'controller' => $postController,
                    'action' => 'postsByAuthor'
                ],
                'login' => true
            ],
            'post/singlepost' => [
                'GET' => [
                    'controller' => $postController,
                    'action' => 'singlePost'
                ]
            ],
            'category/add' => [
                'POST' => [
                    'controller' => $categoryController,
                    'action' => 'saveEdit'
                ],
                'GET' => [
                    'controller' => $categoryController,
                    'action' => 'add'
                ],
                'login' => true,
                'permissions' => Author::CATEGORIES_PERMISSIONS['ADD_CATEGORIES']   
            ],
            'category/edit' => [
                'POST' => [
                    'controller' => $categoryController,
                    'action' => 'saveEdit'
                ],
                'GET' => [
                    'controller' => $categoryController,
                    'action' => 'edit'
                ],
                'login' => true,
                'permissions' => Author::CATEGORIES_PERMISSIONS['EDIT_CATEGORIES']
            ],
            'category/delete' => [
				'POST' => [
					'controller' => $categoryController,
					'action' => 'delete'
				],
				'login' => true,
				'permissions' => Author::CATEGORIES_PERMISSIONS['REMOVE_CATEGORIES']
			],
            'category/list' => [
                'GET' => [
                    'controller' => $categoryController,
                    'action' => 'list'
                ],
                'login' => true,
                'permissions' => Author::CATEGORIES_PERMISSIONS['LIST_CATEGORIES']
            ]
        ];
        return $routes;
    }   
    
    public function getAuthentication(): Authentication {
        return $this->authentication;       
    } 
    
    public function checkPermission($permission): bool {
		$user = $this->authentication->getUser();

		if ($user && $user->hasPermission($permission)) {
			return true;
		} else {
			return false;
		}
	}
}
    
