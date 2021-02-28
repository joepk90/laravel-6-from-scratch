@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in! {{Auth::user()->name}}

                    <br>
                    <a href="/payments/create">Create a payment</a> (example notification)

                </div>
                <div class="card-body">

                    <h3>Roles and Abilities</h3>

                    If you have been assigned a role with privaliges, your options will be displayed below
                    <hr>
                    @can('edit_forum')
                        <a href="">Edit Forum</a>
                    @endcan

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
