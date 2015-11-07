<?php

namespace Veepo;

use Nette;

/**
 * Tabulka user
 */
class Part extends Repository {
	
	public function findByMenu($id) {
		return $this->findAll()->where(':menu_has_part.menu_id', $id);
	}
	
	
	public function findAll() {
		return $this->connection->table('part')->where(':part_t.language_id', $this->language);
	}
	
}
