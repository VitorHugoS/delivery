<?php namespace delivery;

use Illuminate\Database\Eloquent\Model;

class Pizzas extends Model {

	protected $table = 'pizzas';
	public $timestamps = false;
	protected $fillable = array("nome", "preco");
	protected $guarded = ["id"];
}
