@extends('layout')

@section('content')

<div id="wrapper">
	<div id="page" class="container">
		<div id="content">
            <h3>Add a post</h3>
            <form method="POST" action="/posts">
                @csrf
                <div>
                    <label for="title">Title *</label>
                    <input type="text" 
                        class="form-control {{ $errors->has('title') ? 'is-danger' : ''}}" 
                        id="title"
                        name="title"
                        value="{{ old('title') }}">
                    @error('title')    
                        <p class="help is-danger">{{ $errors->first('title') }}</p>
                    @enderror
                </div>
                <div>
                    <label for="body">Body *</label>
                    <textarea type="textarea" 
                            class="form-control {{ $errors->has('body') ? 'is-danger' : ''}}" 
                            id="body"
                            name="body">{{ old('body') }}
                    </textarea>
                    @error('body')    
                        <p class="help is-danger">{{ $errors->first('body') }}</p>
                    @enderror
                </div>

                <div>
                    <input type="submit" value="Post">
                </div>

            </form>
        </div>
    </div><!-- END-->
</div>
    
@endsection