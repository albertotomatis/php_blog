<?php
class post {
	public $id;
	public $authorid;
	public $postdate;
	public $posttext;
	public $postimage;
	private $authorsTable;
	private $author;
	private $postCategoriesTable;

	public function __construct(DatabaseTable $authorsTable,
		DatabaseTable $postCategoriesTable) {
		$this->authorsTable = $authorsTable;
		$this->postCategoriesTable = $postCategoriesTable;
	}

	public function getAuthor() {
		if (empty($this->author)) {
			$this->author = $this->authorsTable->findById($this->authorid);
		}		
		return $this->author;
	}

	public function addCategory($categoryId) {
		$postCat = ['postId' => $this->id,
			'categoryId' => $categoryId];

			$this->postCategoriesTable->save($postCat);
	}

	public function hasCategory($categoryId) {
		$postCategories = $this->postCategoriesTable->find('postId', $this->id);

		foreach ($postCategories as $postCategory) {
			if ($postCategory->categoryId == $categoryId) {
				return true;
			}
		}
	}

	public function clearCategories() {
		$this->postCategoriesTable->deleteWhere('postId', $this->id);
	}
}
