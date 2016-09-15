<?php namespace delivery;

use Illuminate\Database\Eloquent\Model;

class Pedido_detalhado extends Model {

	protected $table = 'pedido_detalhado';
	public $timestamps = false;
	protected $fillable = array("id_pedido", "id_item");
	protected $guarded = ["idPedidoDetalhado"];

}
