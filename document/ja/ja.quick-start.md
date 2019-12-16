# クイックスタート

## composerのインストール(Linux/Mac OS)

```cmd
$ brew install homebrew/php/composer
```

または

```cmd
$ curl -sS https://getcomposer.org/installer | php
$ mv composer.phar /usr/local/bin/composer
$ composer --version
```

を実行してください。その後、

```cmd
$ composer --version
Composer version 1.9.1 2019-11-01 17:20:17
```

と実行してバージョンが表示されればインストール完了です。

## composerのインストール(Windows)

[Composerダウンロードページ](https://getcomposer.org/download/)からセットアッププログラムをダウンロードしてインストール。

または、

```cmd
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```

を実行してください。その後、

```cmd
$ composer --version
Composer version 1.9.1 2019-11-01 17:20:17
```

と実行してバージョンが表示されればインストール完了です。
(後者の方法でインストールした場合はコマンドが「php composer.phar」となります。)

## プロジェクトの作成

以下のコマンドを実行すると、/tmp/diにknot-lib/di用のソースコードプロジェクトが作成されます。

```cmd
$ cd /tmp
$ composer require knot-lib/di 
```

## autoload.phpのインクルード

knot-lib/diのクラスを自動的に読み込むため、以下のコードをスクリプトの先頭に記述してください。

```php
require_once __DIR__ . '/vendor/autoload.php';
```
