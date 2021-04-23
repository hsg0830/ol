# １．resources/views/articles/create.blade.php

## （１）watch

こちらすみません。  

おっしゃるとおり edit の場合に問題がでてしまいますので、`onChangeCategory()` へ変更させていただきました。m(_ _)m

## （２）currentArticle

`create()` から呼ばれたときは、`null`、そして `edit()` の場合は `JSONデータ` がそれぞれセットされてるようになっています。

さらに、その値を `mounted()`　内でチェックし、`currentMode` を切り替えています。

# ２．app/Models/Article.php

## （１）getDateAttribute()

メンバ変数 `$casts` へ `released_at` を登録することで Carbonインスタンスへ自動的に「型変換」しています。

そして、これを使って`getDateAttribute()` 内で日付データを取得しています。

## （２）saving イベント

`$dispatchesEvents` に「保存する直前に実行される」イベント「saving」を追加して `released_at` を自動的に切り替えるようにしています。
（store(), update(), changeStatus() 一部コードの共通化）


# ３．レビューにつきまして

レビューで変更させていただきましたのは、「一例」としてのご紹介です。

そのため、韓さんに「より良いと思われるコード」がありましたら、そちらを優先していただいて何も問題ございません。（今回ご不便をおかけしておりますので、頑張ってレビューしすぎた部分があるかもしれません ^^;）

また、私の開発環境では「タブ = 4半角スペース」になっておりますが、こちらも VSCode に合わせていただいて問題ございません。

以上になります。
どうぞよろしくお願いいたします。　m(_ _)m