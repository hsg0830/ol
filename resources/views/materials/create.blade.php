@extends('layouts.editor')

@section('title', '얼 -- 資料投稿画面')

@section('content')
  <div id="one-column" class="post-form">
    <h1 class="page-title">資料室の投稿フォーム</h1>

    <div class="mb-3">
      <a href="{{ route('materials.list') }}" class="btn btn-success">一覧画面へ</a>
      <a href="{{ route('materials.index')}}" class="btn btn-secondary">資料室へ</a>
    </div>

    <form action="{{ route('materials.store') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="input-group mb-4">
        <select name="category_key" class="form-select me-3">
          @foreach ($categories as $key => $category)
            <option value="{{ $key }}">{{ $category }}</option>
          @endforeach
        </select>

        <select name="type_key" class="form-select me-3">
          @foreach ($types as $key => $type)
            <option value="{{ $key }}">{{ $type }}</option>
          @endforeach
        </select>

        <select name="status" class="form-select">
          <option value="0">非公開</option>
          <option value="1">公開</option>
        </select>
      </div>

      <div class="input-group mb-4">
        <input type="file" name="file" class="form-control" accept="audio/mpeg, video/mp4, application/pdf, .doc, .docx, .xml,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document, .xls, .xlsx, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, .ppt, .pptx">
      </div>

      <div class="input-group mb-4">
        <input type="text" name="title" class="form-control">
      </div>

      <div class="input-group mb-4">
        <textarea name="description" rows="5" class="form-control"></textarea>
      </div>

      <input type="submit" class="btn btn-primary" value="資料登録">
    </form>
  </div>
@endsection
