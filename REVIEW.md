# １．PaginationComponent.js の変更

ページネーションは実装がシンプルに見えて相当複雑なため、このパッケージ `vuejs-paginate` を流用しました。

URL： https://github.com/lokyoung/vuejs-paginate

もし何かエラーが出るならシンプルにスライド形式を採用するほうがいいかもしれません。

※ そのため、学習用のコードとしてはご説明は難しいかと思います。  
※ オリジナルは Vue 2 までのサポートのためいくつかカスタマイズしています。  
※ これに伴いまして common.scss, common.css も変更しています。

# 2．CSSのセット

CSSで \n を改行してくれる `white-space:pre-wrap;` をいくつかセットしています。
