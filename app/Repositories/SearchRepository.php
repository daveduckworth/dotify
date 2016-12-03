<?php

namespace App\Repositories;

use App\Spotify\SpotifyClient;

class SearchRepository
{
	public function __construct(SpotifyClient $spotify)
	{
		$this->spotify = $spotify;
	}

	public function artists($query)
	{
		return $this->spotify->searchArtists($query);
	}

}