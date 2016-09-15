<?php namespace delivery;

use Illuminate\Database\Eloquent\Model;

class pizza_Composta extends Model {

	protected $table = 'pizza_composta';
	public $timestamps = false;
	protected $fillable = array("id_pizza", "id_ingrediente");
	protected $guarded = ["id"];


}
