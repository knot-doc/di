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

以下のコマンドを実行すると、/tmp/diにknot-document/diのソースコードプロジェクトが作成されます。

```cmd
$ cd /tmp
$ composer create-project knot-document/di 
```

その後、以下のコマンドを実行してバージョンが表示されればインストールは完了です。

```cmd
$ cd MyApp
$ vendor/bin/knot system:version
kNot Framework Command System Ver.1.0.0 Released 2019-12-08
```

## コマンドのパスを通す

knotコマンドのパス(vendor/bin/knot)を通すようシェルまたは環境変数の設定を行ってください。

## PHPビルトインサーバでknot-document/diアプリを起動する

以下のcomposerコマンドを実行することで、「[http://localhost:8880](http://localhost:8880)」でアプリケーションを起動できます。

```cmd
$ composer start
```

公開ディレクトリの場所は「di/public」です。

ApacheやNginxといったWebサーバでkNotアプリを公開する場合は、上記の公開ディレクトリ設定を行ってください。

