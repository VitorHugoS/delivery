<?php namespace delivery;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model {

	protected $table = 'pedido';
	public $timestamps = false;
	protected $fillable = array("idCliente", "entrega", "pagamento", "troco", "status");
	protected $guarded = ["idPedido"];

}
