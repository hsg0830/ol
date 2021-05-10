@extends('layouts.mail')

@section('content')
  <div class="wrapper">
    <h1 class="title">문의하신 내용에 대하여 답변드리겠습니다.</h1>

    <div class="message">
      <p>{{ $name }}선생님, 안녕하십니까?</p>
      <p>문의하신 내용에 대한 답변을 보내드리겠습니다.</p>
      <p>※다시 물어보실 내용이 있는 경우에는 죄송합니다만 다시 문의하여주십시오.</p>
    </div>

    <h2 class="sub-title">
      <span>문의하신 내용</span>
    </h2>

    <div class="message">{!! nl2br($description) !!}</div>

    <h2 class="sub-title">
      <span>문의하신 내용에 대한 답변</span>
    </h2>

    <div class="message">{!! nl2br($reply) !!}</div>
  </div>

@endsection
