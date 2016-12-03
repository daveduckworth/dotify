@extends('app')

@section('content')

	<header class="tc pv4 pv5-ns bb b--black-10">
		<img src="{{ $track->album->images[1]->url }}" class="br-100 pa1 ba b--black-10 h4 w4 h5-ns w5-ns" alt="{{ $track->album->name }} Album Cover">

		<h1 class="f3 f2-ns fw4 mid-gray">
			{{ $track->track_number }}.
			{{ $track->name }}

			@if ($track->explicit)
				<i class="fa fa-fw fa-exclamation-triangle dark-red" aria-hidden="true"></i>
			@endif
		</h1>

		<h2 class="f6 fw2 ttu tracked">
			@foreach ($track->artists as $artist)
				<a href="/artists/{{ $artist->id }}" class="link dim gray">
						{{ $artist->name }}{{ $loop->last ? '' : ',' }}
				</a>
			@endforeach
		</h2>

		<h2 class="f6 gray fw2 ttu tracked">
			<a href="/albums/{{ $track->album->id }}" class="link dim gray">
				{{ $track->album->name }}
			</a>
		</h2>

		<a class="f6 link dim br1 ba ph3 pv2 mb2 mt4 mr4 dib dark-green" href="{{ $track->uri }}">
			<i class="fa fa-fw fa-spotify" aria-hidden="true"></i>
			Play in Spotify
		</a>

		<a class="f6 link dim br1 ba ph3 pv2 mb2 mt4 dib mid-gray" href="{{ $track->external_urls->spotify }}">
			<i class="fa fa-fw fa-globe" aria-hidden="true"></i>
			Web Link
		</a>
	</header>

	<article class="pa3 pa5-ns tc bb b--black-10">
		<dl class="dib mr5">
			<dd class="f6 f5-ns b ml0 mb2">Duration</dd>

			<dd class="f3 f2-ns b ml0">
				{{ gmdate('i:s', $track->duration_ms / 1000)}}
			</dd>
		</dl>

		<dl class="dib">
			<dd class="f6 f5-ns b ml0 mb2">Popularity</dd>
			<dd class="f3 f2-ns b ml0">{{ $track->popularity }}&#37;</dd>
		</dl>
	</article>

@endsection
