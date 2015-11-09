<?php

namespace Model;

use Nette;

/**
 * Tabulka user
 */
class Filter extends Repository {
	
	
	public function findByMenuAndParent($menu, $parent = null){
		return $this->findAll()->where(':menu_has_filter.menu_id', $menu)->where('filter.filter_id', $parent);
	}
	
	public function findByMenu($menu){
		return $this->findAll()->where(':menu_has_filter.menu_id', $menu);
	}

	public function findByParent($parent = null){
		return $this->findAll()->where('filter.filter_id', $parent);
	}

	public function findAll() {
		return $this->connection->table('filter')->where('filter.show', 1)->where(':filter_t.language_id', $this->language)->order('order ASC');
	}	
	
}
