@extends('layouts.editor')

@section('title', '얼 -우리 말 배움터- 会員管理画面')

@section('content')
  <main id="main" class="container">
    <h1 class="page-title">회원관리 (소속기관별통계)</h1>

    <div>
      <a href="{{ route('users.management') }}">● 会員管理画面へ</a>
    </div>

    <table class="table table-striped" style="width: 60%; margin: 0 auto;">
      <thead>
        <tr class="text-center">
          <th scope="col">ID</th>
          <th scope="col">소속기관</th>
          <th scope="col">등록자수</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($schools as $school)
        <tr class="text-center">
          <td>{{ $school->id }}</td>
          <td>{{ $school->name }}</td>
          <td>{{ count($school->users) }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </main>
@endsection
