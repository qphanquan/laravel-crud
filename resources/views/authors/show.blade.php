@extends('layouts.main')

@section('title', 'Create Author')

@section('main')
<h1>{{ $author->name }}</h1>
<p>{{ $author->bio }}</p>
@endsection