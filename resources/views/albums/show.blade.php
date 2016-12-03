@extends('app')

@section('content')

	<header class="tc pv4 pv5-ns bb b--black-10">
		<img src="{{ $album->images[1]->url }}" class="br-100 pa1 ba b--black-10 h4 w4 h5-ns w5-ns" alt="{{ $album->name }} Image">
		<h1 class="f3 f2-ns fw4 mid-gray">{{ $album->name }}</h1>
		<h2 class="f6 gray fw2 ttu tracked">{{ $album->artists[0]->name }}</h2>

		<a class="f6 link dim br1 ba ph3 pv2 mb2 mt4 mr4 dib dark-green" href="{{ $album->uri }}">
			<i class="fa fa-fw fa-spotify" aria-hidden="true"></i>
			Play in Spotify
		</a>

		<a class="f6 link dim br1 ba ph3 pv2 mb2 mt4 dib mid-gray" href="{{ $album->external_urls->spotify }}">
			<i class="fa fa-fw fa-globe" aria-hidden="true"></i>
			Web Link
		</a>
	</header>

	<article class="pa3 pa5-ns tc bb b--black-10">
		<dl class="dib mr5">
			<dd class="f6 f5-ns b ml0 mb2">Release Date</dd>

			<dd class="f3 f2-ns b ml0">
				{{ \Carbon\Carbon::createFromFormat('Y-m-d', $album->release_date)->format('d/m/Y') }}
			</dd>
		</dl>

		<dl class="dib">
			<dd class="f6 f5-ns b ml0 mb2">Popularity</dd>
			<dd class="f3 f2-ns b ml0">{{ $album->popularity }}&#37;</dd>
		</dl>
	</article>

	<article class="pa1 pa3-ns tc bb b--black-10">
		<h2 class="f3 fw4 pa4 mv0">Tracks</h2>

		<section class="mw8 center mb4">
			@foreach ($album->tracks->items as $track)
				<article class="dt w-100 bb b--black-05 pb2 mt2" href="#0">
					<div class="dtc w2 w3-ns v-mid">
						<a href="/albums/{{ $album->id }}">
							<img src="{{ $album->images[2]->url }}" alt="{{ $album->name }}" class="ba b--black-10 db br2 w2 w3-ns h2 h3-ns dim"/>
						</a>
					</div>

					<div class="dtc v-mid pl3">
						<h1 class="f6 f5-ns fw6 lh-title black mv0 tl">
							<a href="/tracks/{{ $track->id }}" class="dib link dim dark-gray">
								{{ $track->track_number }}. {{ $track->name }}

								@if ($track->explicit)
									<i class="fa fa-fw fa-exclamation-triangle dark-red" aria-hidden="true"></i>
								@endif
							</a>
						</h1>

						<h2 class="f6 fw4 mt0 mb0 black-60 tl silver">
							@foreach ($track->artists as $trackArtist)
								<a href="/artists/{{ $trackArtist->id }}" class="dib link silver dim">
									{{ $trackArtist->name }}
								</a>{{ $loop->last ? '' : ',' }}

								@if ($loop->iteration == 2 && $loop->count > 2)
									<span class="dn di-ns">and more</span>...
								@endif

								@break($loop->iteration == 2)
							@endforeach
						</h2>
					</div>

					<div class="dtc v-mid">
						<div class="w-100 tr">
							<button class="f6 button-reset bg-white ba b--black-10 dim pointer pv1 black-60 dib">
								<i class="fa fa-fw fa-play" aria-hidden="true"></i>

								Preview
							</button>
						</div>
					</div>
				</article>
			@endforeach
		</section>
	</article>

	<article class="pa2 pa4-ns tc bb b--black-10">
		<p class="f4 lh-copy">
			{{ $album->label }}
		</p>

		@foreach ($album->copyrights as $copyright)
			<p class="f6 lh-copy mid-gray">{{ $copyright->text }}</p>
		@endforeach
	</article>

	@endsection
