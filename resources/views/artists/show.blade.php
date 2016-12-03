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

		<section class="mw6 center mb4">
			@foreach ($topTracks->tracks as $track)
				<article class="dt w-100 bb b--black-05 pb2 mt2" href="#0">
					<div class="dtc w2 w3-ns v-mid">
						<a href="/albums/{{ $track->album->id }}">
							<img src="{{ $track->album->images[2]->url }}" alt="{{ $track->album->name }}" class="ba b--black-10 db br2 w2 w3-ns h2 h3-ns dim"/>
						</a>
					</div>

					<div class="dtc v-mid pl3">
						<h1 class="f6 f5-ns fw6 lh-title black mv0 tl">
							<a href="/tracks/{{ $track->id }}" class="dib link dark-gray dim">
								{{ str_limit($track->name, 32, '...') }}
							</a>
						</h1>

						<h2 class="f6 fw4 mt0 mb0 black-60 tl silver">
							@foreach ($track->artists as $trackArtist)
								<a href="/artists/{{ $trackArtist->id }}" class="dib link silver dim">
									{{ $trackArtist->name }}
								</a>{{ $loop->last ? '' : ',' }}

								@if ($loop->iteration == 2 && $loop->count > 2)
									and more...
								@endif

								@break($loop->iteration == 2)
							@endforeach
						</h2>
					</div>

					<div class="dtc v-mid">
						<div class="w-100 tr">
							<span class="f6 light-silver mr1">{{ gmdate('i:s', $track->duration_ms / 1000) }}</span>

							<button class="f6 button-reset bg-white ba b--black-10 dim pointer pv1 black-60">
								<i class="fa fa-fw fa-play" aria-hidden="true"></i>

								Preview
							</button>
						</div>
					</div>
				</article>
			@endforeach
		</section>
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
