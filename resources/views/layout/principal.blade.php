<!DOCTYPE html>
<html>
<head>
	<title>{{$Titulo}}</title>
	<link rel="stylesheet" type="text/css" href="/css/app.css">
	<link rel="stylesheet" type="text/css" href="/css/custom.css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet'  type='text/css'>
	<link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css' rel='stylesheet'  type='text/css'>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top topocor box-shadow">
  <div class="container">
    <img src="/imagens/logo.jpg" class="logo img-responsive center-block">
  </div>
</nav>
<div class="container-fluid" style="padding-top: 100px!important; padding: 0;">
	@yield('content')
</div>
<div class="rodape">
	<p class="copyright">Desenvolvido por <a href="http://atadesign.com.br" target="_blank">ATA Design.</a></p>
</div>
</body>
</html>