@extends("layout.principal")
@section("content")
	<div class="col-sm-12 col-md-12 col-xs-12 col-lg-12 categorias">
		@if (!empty($Categorias))
			<ul class="list-inline">
			@foreach ($Categorias as $cat)
			<li>
				<a href="/{{strtolower($cat->nome)}}" class="linkCategorias">
				<br>
				<img src="/{{$cat->icon}}" class="icon">
				<br>
				{{$cat->nome}}
				</a>
			</li>
			@endforeach
			</ul>
		@else
			<div class="alert alert-danger">
				Nenhuma produto cadastrado!
			</div>
		@endif
	</div>
	<div class="col-sm-12 col-md-12 col-xs-12 col-lg-12" style="padding-top: 30px;padding-bottom: 30px;">
		@if (!empty($Pizzas))
			@foreach ($Pizzas as $pizza)
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 text-center" style="padding-top: 30px;padding-bottom: 30px;">
				<a href="/pizza/{{strtolower($pizza->nome)}}" class="linkPizzas">
				<img src="/{{$pizza->imagem}}" class="iconPizza">
				<br>
				<span>{{$pizza->nome}}</span>
				<br>
				R${!! str_replace('.', ',', $pizza->preco) !!}
				</a>
			</div>
			@endforeach
		@else
			<div class="alert alert-danger">
				Nenhuma produto cadastrado!
			</div>
		@endif
	</div>
@endsection