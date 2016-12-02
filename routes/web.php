<?php

$router->get('/albums/{id}', function ($id) {
	$spotify = new \GuzzleHttp\Client();

	return $spotify->get('https://api.spotify.com/v1/artists/' . $id);
});

$router->get('/artists/{id}', function ($id) {
	$spotify = new \GuzzleHttp\Client();

	return $spotify->get('https://api.spotify.com/v1/artists/' . $id);
});

$router->get('/artists/{id}/albums', function ($id) {
	$spotify = new \GuzzleHttp\Client();

	return $spotify->get('https://api.spotify.com/v1/artists/' . $id . '/albums');
});

$router->get('/artists/{id}/top-tracks', function ($id) {
	$spotify = new \GuzzleHttp\Client();

	return $spotify->get('https://api.spotify.com/v1/artists/' . $id . '/top-tracks?country=GB');
});

$router->get('/artists/{id}/related-artists', function ($id) {
	$spotify = new \GuzzleHttp\Client();

	return $spotify->get('https://api.spotify.com/v1/artists/' . $id . '/related-artists');
});
