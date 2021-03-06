<?php 

include('chaves_api.php');

/**
Função que retorna o array de resposta do site imgur quando o tipo selecionado for uma tag
Parâmetros:
	$tag = nome da tag desejada
	$tipo = número que indica o tipo da url que será montada, pois o site imgur tem vários tipos de urls para etornar os dados. Por exemplo: posso passar aqui que quero trazer apenas os itens de hoje de uma determinada tag. A variável tipo poderá ter os seguintes valores:
		1 - todos ordenados por popularidade
		2 - ultimos posts
		3 - por popularidade
		4 - maior pontuação hoje
		5 - maior pontuação semana
		6 - maior pontuação mês
		7 - maior pontuação ano
		8 - maior pontuação todo o tempo
*/
function ret_array_tag($tag, $tipo)
{
	global $imgur_client_id;

	switch ($tipo) {
		case 1:
			$url = "https://api.imgur.com/3/gallery/t/".$tag;
			break;

		case 2:
			$url = "https://api.imgur.com/3/gallery/t/".$tag."/time";
			break;
		
		case 3:
			$url = "https://api.imgur.com/3/gallery/t/".$tag."/viral";
			break;

		case 4:
			$url = "https://api.imgur.com/3/gallery/t/".$tag."/top";
			break;

		case 5:
			$url = "https://api.imgur.com/3/gallery/t/".$tag."/week";
			break;

		case 6:
			$url = "https://api.imgur.com/3/gallery/t/".$tag."/month";
			break;

		case 7:
			$url = "https://api.imgur.com/3/gallery/t/".$tag."/year";
			break;

		case 8:
			$url = "https://api.imgur.com/3/gallery/t/".$tag."/all";
			break;

		default:
			$url = "https://api.imgur.com/3/gallery/t/".$tag;
			break;
	}

	$c_url = curl_init();
	curl_setopt($c_url, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($c_url, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($c_url, CURLOPT_URL,"https://api.imgur.com/3/gallery/t/".$tag);
	curl_setopt($c_url, CURLOPT_HTTPHEADER, array('Authorization: Client-ID ' . $imgur_client_id));
	$result=curl_exec($c_url);
	curl_close($c_url);
	$json_array = json_decode($result, true);
	return $json_array;
}

/**
Função que retorna o array de resposta do site imgur quando o tipo selecionado for reddit
Parâmetros:
	$tag = nome da tag desejada
	$tipo = número que indica o tipo da url que será montada, pois o site imgur tem vários tipos de urls para etornar os dados. Por exemplo: posso passar aqui que quero trazer apenas os itens de hoje de uma determinada tag. A variável tipo poderá ter os seguintes valores:
		1 - todos ordenados por popularidade
		2 - ultimos posts
		3 - por popularidade
		4 - maior pontuação hoje
		5 - maior pontuação semana
		6 - maior pontuação mês
		7 - maior pontuação ano
		8 - maior pontuação todo o tempo
*/
function ret_array_reddit($tag, $tipo)
{
	global $imgur_client_id;

	switch ($tipo) {
		case 1:
			$url = "https://api.imgur.com/3/gallery/r/".$tag;
			break;

		case 2:
			$url = "https://api.imgur.com/3/gallery/r/".$tag."/time";
			break;
		
		case 3:
			$url = "https://api.imgur.com/3/gallery/r/".$tag."/viral";
			break;

		case 4:
			$url = "https://api.imgur.com/3/gallery/r/".$tag."/top";
			break;

		case 5:
			$url = "https://api.imgur.com/3/gallery/r/".$tag."/week";
			break;

		case 6:
			$url = "https://api.imgur.com/3/gallery/r/".$tag."/month";
			break;

		case 7:
			$url = "https://api.imgur.com/3/gallery/r/".$tag."/year";
			break;

		case 8:
			$url = "https://api.imgur.com/3/gallery/r/".$tag."/all";
			break;

		default:
			$url = "https://api.imgur.com/3/gallery/r/".$tag;
			break;
	}

	$c_url = curl_init();
	curl_setopt($c_url, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($c_url, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($c_url, CURLOPT_URL,"https://api.imgur.com/3/reddit/t/".$tag);
	curl_setopt($c_url, CURLOPT_HTTPHEADER, array('Authorization: Client-ID ' . $imgur_client_id));
	$result=curl_exec($c_url);
	curl_close($c_url);
	$json_array = json_decode($result, true);
	return $json_array;
}

/**
Retorna os dados de uma determinada imagem
Essa função deve ser utilizada quando o tipo do item não for um album. Se for um album deve utilizar a função ret_array_album, pois ela retorna além das informações do album um array com as imagens
*/
function ret_array_imagem($imgur_id)
{
	global $imgur_client_id;

	$c_url = curl_init();
	curl_setopt($c_url, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($c_url, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($c_url, CURLOPT_URL,"https://api.imgur.com/3/image/".$imgur_id);
	curl_setopt($c_url, CURLOPT_HTTPHEADER, array('Authorization: Client-ID ' . $imgur_client_id));
	$result=curl_exec($c_url);
	curl_close($c_url);
	$json_array = json_decode($result, true);
	return $json_array;
}

/**
Retorna os dados de um determinado album
	essa função retorna um array com vários campos;
	nesses camos retornados, tem um que chama ['data'], esse campo é um array de imagens
*/
function ret_array_album($imgur_id)
{
	global $imgur_client_id;

	$c_url = curl_init();
	curl_setopt($c_url, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($c_url, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($c_url, CURLOPT_URL,"https://api.imgur.com/3/album/".$imgur_id);
	curl_setopt($c_url, CURLOPT_HTTPHEADER, array('Authorization: Client-ID ' . $imgur_client_id));
	$result=curl_exec($c_url);
	curl_close($c_url);
	$json_array = json_decode($result, true);
	return $json_array;
}

?>