@extends('layouts.base')
        
@section('content')
    <h1>URL Shortener</h1>

    

    <form action="" method="post">
        {{ csrf_field() }}
        <input type="text" placeholder="enter your original URL here" name="url" value="{{ old('url') }}">
        {!! $errors->first('url', '<p class="error-msg">:message</p>') !!}
        
    </form>

@endsection


    