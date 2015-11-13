<?php

namespace Veepo;

use Nette;

/**
 * Tabulka user
 */
class Link extends Repository {
	

	public function findAll() {
		return $this->connection->table('link')->where('link.show', 1)->where(':link_t.language_id', $this->language)->order('order ASC');
	}	
	
}
