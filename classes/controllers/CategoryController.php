<?php

class CategoryController {
    private $categoriesTable; 
        

    public function __construct(DatabaseTable $categoriesTable) {
		$this->categoriesTable = $categoriesTable;
	}

    public function edit() {

		if (isset($_GET['id'])) {
			$category = $this->categoriesTable->findById($_GET['id']);
		}

		return ['template' => '/category/editCategory.php',
				'variables' => [
					'category' => $category ?? null
				]
		];
	}

    public function saveEdit() {     
        $category = $_POST['category'];
        $this->categoriesTable->save($category);
        header('location: index.php?route=category/list');
    }

    public function add() {
        return ['template' => '/category/addCategory.php'];
    }

    public function list() {
        $categories = $this->categoriesTable->findAll();

        return ['template' => '/category/listCategories.php',
        'variables' => [
            'categories' => $categories
        ]
        ];
    }

    public function delete() {
        $this->categoriesTable->delete($_POST['id']);
        header('location: index.php?route=category/list');
    }

// fine classe
}