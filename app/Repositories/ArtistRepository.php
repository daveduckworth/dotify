<?php

namespace App\Repositories;

use App\Spotify\SpotifyClient;

class ArtistRepository
{
	public function __construct(SpotifyClient $spotify)
	{
		$this->spotify = $spotify;
	}

	public function getById($id)
	{
		return $this->spotify->getArtistById($id);
	}

	public function getAlbums($artistId, $country = 'GB')
	{
		return $this->spotify->getAlbumsByArtistId($artistId, $country);
	}

	public function getTopTracks($artistId, $country = 'GB')
	{
		return $this->spotify->getTopTracksByArtistId($artistId, $country);
	}

	public function getRelatedArtists($artistId)
	{
		return $this->spotify->getRelatedArtistsByArtistId($artistId);
	}
}
