<?php namespace delivery;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model {

	protected $table = 'pedido';
	public $timestamps = true;
	protected $fillable = array("id_cliente", "status");
	protected $guarded = ["id"];

}
