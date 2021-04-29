@extends('layouts.editor')

@section('content')
  {{ $article->title }}

  @foreach ($article->subContents as $item)
    {{ $item->title }}
  @endforeach
@endsection
