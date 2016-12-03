<?php

namespace App\Spotify;

use GuzzleHttp\Client;

class SpotifyClient
{
	public function __construct(Client $client)
	{
		$this->client = $client;
	}

	private function request($endpoint)
	{
		return json_decode($this->client->get($endpoint)->getBody());
	}

	public function getAlbumsByArtistId($id, $country)
	{
		return $this->request('artists/' . $id . '/albums?market=' . $country);
	}

	public function getArtistById($id)
	{
		return $this->request('artists/' . $id);
	}

	public function getRelatedArtistsByArtistId($id)
	{
		return $this->request('artists/' . $id . '/related-artists');
	}

	public function getTopTracksByArtistId($id, $country)
	{
		return $this->request('artists/'. $id . '/top-tracks?country=' . $country);
	}
}