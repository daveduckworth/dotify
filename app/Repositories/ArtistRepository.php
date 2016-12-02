<?php

namespace App\Repositories;

use GuzzleHttp\Client;

class ArtistRepository
{
	public function __construct(Client $spotify)
	{
		$this->spotify = $spotify;
	}

	public function getById($id) {
		return $this->spotify->get('artists/' . $id);
	}

	public function getAlbums($artistId)
	{
		return $this->spotify->get('artists/' . $artistId . '/albums');
	}

	public function getTopTracks($artistId, $country = 'GB')
	{
		return $this->spotify->get('artists/' . $artistId . '/top-tracks?country=' . $country);
	}

	public function getRelatedArtists($artistId)
	{
		return $this->spotify->get('artists/' . $artistId . '/related-artists');
	}
}
