<?php

namespace App\Repositories;

use App\Spotify\SpotifyClient;

class AlbumRepository
{
	public function __construct(SpotifyClient $spotify)
	{
		$this->spotify = $spotify;
	}

	public function getById($id)
	{
		return $this->spotify->getAlbumById($id);
	}

}