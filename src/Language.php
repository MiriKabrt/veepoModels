<?php

namespace Veepo;

use Nette;

/**
 * Tabulka user
 */
class Language extends Repository {
	
	
	public function findByShortcut($lang) {
		return $this->connection->table('language')->where('show', 1)->where('deleted', 0)->where('shortcut', $lang)->fetch();
	}
	
	
	
	
	
	
}
