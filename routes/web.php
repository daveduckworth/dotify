<?php

$router->get('/albums/{id}', 'AlbumController@show');

$router->get('/artists/{id}', 'ArtistController@show');
