@extends('layouts.mail')

@section('content')
  <div class="wrapper">
    <h1 class="title">문의내용을 접수하였습니다.</h1>

    <div class="message">
      <p>{{ $name }}선생님, 안녕하십니까?</p>
      <p>문의하신 내용에 대한 답변을 싸이트에 반영하였습니다.</p>
    </div>

    <h2 class="sub-title">
      <span>문의하신 내용에 대한 답변</span>
    </h2>

    <div class="message">
      <a href="{{ $url }}">{{ $url }}</a>
    </div>
  </div>

@endsection
