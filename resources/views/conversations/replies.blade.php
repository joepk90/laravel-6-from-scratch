@foreach ($conversation->replies as $reply)
    <div>
        <p class="m-0"><strong>{{$reply->user->name}} said...</strong></p>

        {{$reply->body}}


        @can('update-conversation', $conversation)
            <form method="GET" action="/best-reply/{{$reply->id}}">
                <button type="submit" class="btn p-0 text-muted" >Best Reply</button>
            </form>
        @endcan

    </div>

    @continue($loop->last)
    <hr>
@endforeach 