@extends('layouts.editor')

@section('title', '얼 -- 資料一覧画面')

@section('content')
  <div id="one-column">
    <h1 class="page-title">資料一覧画面</h1>

    <div class="mb-3">
      <a href="{{ route('materials.create') }}" class="btn btn-success">登録画面へ</a>
      <a href="{{ route('materials.index') }}" class="btn btn-secondary">資料室へ</a>
    </div>

    @if (count($materials) > 0)
      <table class="table table-striped">
        <tr class="text-center">
          <th>カテゴリー</th>
          <th>種別</th>
          <th>タイトル</th>
          <th>公開状態</th>
          <th>公開日</th>
          <th>処理</th>
        </tr>
        @foreach ($materials as $material)
          <tr class="text-center">
            <td>{{ $categories[$material->category_key] }}</td>
            <td>{{ $types[$material->type_key] }}</td>
            <td>{{ $material->title }}</td>
            <td>
              @if ($material->status == 1)
                公開中
              @else
                非公開
              @endif
            </td>
            <td>
              @if ($material->status == 1)
                {{ $material->released_at }}
              @endif
            </td>
            <td class="d-flex">
              <a href="{{ route('materials.edit', $material) }}" class="btn btn-primary me-2">編集</a>
              <form method="post" action="{{ route('materials.destroy', $material) }}" class="me-2">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger" onclick="return deleteConfirm()">削除</button>
              </form>
              <form action="{{ route('materials.download', $material) }}">
                @csrf
                <button type="submit" class="btn btn-success">ダウンロード</button>
              </form>

            </td>
          </tr>
        @endforeach
      </table>
    @endif

  </div>
@endsection

@section('js-script')
  <script>
    const deleteConfirm = () => {
      const result = confirm("削除しますか？");

      if (result === true) {
        return true;
      }
      return false;
    }
  </script>
@endsection
