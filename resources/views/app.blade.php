<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dotify</title>

		<link rel="stylesheet" href="https://unpkg.com/tachyons/css/tachyons.min.css">

        <script src="https://use.fontawesome.com/421e5f521f.js"></script>
    </head>
    <body class="w-100 sans-serif bg-white">
        <main>
            <nav class="pa3 pa4-ns bb b--black-10">
                <a class="link dim black b f6 f5-ns dib mr3" href="/" title="Home">dotify</a>

                <a class="link dim gray f6 f5-ns dib mr3" href="#" title="Link">Link</a>
                <a class="link dim gray f6 f5-ns dib mr3" href="#" title="Link">Link</a>
                <a class="link dim gray f6 f5-ns dib mr3" href="#" title="Link">Link</a>
                <a class="link dim gray f6 f5-ns dib" href="#" title="Link">Link</a>
            </nav>

    	   @yield('content')
        </main>

        <footer class="pv4 ph3 ph5-m ph6-l mid-gray">
            <div class="tc">
                An experimental web application powered by

                <a href="https://www.spotify.com" title="Spotify" class="f6 dib link mid-gray dim">
                    <i class="fa fa-fw fa-spotify" aria-hidden="true"></i>
                    Spotify
                </a>
            </div>

            <small class="f6 db tc mt3">
                Have a question or feedback? Let me know on

                <a href="https://www.twitter.com/dave_duckworth" class="f6 dib link mid-gray dim">
                    Twitter
                </a>.
            </small>
        </footer>
    </body>
</html>
