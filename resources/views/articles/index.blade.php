@extends ('layout');

@section ('content')

<div id="wrapper">
	<div id="page" class="container">
		
            @forelse ($articles as $article)
				<div class="content">

					<div class="title">
						<h2>

							<!-- Usign Named Route -->
							<!-- optionally you be explicit and use $article->id -->
							<!-- however by default laravel will know to fetch the correct key name -->
							<a href="{{ $article->path() }}">
								{{$article->title}}
							</a>
						</h2>
					</div>

					<p><img src="/images/banner.jpg" alt="" class="image image-full" /> </p>
			
					<p>{{$article->excerpt}}</p>

				</div>

			@empty
			<p>No relevent articles</p>
			@endforelse

	</div>
</div>

@endsection