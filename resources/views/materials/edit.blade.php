@extends('layouts.editor')

@section('title', '얼 -- 資料編集画面')

@section('content')
  <div id="one-column">
    <h1 class="page-title">資料編集画面</h1>

    <div class="mb-3">
      <a href="{{ route('materials.list') }}" class="btn btn-success">一覧画面へ</a>
      <a href="{{ route('materials.create') }}" class="btn btn-success">登録画面へ</a>
      <a href="{{ route('materials.index') }}" class="btn btn-secondary">資料室へ</a>
    </div>

    <form action="{{ route('materials.update', $material) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="input-group mb-4">
        <select name="category_key" class="form-select me-3">
          @foreach ($categories as $key => $category)
            <option value="{{ $key }}" @if($material->category_key == $key) selected @endif>{{ $category }}</option>
          @endforeach
        </select>

        <select name="type_key" class="form-select me-3">
          @foreach ($types as $key => $type)
            <option value="{{ $key }}" @if($material->type_key == $key) selected @endif>{{ $type }}</option>
          @endforeach
        </select>

        <select name="status" class="form-select">
          <option value="0" @if($material->status == 0) selected @endif>非公開</option>
          <option value="1" @if($material->status == 1) selected @endif>公開</option>
        </select>
      </div>

      <div class="input-group mb-4">
        <input type="text" name="title" class="form-control" value="{{ $material->title }}">
      </div>

      <div class="input-group mb-4">
        <textarea name="description" rows="5" class="form-control">{{ $material->description }}</textarea>
      </div>

      <input type="submit" class="btn btn-primary" value="資料登録">
    </form>
  </div>
@endsection
