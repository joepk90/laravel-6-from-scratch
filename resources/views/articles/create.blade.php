@extends('layout');

@section('head')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">    
@endsection

@section('content')

<div id="wrapper">
    <div id="page" class="container">

        <h1 class="heading has-text-weight-bold is-size-4">New Article</h1>

        <form method="POST" action="/articles">

            @csrf <!-- cross site request forgery-->

            <div class="field">

                <label class="label" for="title">Title</label>
               
                <div class="control">
                    <input 
                        class="input @error('title') is-danger @enderror"
                        type="text"
                        name="title"
                        id="title"
                        value="{{ @old('title') }}"
                    >
                    
                    @error('title')
                        <p class="help is-danger">{{$errors->first('title')}}</p>
                    @enderror

                </div>

            </div>

            <div class="field">
                
                <label class="label" for="excerpt">Excerpt</label>
               
                <div class="control">
                    <textarea
                        class="textarea @error('title') is-danger @enderror"
                        name="excerpt"
                        id="excerpt"
                    >{{ @old('excerpt') }}</textarea>

                    @error('excerpt')
                        <p class="help is-danger">{{$errors->first('excerpt')}}</p>
                    @enderror

                </div>

            </div>

            <div class="field">
                
                <label class="label" for="body">Body</label>
               
                <div class="control">
                    <textarea
                        class="textarea @error('title') is-danger @enderror"
                        name="body"
                        id="body"
                    >{{ @old('body') }}</textarea>

                    @error('body')
                        <p class="help is-danger">{{$errors->first('body')}}</p>
                    @enderror

                </div>

            </div>

            <div class="field">
                
                <label class="label" for="tags">Tags</label>
               
                <div class="select is-multiple control">
                    <select
                        class="@error('tags') is-danger @enderror"
                        name="tags[]"
                        id="tags"
                        multiple
                    >
                    @foreach ($tags as $tags)
                        <option value="{{$tags->id}}">{{$tags->name}}</option>
                    @endforeach
                </select>

                    @error('tags')

                        <!-- shorthand alternative to $errors->first('tags') = $message -->
                        <!--  -->
                        <p class="help is-danger">{{$errors->first('tags')}}</p>
                    @enderror

                </div>

            </div>

            <div class="field is-grouped">

                <div class="control">
                    <button class="button is-link" type="submit">Submit</button>
                </div>
                
            </div>

        </form>

    </div>
</div>

@endsection