@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/feedback" enctype="multipart/form-data" method="post">
        @csrf

        <div class="row">
            <div class="col-8 offset-2">

                <div class="row">
                    <h2>Feedback</h2>

                    <div class="form-group row">
                        <label for="desciption" class="col-md-4 col-form-label">Desciption</label>
                        
                        <textarea id="description"
                          rows="9" cols="80"
                           class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                           name="description"
                           autocomplete="description" autofocus
                           id="description" 

                           >{{ old('description') }}</textarea>


                    @if ($errors->has('description'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>
                
              <!--  <div class="row">
                    <label for="image" class="col-md-4 col-form-label">Post Image</label>

                    <input type="file" class="form-control-file" id="image" name="image">

                    @if ($errors->has('image'))
                        <strong>{{ $errors->first('image') }}</strong>
                    @endif
                </div>
 ...-->
                <div class="row pt-4">
                    <button class="btn btn-primary">Sent feetback</button>
                </div>
               
            </div>
        </div>
    </form>
</div>
@endsection
