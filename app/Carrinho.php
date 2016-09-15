<?php namespace delivery;

use Illuminate\Database\Eloquent\Model;

class Carrinho extends Model {

	protected $table = 'carrinho';
	public $timestamps = false;
	protected $fillable = array("id_usuario", "id_pizza");
	protected $guarded = ["idCarrinho"];

}
