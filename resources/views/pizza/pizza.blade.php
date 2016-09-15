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
	<div class="col-sm-12 col-md-12 col-xs-12 col-lg-12" style="padding-top: 30px;padding-bottom: 60px;">
		<h1 class="text-center">{{$Pizzas[0]->nome}}</h1>
		<div class="col-sm-12 col-md-3 col-xs-12 col-lg-3 text-center">
			<img src="/{{$Pizzas[0]->imagem}}">
		</div>
		<div class="col-sm-12 col-md-6 col-xs-12 col-lg-6 col-md-offset-2 col-lg-offset-2 text-right">
			<table class="table table-striped">
			<tr>
				<td><p>{{$Pizzas[0]->nome}}</p></td>
			</tr>
			<tr>
				<td><p class="text-success">R${!! str_replace('.', ',', $Pizzas[0]->preco) !!}</p></td>
			</tr>
			<tr>
				<td><p class="text-center"><b>Ingredientes : @foreach ($Composta as $comp){{$comp->nome}}, @endforeach</b></p></td>
			</tr>
			</table>
			<form method="post" action="/pedir">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="id_pizza" value="{{$Pizzas[0]->id}}">
				<input type="hidden" name="id_usuario" value="{{Auth::user()->id}}">
				<button type="submit" class="btn btn-block btn-success">Pedir</button>
			</form>
		</div>
	</div>
@endsection