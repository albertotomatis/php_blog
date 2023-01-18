<?php
class Author {

	// permessi binari. si possono salvare fino a 64 cifre
	const POST_PERMISSIONS = [
		'ADD_POST' => 1, // l'utente puo aggiungere, modificare, eliminare solo le sue
		'EDIT_POST' => 2,	// modifica quelle di tutti
		'DELETE_POST' => 4	// // cancella quelle di tutti
	];
	const CATEGORIES_PERMISSIONS = [
		'LIST_CATEGORIES' => 8,
		'ADD_CATEGORIES' => 16,
		'EDIT_CATEGORIES' => 32,
		'REMOVE_CATEGORIES' => 64,
	];
	const USER_MANAGE = [
		'EDIT_USER_ACCESS' => 128, // assegna o modifica permessi utenti
		'REGISTER_NEW_USER' => 16384,
		'DELETE_USER' => 32768
	];
	
	public $id;
	public $name;
	public $email;
	public $password;
	private $postTable;

	public function __construct(DatabaseTable $postTable) {
		$this->postTable = $postTable;
	}

	public function getPosts() {
		return $this->postTable->find('authorid', $this->id);
	}

	public function addPost($post) {
		$post['authorid'] = $this->id;
		return $this->postTable->save($post);
	}

	public function hasPermission($permission) {
		return $this->permissions & $permission;
	}
}