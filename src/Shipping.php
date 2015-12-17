<?php

namespace Veepo;

use Nette;

/**
 * Tabulka shipping
 */
class Shipping extends Repository {

	public function fetchPairs(){
		return $this->findAll()->fetchPairs('id','name');
	}
	
	public function findByIdAndPrice($id, $price){
		return $this->connection->table('shipping')
			->select('shipping.*,:shipping_t.*,:shipping_piece.*,:shipping_piece:shipping_piece_price.*')
			->where('shipping.show', 1)
			->where(':shipping_t.language_id', $this->language)
			->where('shipping.id',$id)
			->where(':shipping_piece.priceFrom <= ?',$price)->where(':shipping_piece.priceTo >= ?',$price)
			->fetch();
	}
		
	public function findById($id){
		return $this->connection->table('shipping')
			->select('shipping.*,:shipping_t.*,:shipping_piece.*,:shipping_piece:shipping_piece_price.*')
			->where('shipping.show', 1)
			->where(':shipping_t.language_id', $this->language)
			->where('shipping.id',$id)
			->fetch();
	}
	
	public function fetchPairsPaymentsById($id){
		return $this->findAll()->where(':shipping_has_payment.shipping_id',$id)->fetchPairs('id','name');
	}
	
	public function findAll() {
		return $this->connection->table('shipping')->where('shipping.show', 1)->where(':shipping_t.language_id', $this->language);
	}
	
}
