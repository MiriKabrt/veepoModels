<?php

namespace Veepo;

use Nette;

/**
 * Tabulka order
 */
class Order extends Repository {
	
	public function getOrder() {
		return $this->connection->table('order');
	}
	
	public function getOrderGoods() {
		return $this->connection->table('order_has_goods_spiece');
	}
	
}
