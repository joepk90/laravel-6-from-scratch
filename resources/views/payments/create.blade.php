@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST" action="/payments">

      @csrf 

        <button class="btn btn-primary" type="submit" formmethod="POST">Make Payment</button>
        
        @if(session('message'))
            <div class="text-green-500 text-xs mt-2">{{session('message')}}</div>
            <a href="/notifications">See notifications</a>
        @endif

    </form>
</div>    
@endsection