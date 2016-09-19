<?php namespace delivery;

use Illuminate\Database\Eloquent\Model;

class itensPedido extends Model {

	protected $table = 'itensPedido';
	public $timestamps = false;
	protected $fillable = array("idPedido", "idProduto", "quantidade");
	protected $guarded = ["idPedidoDetalhado"];
}
