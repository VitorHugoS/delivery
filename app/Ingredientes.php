<?php namespace delivery;

use Illuminate\Database\Eloquent\Model;

class Ingredientes extends Model {

	protected $table = 'ingredientes';
	public $timestamps = false;
	protected $fillable = array("nome", "preco");
	protected $guarded = ["id"];

}
