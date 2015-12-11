<?php

namespace Veepo;

use Nette;

/**
 * Tabulka user
 */
class Lease extends Repository {
	
	
	
	public function findAll() {
		return $this->connection->table('lease');
	}
	
	
	
}
