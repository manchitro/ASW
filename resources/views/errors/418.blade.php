@extends('errors::illustrated-layout')

@section('title', __('Teapot'))
@section('code', '418')
@section('message', __('I\'m a teapot'))
@section('extra')
    <iframe src="https://giphy.com/embed/l0EwYRXhyq1rpn4Gc" width="480" height="269" frameBorder="0" class="giphy-embed" allowFullScreen></iframe>
    <p><a href="https://giphy.com/gifs/tea-zoom-mug-l0EwYRXhyq1rpn4Gc"></a></p>
@endsection
