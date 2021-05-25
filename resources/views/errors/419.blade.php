@extends('layouts.app')

@section('content')
<main id="one-column">

  <div class="message block">
    <h1 class="category-title"><i class="fas fa-exclamation-triangle"></i> 페지조작을 위한 유효기간이 지났습니다.</h1>
    <p><a href="{{ url('/') }}" class="text-underline">첫페지에로</a></p>
  </div>

</main>
@endsection
