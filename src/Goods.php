<?php

namespace Veepo;

use Nette;

/**
 * Tabulka user
 */
class Goods extends Repository {
	
	public function findImageById($id) {
		return $this->connection->table('image')->where(':goods_has_image.goods_id', $id);
	}
	
	public function findPriceByGood($good){
		return $good->related('goods_price')->where('goods_price.default',1)->fetch();	
	}
	
	
	
	public function findByValue($id){
		return $this->findAll()->where(':goods_t.value', $id)->fetch();
	}
	
	public function findAll() {
		return $this->connection->table('goods')->where('goods.show', 1)->where(':goods_t.language_id', $this->language);
	}
	
}
