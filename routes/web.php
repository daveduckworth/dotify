<?php

$router->get('/artists/{id}', 'ArtistController@show');

$router->get('/artists/{id}/albums', function ($id) {
	//
});

$router->get('/artists/{id}/top-tracks', function ($id) {
	//
});

$router->get('/artists/{id}/related-artists', function ($id) {
	//
});
