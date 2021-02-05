@extends ('layout');

@section ('content')

<div id="wrapper">
	<div id="page" class="container">
		<div id="content">
            @foreach ($articles as $article)
				<li class="first">
				
					<a href="/articles/{{$article->id}}">
						<h3>{{$article->title}}</h3>
					</a>

					<p>{{$article->excerpt}}</p>
				</li>
			@endforeach
		</div>
	
	</div>
</div>

@endsection