<?php

namespace App\Repositories;

use App\Spotify\SpotifyClient;

class SearchRepository
{
	public function __construct(SpotifyClient $spotify)
	{
		$this->spotify = $spotify;
	}

	public function albums($query)
	{
		return $this->spotify->searchAlbums($query);
	}

	public function artists($query)
	{
		return $this->spotify->searchArtists($query);
	}

}