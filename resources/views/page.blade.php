@extends('base')
@section('content')
<div class="container">
	<h2>{{ $page->title }}</h2>
	{!! $page->body !!}



</div>
@endsection