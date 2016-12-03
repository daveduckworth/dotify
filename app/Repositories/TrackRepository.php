<?php

namespace App\Repositories;

use App\Spotify\SpotifyClient;

class TrackRepository
{
	public function __construct(SpotifyClient $spotify)
	{
		$this->spotify = $spotify;
	}

	public function getById($id)
	{
		return $this->spotify->getTrackById($id);
	}

}