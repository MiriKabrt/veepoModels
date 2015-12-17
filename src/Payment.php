<?php

namespace Veepo;

use Nette;

/**
 * Tabulka payment
 */
class Payment extends Repository {

	public function findByIdAndPrice($id,$price){
		return $this->connection->table('payment')
		->select('payment.*,:payment_t.*,:payment_piece.*,:payment_piece:payment_piece_price.*')
		->where('payment.show', 1)
		->where(':payment_t.language_id', $this->language)
		->where('payment.id',$id)
		->where(':payment_piece.priceFrom <= ?',$price)->where(':payment_piece.priceTo >= ?',$price)
		->fetch();
	}	
	
	public function findById($id){
		return $this->connection->table('payment')
		->select('payment.*,:payment_t.*,:payment_piece.*,:payment_piece:payment_piece_price.*')
		->where('payment.show', 1)
		->where(':payment_t.language_id', $this->language)
		->where('payment.id',$id)
		->fetch();
	}	
	
	public function findAll() {
		return $this->connection->table('payment')->where('payment.show', 1)->where(':payment_t.language_id', $this->language);
	}
	
}
