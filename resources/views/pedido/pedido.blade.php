@extends("layout.principal")
@section("content")
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<h1 class="text-center">Resumo do Pedido</h1>
	<ul class="list-group">
	@foreach ($Carrinho as $comp)
		<li class="list-group-item">{{$comp->nome}}</li>
	@endforeach
	</ul>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="padding-bottom: 30px;">
		<form action="/" method="post">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<button class="btn btn-block btn-danger">Adicionar mais Itens</button>
		</form>
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		<form action="/finalizar">
			<button class="btn btn-block btn-success">Fechar Pedido</button>
		</form>
	</div>
	
</div>
@endsection