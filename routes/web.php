<?php

$router->get('/albums/{id}', 'AlbumController@show');

$router->get('/artists/{id}', 'ArtistController@show');

$router->get('/search/create', 'SearchController@create');
$router->get('/search', 'SearchController@index');

$router->get('/tracks/{id}', 'TrackController@show');
