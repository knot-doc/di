# knot-lib/diの紹介

knot-lib/diライブラリはPSR-11 Container Interfaceに準拠するDI(Dependency Injection)コンテナです。同時に[Pimple](https://pimple.symfony.com/)
に類似するインターフェスを備えており、複雑な設定ファイルなしに簡単にアプリケーションに組み込むことができます。

また、[Pimple](https://pimple.symfony.com/)にはない自動依存性注入（オートワイヤリング）機能を備えています。オートワイヤリング
の方法としてはアノテーション、型引数、外部設定ファイルによるコンストラクタ、メソッド、プロパティインジェクションに対応しています。

## knot-lib/diの特徴

- 設定ファイルレスで実装が可能
- Pimpleライクなインターフェイス
- 「スロット」によるコンポーネントロック機構（instanceof、タイプ）
- extendによるコンポーネント拡張
- アノテーションによる依存性注入
- 型引数による依存性注入
- 外部設定ファイルによる依存性注入
- 設定ファイルのキャッシュ
- セットアップコードのモジュール化が可能
