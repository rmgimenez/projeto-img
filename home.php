<div class="header">
    <h1>Sistema gerador de posts</h1>
    <h2>Página Inicial - Estatísticas</h2>
</div>

<div class="content">
    <h2 class="content-subhead">Estatísticas</h2>

<?php 
	
	$c_url = curl_init();
	curl_setopt($c_url, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($c_url, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($c_url, CURLOPT_URL,"https://api.imgur.com/3/gallery/r/cosplay");
	curl_setopt($c_url, CURLOPT_HTTPHEADER, array('Authorization: Client-ID ' . $client_id));
	$result=curl_exec($c_url);
	curl_close($c_url);
	$json_array = json_decode($result, true);
	print("Reddit");
	//print_r($json_array);

	$c_url = curl_init();
	curl_setopt($c_url, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($c_url, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($c_url, CURLOPT_URL,"https://api.imgur.com/3/gallery/t/cosplay/time");
	curl_setopt($c_url, CURLOPT_HTTPHEADER, array('Authorization: Client-ID ' . $client_id));
	$result=curl_exec($c_url);
	curl_close($c_url);
	$json_array = json_decode($result, true);

	print("TAG");
	print_r($json_array);

?>

</div>