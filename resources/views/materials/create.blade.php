@extends('layouts.editor')

@section('title', '얼 -- 資料投稿画面')

@section('content')
  <div id="one-column" style="width: 80%">
    <h1 class="page-title">資料室の投稿フォーム</h1>

    <div class="mb-3">
      <a href="{{ route('materials.list') }}" class="btn btn-success">一覧画面へ</a>
      <a href="{{ route('materials.index')}}" class="btn btn-secondary">資料室へ</a>
    </div>

    @include('commons.error')

    <form action="{{ route('materials.store') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="input-group mb-4">
        <select name="category_key" class="form-select me-3">
          @foreach ($categories as $key => $category)
            <option value="{{ $key }}" @if(old('category_key') == $key) selected @endif>{{ $category }}</option>
          @endforeach
        </select>

        <select name="type_key" class="form-select me-3">
          @foreach ($types as $key => $type)
            <option value="{{ $key }}" @if(old('type_key') == $key) selected @endif>{{ $type }}</option>
          @endforeach
        </select>

        <select name="status" class="form-select">
          <option value="0" @if(old('status') == 0) selected @endif>非公開</option>
          <option value="1" @if(old('status') == 1) selected @endif>公開</option>
        </select>
      </div>

      <div class="input-group mb-4">
        <input type="file" name="file" class="form-control" accept="audio/mpeg, video/mp4, application/pdf, .doc, .docx, .xml,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document, .xls, .xlsx, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, .ppt, .pptx">
      </div>

      <div class="input-group mb-4">
        <input type="text" name="title" class="form-control" value="{{ old('title') }}">
      </div>

      <div class="input-group mb-4">
        <textarea name="description" rows="5" class="form-control">{{ old('description') }}</textarea>
      </div>

      <input type="submit" class="btn btn-primary" value="資料登録">
    </form>
  </div>
@endsection
