<?php namespace delivery;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model {

	protected $table = 'categorias';
	public $timestamps = false;
	protected $fillable = array("nome", "icon");
	protected $guarded = ["id"];

}
