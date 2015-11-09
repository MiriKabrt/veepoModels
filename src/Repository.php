<?php

namespace Veepo;

use Nette;

/**
 * Provádí operace nad databázovou tabulkou.
 */
abstract class Repository extends Nette\Object
{

	/** @var Nette\Database\Context */
	protected $connection;
	
	/** @var int */
	protected $language;

	public function __construct(Nette\Database\Context $db)
	{
		$this->connection = $db;
	}


	/**
	 * Return number of rows from previous query wihout limit
	 * @return int
	 */
	public function foundRows()
	{
		return $this->connection->query('SELECT FOUND_ROWS() AS count')->fetch()->count;
	}
	
	/**
	 * Return language id
	 * @return int
	 */
	public function getLanguage()
	{
		return $this->language;
	}
	
	/**
	 * @return void
	 */
	public function setLanguage($language)
	{
		$this->language = $language;
	}
	
	/**
	 * 
	 * @param type $field It is field of activeRows
	 * @param type $val It is value which
	 * @return type activeRow
	 */
	public function getRowByValue($field, $val){
		foreach($field as $item){
			if($item->value==$val){
			  $result = $item;
			  break;
			}
		}
		return $item;
	}

	
	public function findAllImage(){
		return $this->connection->table('image')
				->where(':image_t.language_id', $this->language)
				->select('image.address, :image_t.alt, :image_t.title')
				->group('image.id');
	}
	
	public function relatedImage($item, $table){
		return $item->related($table)
				->where('.image_id:image_t.language_id', $this->language)
				->select('.image_id.address, .image_id:image_t.alt, .image_id:image_t.title')
				->group('image.id');
	}
	
}
