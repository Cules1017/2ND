@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/p/{{ $post->id }}" enctype="multipart/form-data"  method="post">
        @csrf
        @method('PATCH')

        <div class="row">
            <div class="col-8 offset-2">

                <div class="row">
                    <h1>Edit Post</h1>
                </div>
               
                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label">title</label>

                    <input id="title"
                           type="text"
                           class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                           name="title"
                           value="{{ old('title') ?? $post->title }}"
                           autocomplete="title" autofocus>

                    @if ($errors->has('title'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group row">
                        <label for="desciption" class="col-md-4 col-form-label">Desciption</label>
                        
                        <textarea id="description"
                        rows="9" cols="80"
                           class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                           name="description"
                           autocomplete="description" autofocus
                           id="description"  
                           >{{ old('description') ?? $post->description }}</textarea>


                    @if ($errors->has('description'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="row pt-4">
                    <button class="btn btn-primary">Save Post</button>
                </div>

            </div>
        </div>
    </form>
</div>
@endsection
