@extends('app')

@section('content')

	<header class="tc pv4 pv5-ns bb b--black-10">
		<img src="{{ $artist->images[1]->url }}" class="br-100 pa1 ba b--black-10 h4 w4 h5-ns w5-ns" alt="{{ $artist->name }} Image">
		<h1 class="f3 f2-ns fw4 mid-gray">{{ $artist->name }}</h1>
		<h2 class="f6 gray fw2 ttu tracked">{{ $artist->genres[0] }} artist</h2>

		<a class="f6 link dim br1 ba ph3 pv2 mb2 mt4 mr4 dib dark-green" href="{{ $artist->uri }}">
			<i class="fa fa-fw fa-spotify" aria-hidden="true"></i>
			Play in Spotify
		</a>

		<a class="f6 link dim br1 ba ph3 pv2 mb2 mt4 dib mid-gray" href="{{ $artist->external_urls->spotify }}">
			<i class="fa fa-fw fa-globe" aria-hidden="true"></i>
			Web Link
		</a>
	</header>

	<article class="pa3 pa5-ns tc bb b--black-10">
		<dl class="dib mr5">
			<dd class="f6 f5-ns b ml0 mb2">Followers</dd>
			<dd class="f3 f2-ns b ml0">{{ number_format($artist->followers->total) }}</dd>
		</dl>

		<dl class="dib">
			<dd class="f6 f5-ns b ml0 mb2">Popularity</dd>
			<dd class="f3 f2-ns b ml0">{{ $artist->popularity }}&#37;</dd>
		</dl>
	</article>

	<article class="pa1 pa3-ns tc bb b--black-10">
		<ul class="list ph3 ph5-ns pv4">
			@foreach ($artist->genres as $genre)
				<li class="dib mr1 mb2">
					<a href="#" class="f6 f5-ns b db pa2 link dim dark-gray ba b--black-20">
						{{ $genre }}
					</a>
				</li>
			@endforeach
		</ul>
	</article>

	<article class="pa1 pa3-ns tc bb b--black-10">
		<h2 class="f3 fw4 pa4 mv0">Albums</h2>

		<div class="cf pa2">
			@foreach ($albums->items as $album)
				<div class="fl w-50 w-25-m w-20-l pa2">
					<a href="/albums/{{ $album->id }}" class="db link dim tc">
						<img src="{{ $album->images[1]->url }}" alt="{{ $album->name }}" alt="{{ $album->name }} Album Cover"
							 class="w-100 db outline black-10"/>

						<dl class="mt2 f6 lh-copy">
							<dt class="clip">Title</dt>
							<dd class="ml0 black truncate w-100">{{ $album->name }}</dd>
							<dt class="clip">Type</dt>
							<dd class="ml0 gray truncate w-100">{{ ucfirst($album->album_type) }}</dd>
						</dl>
					</a>
				</div>

				@break($loop->iteration == 10)
			@endforeach
		</div>
	</article>

	<article class="pa1 pa3-ns tc bb b--black-10">
		<h2 class="f3 fw4 pa4 mv0">Top Tracks</h2>

		<table class="collapse ba br2 b--black-10 pv2 ph3 w-100">
			<tbody>
				<tr class="striped--near-white">
					<th class="pv2 ph3 tl f6 fw6 ttu">&#35;</th>
					<th class="pv2 ph3 tl f6 fw6 ttu">Track Name</th>
					<th class="pv2 ph3 tl f6 fw6 ttu">Artist</th>
					<th class="pv2 ph3 tl f6 fw6 ttu">Album</th>
					<th class="pv2 ph3 tl f6 fw6 ttu">Duration</th>
					<th class="pv2 ph3 tl f6 fw6 ttu">Popularity</th>
				</tr>

				@foreach ($topTracks->tracks as $track)
					<tr class="striped--near-white">
						<td class="pv2 ph3 tl">{{ $loop->iteration }}</td>

						<td class="pv2 ph3 tl">
							<a href="/tracks/{{ $track->id }}" class="dib link dark-gray dim">
								{{ $track->name }}
							</a>
						</td>

						<td class="pv2 ph3 tl">
							@foreach ($track->artists as $trackArtist)
								<a href="/artists/{{ $trackArtist->id }}" class="dib link dark-gray dim">
									{{ $trackArtist->name }}
								</a>{{ $loop->last ? '' : ',' }}
							@endforeach
						</td>

						<td class="pv2 ph3 tl">
							<a href="/albums/{{ $track->album->id }}" class="dib link dark-gray dim">
								{{ $track->album->name }}
							</a>
						</td>

						<td class="pv2 ph3 tl">{{ $track->duration_ms }} ms</td>
						<td class="pv2 ph3 tl">{{ $track->popularity }}&#37;</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</article>

	<article class="pa1 pa3-ns tc bb b--black-10">
		<h2 class="f3 fw4 pa4 mv0">Related Artists</h2>

		<section class="cf w-100 pa2-ns">
			@foreach ($relatedArtists->artists as $relatedArtist)
				<article class="fl w-100 w-50-m w-25-ns pa2-ns">
					<div class="aspect-ratio aspect-ratio--1x1">
						<a href="/artists/{{ $relatedArtist->id }}" class="dim">
							<img style="background-image:url({{ $relatedArtist->images[0]->url }});"
								 class="db bg-center cover aspect-ratio--object" />
						</a>
					</div>

					<a href="/artists/{{ $relatedArtist->id }}" class="ph2 ph0-ns pb3 link db dim">
						<h3 class="f5 f4-ns mb0 black-90">{{ $relatedArtist->name }}</h3>
						<h3 class="f6 f5 fw4 mt2 black-60">{{ $relatedArtist->popularity }}&#37; popularity</h3>
					</a>
				</article>

				@break($loop->iteration == 4)
			@endforeach
		</section>
	</article>
@endsection
