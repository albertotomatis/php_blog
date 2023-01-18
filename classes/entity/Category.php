<?php

class Category {
	public $id;
	public $name;
	private $postTable;
	private $postCategoriesTable;

	public function __construct(DatabaseTable $postTable, DatabaseTable $postCategoriesTable) {
		$this->postTable = $postTable;
		$this->postCategoriesTable = $postCategoriesTable;
	}

	public function getPosts($limit = null, $offset = null) {
		$postCategories = $this->postCategoriesTable->find('categoryId', $this->id, null, $limit, $offset);

		$posts = [];

		foreach ($postCategories as $postCategory) {
			$post =  $this->postTable->findById($postCategory->postId);
			if ($post) {
				$posts[] = $post;
			}			
		}

		return $posts;
	}

	public function getNumPosts() {
		return $this->postCategoriesTable->total('categoryId', $this->id);
	}

}
