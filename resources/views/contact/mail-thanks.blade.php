@extends('layouts.mail')

@section('content')
  <div class="wrapper">
    <h1 class="title">문의내용을 접수하였습니다.</h1>

    <div class="message">
      <p>{{ $name }}선생님, 안녕하십니까?</p>
      <p>문의내용을 정확히 접수하였습니다.</p>
      <p>가능한 한 빨리 답변을 드리겠으니 조금만 기다려주십시오.</p>
      <p>※만일 며칠이 지나도 련락이 오지 않은 경우에는 죄송합니다만 다시 문의하여주십시오.</p>
    </div>

    <h2 class="sub-title">
      <span>문의하신 내용</span>
    </h2>

    <table>
      <tr>
        <th>성함</th>
        <td>{{ $name }}</td>
      </tr>
      <tr>
        <th>접수시일</th>
        <td>{{ $date }}</td>
      </tr>
      <tr>
        <th>메일주소</th>
        <td>{{ $email }}</td>
      </tr>
      <tr>
        <th>문의내용</th>
        <td>{!! nl2br($body) !!}</td>
      </tr>
    </table>
  </div>

@endsection
