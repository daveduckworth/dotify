@extends('app')

@section('content')

	<article class="pa1 pa3-ns tc bb b--black-10">
		<h1 class="f3 fw4 pa4 mv0">Search</h1>

		<form action="/search" method="GET" class="measure center">
			<fieldset id="sign_up" class="ba b--transparent ph0 mh0">
				<div class="mb4">
					<label class="dn fw6 lh-copy f6" for="email-address">Parameters</label>

					<input class="pa2 input-reset ba bg-transparent hover-bg-black hover-white w-100" type="text" name="query" id="query" value="{{ old('query') }}">
				</div>
			</fieldset> 

			<div class="mb4">
				<input class="b ph3 pv2 input-reset ba b--black bg-transparent grow pointer f6 dib" type="submit" value="Search">
			</div>
		</form>
	</article>

@endsection
