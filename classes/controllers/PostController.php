<?php

class PostController {
    private $authorsTable;
    private $postTable;
    private $categoriesTable;
    private $authentication;
    private $postCategoriesTable;

    public function __construct(DatabaseTable $postTable, DatabaseTable $authorsTable,
        DatabaseTable $categoriesTable, Authentication $authentication, DatabaseTable $postCategoriesTable) {
        $this->postTable = $postTable;
        $this->authorsTable = $authorsTable;
        $this->categoriesTable = $categoriesTable;
        $this->authentication = $authentication;
        $this->postCategoriesTable = $postCategoriesTable;
    }

    public function list() {

		$page = $_GET['page'] ?? 1;

		$offset = ($page-1)*6;

		if (isset($_GET['category'])) {
			$category = $this->categoriesTable->findById($_GET['category']);
			$posts = $category->getPosts(6, $offset);
			$totalPosts = $category->getNumPosts();
		}
		else {
			$posts = $this->postTable->findAll('data DESC', 6, $offset);
			$totalPosts = $this->postTable->total();
		}		

		$author = $this->authentication->getUser();

		return ['template' => '/posts/listPosts.php', 
				'variables' => [
						'totalPosts' => $totalPosts,
						'posts' => $posts,
						'user' => $author,
						'categories' => $this->categoriesTable->findAll(),
						'currentPage' => $page,
						'categoryId' => $_GET['category'] ?? null
					]
				];
	}

    public function page() {
        return ['template' => 'index.php?route=post/list&page'];
    }

    public function home() {
        return ['template' => 'home.php'];
    }

    public function delete() {
		$author = $this->authentication->getUser();
		$post = $this->postTable->findById($_POST['id']);

		if ($post->authorid != $author->id &&
            !$author->hasPermission(Author::POST_PERMISSIONS['DELETE_POST'])) {
			return;
		}	

        // cancella il post dalla tabella posts
		$this->postTable->delete($_POST['id']);

        // cancella il post anche dalla tabella post_category
        $this->postCategoriesTable->deleteWhere('postId', $_POST['id'] );

        // cancella l'immagine anche dalla cartella images
        unlink($post->image);
		header('location: index.php?route=post/list');
	}

    public function saveEdit() {
        $author = $this->authentication->getUser();
        $post = $_POST['post'];
        $post['data'] = new DateTime();

        // se l'upload non è vuoto
        if ($_FILES['file']['name'] !== "") {
            $uploadfile = explode('.', $_FILES['file']['name']);
            $ext_file = end($uploadfile);
            // il file caricato deve avere estensione contenuta nell'array
            $ext_ammesse = ['jpg'];
            $link_address = 'index.php?route=post/add';
            if (!in_array($ext_file, $ext_ammesse)) {
                echo "Tipo file non ammesso. Puoi caricare file con estensione 'jpg' 
            <br><br><a href='$link_address'>Torna alla schermata di caricamento file</a>";
                exit;
            }
            // se il file è più grande di 2MB
            if ($_FILES['file']['size'] >= 2097152) {
                echo "file troppo grande. Puoi caricare file fino a 2MB
            <br><br><a href='$link_address'>Torna alla schermata di caricamento file</a>";
                exit;
            }

            $uploadfile = 'images/images' . uniqid() . '.jpg';
            if (!move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                echo "Si è verificato un errore. File non valido.";
            }

            $post['image'] = $uploadfile;
        }

        $postEntity = $author->addPost($post);

		$postEntity->clearCategories();

		foreach ($_POST['category'] as $categoryId) {
			$postEntity->addCategory($categoryId);
		}

        header('location: index.php?route=post/list');
    }

    public function edit() {
        $author = $this->authentication->getUser();
        $categories = $this->categoriesTable->findAll();
        if (isset($_GET['id'])) {
            $post = $this->postTable->findById($_GET['id']);
        }
        return ['template' => '/posts/editPosts.php',
            'variables' => [ 
                'post' => $post ?? null,
                'user' => $author,
                'categories' => $categories
            ]
        ];
    }

    public function add() {
        $categories = $this->categoriesTable->findAll();
        if (isset($_GET['id'])) {
            $post = $this->postTable->findById($_GET['id']);
        }
        return ['template' => '/posts/addPosts.php',
        'variables' => [ 
            'categories' => $categories,
            'post' => $post ?? null,
        ]];
    }

    public function dashboard() {
        $author = $this->authentication->getUser();
        $posts = $this->postTable->findAll('data DESC');
        return ['template' => 'dashboard.php',
        'variables' => [ 
            'user' => $author,
            'posts' => $posts
        ]];
    }

    // mostra tutte le posts dell'utente connesso
    public function postsByAuthor() {
        $posts = $this->postTable->findAll('data DESC');  
		$author = $this->authentication->getUser();;
        return ['template' => '/posts/postsByAuthor.php',
        'variables' => [ 
            'posts' => $posts,
            'user' => $author
        ]];
    }

    public function singlePost() {	
        $post = $this->postTable->findById($_GET['id']);
        $author = $this->authentication->getUser();
        $categories = $this->categoriesTable->findAll();
        return ['template' => '/posts/singlePost.php',
            'variables' => [ 
                'post' => $post,
                'user' => $author
            ]
        ];
    }

    public function searchForm() { 
        return ['template' => '/posts/listPosts.php'];
    }

    public function searchByTitle() {
            $input_search = '%' . $_POST["search"] . '%';
            $posts = $this->postTable->search('title', $input_search); 
            return ['template' => '/search/result.php',
            'variables' => [ 
                'posts' => $posts
            ]];
    }

// fine classe    
}

