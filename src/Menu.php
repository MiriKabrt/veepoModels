<?php

namespace Veepo;

use Nette;

/**
 * Tabulka user
 */
class Menu extends Repository {
	
	public function findX(){
		return 1;
	}
	
	public function findImageById($id) {
		return $this->connection->table('image')->where(':menu_has_image.menu_id', $id);
	}
	
	public function findById($id) {
		return $this->findAll()->where('menu.id', $id);
	}
	
	public function findByValueAndParent($value, $parent = NULL) {
		return $this->findAll()->where(':menu_t.value', $value)->where('menu.menu_id', $parent);
	}
	
	public function findByValue($value) {
		return $this->findAll()->where(':menu_t.value', $value);
	}
	
	
	public function findByTypeAndParent($type, $parent = NULL) {
		return $this->findByParent($parent)->where('menu.menu_type_id', $type);
	}
	
	public function findByParent($parent = NULL) {
		return $this->findAll()->where('menu.menu_id', $parent);
	}
	
	
	public function findAll() {
		return $this->connection->table('menu')->where('menu.show', 1)->where(':menu_t.language_id', $this->language);
	}
	
	public function relatedByParent($item, $parent) {
		return $this->relatedAll($item)->where('menu.menu_id', $parent);
	}
	
	public function relatedAll($item) {
		return $item->related('menu')->where('menu.show', 1)->where(':menu_t.language_id', $this->language);
	}
	
}
