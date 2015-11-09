<?php

namespace Model;

use Nette;

/**
 * Tabulka user
 */
class Product extends Repository {
	
	
	
	
	public function findTournaments($menu = null, $filter = null, $from = null, $to = null){
		
		$piece = $this->findAllPiece()
				->where('product_id.show', 1)
				->where(':product_piece_t.value NOT ? OR :product_piece_t.value != ? ', null,'')
				->group('product_piece.id');
		
		if($menu !== null){
			$piece->where('product_id:product_has_menu.menu_id', $menu);
		}
		if($filter !== null){
			$countArr = count($filter);
			if ($countArr > 0){
				$piece->where('product_id:product_has_filter.filter_id', $filter)
						->having('count(*) = ?', $countArr);
			}
		}
		if($from !== null){
			$piece->where('product_piece.dateFrom >= ?', $from);
		}
		if($to !== null){
			$piece->where('product_piece.dateTo <= ?', $to);
		}
		
		return $piece;
		/*return $this->findByMenu($menu)->where(":product_piece.dateFrom >= ?", $from)
								->where(":product_piece.dateTo <= ?", $to)->group(':product_piece.id');*/
	}
	
	public function findPieceByProduct($product){
		return $this->findAllPiece()->where('product_id', $product);
	}
	
	
	
	public function findAllValues($id) {
		return $this->connection->table('product_values')->where('product_values.product_id', $id);
	}
	
	public function findImageById($id) {
		return $this->findAllImage()->where(':product_has_image.product_id', $id);
	}
	
	public function findByMenuAndPart($menu, $part) {
		return $this->findAll()->where(':product_has_menu.menu_id', $menu)->where(':part_has_product.part_id', $part);
	}
	
	public function findByValue($value) {
		return $this->findAll()->where(':product_t.value', $value);
	}
	
	public function findByMenu($id) {
		return $this->findAll()->where(':product_has_menu.menu_id', $id);
	}
	
	public function findByPart($id) {
		return $this->findAll()->where(':part_has_product.part_id', $id);
	}
	
	
	
	
	public function findAllPiece(){
		return $this->connection->table('product_piece')->where(':product_piece_t.language_id', $this->language)->group('product_piece.id');
	}
	
	public function findAll() {
		return $this->connection->table('product')->where('product.show', 1)->where(':product_t.language_id', $this->language);
	}
	


	
}
