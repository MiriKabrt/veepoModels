<?php

namespace Model;

use Nette;

/**
 * Tabulka user
 */
class Text extends Repository {
	
	public function findImageById($id) {
		return $this->findAllImage()->where(':text_has_image.text_id', $id);
	}
	
	public function findValuesById($id) {
		return $this->connection->table('text_values')->where('text_id', $id);
	}
	
	public function findByMenuAndPart($menu, $part) {
		return $this->findAll()->where(':menu_has_text.menu_id', $menu)->where(':part_has_text.part_id', $part);
	}
	
	public function findByMenuAndType($id, $type) {
		return $this->findAll()->where(':menu_has_text.menu_id', $id)->where('.text_type.id', $type);
	}
	
	public function findByMenu($id) {
		return $this->findAll()->where(':menu_has_text.menu_id', $id);
	}
	
	public function findByProductAndType($product, $type) {
		return $this->findAll()->where(':product_has_text.product_id', $product)->where('.text_type.id', $type);
	}
	
	public function findByPart($id) {
		return $this->findAll()->where(':part_has_text.part_id', $id);
	}
	
	public function findByValue($value) {
		return $this->findAll()->where(':text_t.value', $value);
	}
	
	public function findByType($id) {
		return $this->findAll()->where('.text_type.id', $id);
	}
	
	public function findById($id) {
		return $this->findAll()->where('text.id', $id);
	}
	
	
	public function findAll() {
		return $this->connection->table('text')->where('text.show', 1)->where(':text_t.language_id', $this->language);
	}
	
}
