@extends("layout.principal")
@section("content")
<script type="text/javascript">
 function formaPagamento(value){
 	var formas = ["Visa", "MasterCard", "Dinheiro"];
 	$.each(formas, function (index, value) {
  		$("."+value).removeClass("pagamento-active");
	});
 	$("."+value).addClass("pagamento-active");
 	$("input[name='forma']").val(value);
 }	
</script>
<style type="text/css">
	#map {
        height: 100%;
    }
</style>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<form method="post" action="/fecharPedido">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="hidden" name="forma">
	<h1 class="text-center">Resumo do Pedido</h1>
	<ul class="list-group">
	@foreach ($Carrinho as $comp)
		<li class="list-group-item">{{$comp->nome}} <span class="text-right text-success">R${{$comp->preco}}</span></li>
	@endforeach
		<li class="list-group-item text-right">Total: R$ {{$Total}}</li>
	</ul>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding-bottom: 30px;">
		<hr/>
		<h1 class="text-center">Entrega</h1>
			<div id="map" style="height: 200px;"></div>
			<br>
			<h3 class="text-info text-center">Endereço Atual: <span id="end">Buscando sua localização...</span>
				<br>
				<h5 class="text-center text-danger" onclick="corrigirEndereco()">Endereço errado? Clique Aqui!</h5>
			</h3>
			<h3 class="text-info hidden" id="correcao">Endereço: <input type="text" name="endereco" class="form-control"></h3>
			<hr/>
		<h1 class="text-center">Forma de Pagamento</h1>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
			Escolha sua Forma de Pagamento
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
			<ul class="list-inline">
				<li onclick="formaPagamento('MasterCard')" class="MasterCard list-group-item pagamento-disabled"><i class="fa fa-credit-card" aria-hidden="true"></i><br>MasterCard</li>
				<li onclick="formaPagamento('Visa')" class="Visa list-group-item pagamento-disabled"><i class="fa fa-credit-card" aria-hidden="true"></i><br>Visa</li>
				<li onclick="formaPagamento('Dinheiro')" class="Dinheiro list-group-item pagamento-disabled"><i class="fa fa-money" aria-hidden="true"></i><br>Dinheiro</li>
			</ul>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
		<hr/>
		<h1 class="text-center">Observações</h1>
		<textarea class="form-control" name="mensagem" placeholder="Mensagem..."></textarea>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
		<hr/>
		<button class="btn btn-block btn-success" style="margin-bottom: 60px;">Finalizar Pedido</button>
		</div>
		</form>
	</div>
</div>
<script>
function corrigirEndereco(){
	$("#correcao").removeClass("hidden");
}
function devolveEndereco(lat, long){
	var lat = lat;
	var long = long;
	var linkGoogle = "https://maps.googleapis.com/maps/api/geocode/json?latlng="+lat+","+long+"&key=AIzaSyBvKgHAr6lV-woM-yZU6PaNdUNG_RnjbY4"
	$.ajax({
		url: linkGoogle,
		dataType: "json",
		success: function(data){
			$("#end").html(data.results[0].formatted_address);
			$("input[name='endereco']").val(data.results[0].formatted_address);
		}
	});
}
function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: -34.397, lng: 150.644},
    zoom: 20,
  });
  var infoWindow = new google.maps.InfoWindow({map: map});

  // Try HTML5 geolocation.
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };

      infoWindow.setPosition(pos);
      infoWindow.setContent('Você esta aqui!');
      devolveEndereco(pos.lat, pos.lng);
      map.setCenter(pos);
    }, function() {
      handleLocationError(true, infoWindow, map.getCenter());
    });
  } else {
    // Browser doesn't support Geolocation
    handleLocationError(false, infoWindow, map.getCenter());
  }
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  infoWindow.setContent(browserHasGeolocation ?
                        'Error: The Geolocation service failed.' :
                        'Error: Your browser doesn\'t support geolocation.');
}

    </script>
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBvKgHAr6lV-woM-yZU6PaNdUNG_RnjbY4&signed_in=true&callback=initMap"
        async defer>
</script>
@endsection
