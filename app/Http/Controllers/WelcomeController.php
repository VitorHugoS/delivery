<?php namespace delivery\Http\Controllers;
use Illuminate\Support\Facades\DB;
use delivery\Categorias;
use delivery\Pizzas;
use delivery\Ingredientes;
use delivery\pizza_Composta;
use delivery\Carrinho;
use Request;
use Auth;

class WelcomeController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		$categorias = Categorias::all();
		$pizzas = Pizzas::all();
		$dados = array(
			"Titulo" => "Home",
			"Categorias" => $categorias,
			"Pizzas" => $pizzas
		);
		return view("welcome")->with($dados);
	}

	public function pizza($pizza)
	{
		$categorias = Categorias::all();
		$pizzas = Pizzas::where("nome",$pizza)->get();
		$ingredientes = DB::table('pizza_composta')
            ->leftJoin('ingredientes', 'pizza_composta.id_ingrediente', '=', 'ingredientes.id')
            ->where("pizza_composta.id_pizza", $pizzas[0]->id)->get();
		//$pizza_Composta = pizza_Composta::where("id_pizza", $pizzas[0]->id)->get();
		//$ingredientes = Ingredientes::all();
		$dados = array(
			"Titulo" => "Home",
			"Categorias" => $categorias,
			"Pizzas" => $pizzas,
			"Composta" => $ingredientes,
			"Ingredientes" => $ingredientes
		);
		return view("pizza.pizza")->with($dados);
	}

	public function resumo()
	{
		if (Request::isMethod('post'))
		{ 
			//cria registro do carrinho
			Carrinho::firstOrCreate(["id_usuario"=> Request::input("id_usuario", NULL), "id_pizza"=> Request::input("id_pizza", NULL)]);
			//retorna o carrinho atual do usuario
			$dadosCarrinho = DB::table('carrinho')->leftJoin('pizzas', 'carrinho.id_pizza', '=', 'pizzas.id')
	            ->where("carrinho.id_usuario", Auth::user()->id)->get();
			$dados = array(
				"Titulo" => "Resumo",
				"Carrinho" => $dadosCarrinho
			);
			return view("pedido.pedido")->with($dados);
		}
		return redirect()->action("WelcomeController@carrinho");
	}

	public function carrinho()
	{
		//retorna o carrinho atual do usuario
		//$dadosCarrinho = Carrinho::where("id_usuario", Auth::user()->id)->get();
		$dadosCarrinho = DB::table('carrinho')->leftJoin('pizzas', 'carrinho.id_pizza', '=', 'pizzas.id')
            ->where("carrinho.id_usuario", Auth::user()->id)->get();
		$dados = array(
			"Titulo" => "Resumo",
			"Carrinho" => $dadosCarrinho
		);
		return view("pedido.pedido")->with($dados);
	}
}
