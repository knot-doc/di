<?php
/** @var array $i18n */
/** @var array $site_config */
/** @var string $pagekey */
/** @var string $description */
/** @var string $keywords */
/** @var string $title */

$description = '';
$keywords = '';
?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="format-detection" content="telephone=no">
<meta name="viewport" content="<?php e($site_config['meta']['viewport']); ?>">
<meta name="Description" content="<?php e($site_config['meta']['description']); ?>">
<meta name="Keywords" content="<?php e($site_config['meta']['keywords']); ?>">
<link rel="shortcut icon" href="/images/favicon.ico">
<title><?php le($site_config['title'], $i18n); ?></title>
