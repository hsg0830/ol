@extends('layouts.editor')

@section('title', '얼 -우리 말 배움터- 学習課題進捗確認画面')

@section('content')
  <main id="main" class="container">
    <h1 class="page-title">학습과제편집</h1>

    {{-- 年・月・機関選択 --}}
    <form action="{{ route('tasks.edit') }}">
      @csrf

      <div class="input-group mb-4">
        <!-- 年 -->
        <select name="year" class="form-select">
          @for ($i = 2021; $i <= date('Y'); $i++)
            <option value="{{ $i }}" @if($year == $i) selected  @endif>{{ $i }}</option>
          @endfor
        </select>년&nbsp;&nbsp;

        <!-- 月 -->
        <select name="month" class="form-select">
          @for ($i = 1; $i <= 12; $i++)
            <option value="{{ $i }}" @if($month == $i) selected  @endif>{{ $i }}</option>
          @endfor
        </select>월&nbsp;&nbsp;

        <input type="submit" class="btn btn-primary ms-2" value="編集画面">
      </div>
    </form>

    <h1 class="page-title">학습과제수행정형</h1>

    {{-- 年・月・機関選択 --}}
    <form action="{{ route('tasks.progress') }}">
      @csrf

      <div class="input-group mb-4">
        <!-- 年 -->
        <select name="year" class="form-select">
          @for ($i = 2021; $i <= date('Y'); $i++)
            <option value="{{ $i }}" @if($year == $i) selected  @endif>{{ $i }}</option>
          @endfor
        </select>년&nbsp;&nbsp;

        <!-- 月 -->
        <select name="month" class="form-select">
          @for ($i = 1; $i <= 12; $i++)
            <option value="{{ $i }}" @if($month == $i) selected  @endif>{{ $i }}</option>
          @endfor
        </select>월&nbsp;&nbsp;

        {{-- 機関 --}}
        <select name="school_id" class="form-select">
          <option value="all">전체 기관</option>
          @foreach ($schools as $school)
            <option value="{{ $school->id }}" @if($school_id == $school->id) selected  @endif>{{ $school->name }}</option>
          @endforeach
        </select>

        <input type="submit" class="btn btn-primary ms-2" value="検索">
      </div>
    </form>

    @if (count($tasks) > 0)
      @if (count($users) > 0)
        <table class="table table-striped">
          <tr style="background-color: silver">
            <th class="col-2"></th>
            @foreach ($tasks as $task)
              <th class="text-center">
                @if ($task->category_id == 1)
                  {{ $task->article->title }}
                @elseif ($task->category_id == 2)
                  {{ $task->ask->title }}
                @elseif ($task->category_id == 3)
                  {{ $task->material->title }}
                @endif
              </th>
            @endforeach
          </tr>

          <tr style="background-color: yellow; font-weight: bold;">
            <th>완료자</th>
            @foreach ($tasks as $task)
            <td  class="text-center">
              {{ $task->count_cleared_users($school_id) }}
            </td>
            @endforeach
          </tr>

          @foreach ($users as $user)
            <tr>
              <th>{{ $user->name }}</th>
              @for ($i = 0; $i < count($tasks); $i++)
                <td class="text-center">
                  @if ($user->is_cleared_task($tasks[$i]->id))
                    ●
                  @else
                    ×
                  @endif
                </td>
              @endfor
            </tr>
          @endforeach
        </table>
      @endif
    @else
      <p>학습과제가 없습니다.</p>
    @endif

  </main>
@endsection
