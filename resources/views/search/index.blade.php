@extends('app')

@section('content')

	<article class="pa1 pa3-ns tc bb b--black-10">
		<h1 class="f3 fw4 pa4 mv0">Search</h1>
	</article>

	<article class="cf">
		<div class="fl w-100 w-50-ns tc">
			<article class="pa1 pa3-ns tc bb b--black-10">
				<h2 class="f3 fw4 pa4 mv0">Artists</h2>

				<section class="cf w-100 pa2-ns">
					@foreach ($artists->artists->items as $artist)
						<article class="fl w-100 w-50-m w-25-ns pa2-ns">
							<div class="aspect-ratio aspect-ratio--1x1">
								<a href="/artists/{{ $artist->id }}" class="dim">
									<img style="background-image:url({{ $artist->images[1]->url }});"
										 class="db bg-center cover aspect-ratio--object" />
								</a>
							</div>

							<a href="/artists/{{ $artist->id }}" class="ph2 ph0-ns pb3 link db dim">
								<h3 class="f5 f4-ns mb0 black-90">{{ $artist->name }}</h3>
								<h3 class="f6 f5 fw4 mt2 black-60">{{ number_format($artist->followers->total) }} followers</h3>
							</a>
						</article>

						@break($loop->iteration == 8)
					@endforeach
				</section>
			</article>
		</div>

		<div class="fl w-100 w-50-ns tc">
			<h1>Column Two</h1>
		</div>
	</article>


@endsection
