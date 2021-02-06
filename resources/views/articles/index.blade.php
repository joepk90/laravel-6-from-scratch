@extends ('layout');

@section ('content')

<div id="wrapper">
	<div id="page" class="container">
		
            @foreach ($articles as $article)
				<div class="content">

					<div class="title">
						<h2>

							<!-- Usign Named Route -->
							<!-- optionally you be explicit and use $article->id -->
							<!-- however by default laravel will know to fetch the correct key name -->
							<a href="{{ route('articles.show', $article) }}">
								{{$article->title}}
							</a>
						</h2>
					</div>

					<p><img src="/images/banner.jpg" alt="" class="image image-full" /> </p>
			
					<p>{{$article->excerpt}}</p>

				</div>
			@endforeach

	</div>
</div>

@endsection