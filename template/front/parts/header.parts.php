<?php
/** @noinspection HtmlUnknownTarget */
/** @noinspection HtmlFormInputWithoutLabel */

/** @var array $i18n */
/** @var string $site_name */
/** @var array $site_config */
/** @var string $lang */
?>
<nav class="navbar navbar-dark sticky-top flex-md-nowrap p-0" style="background-color: #3aa2ff">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="/">
        <img src="/images/knot-16x24.png" width="16" height="24" alt="">
        <?php le($site_name, $i18n); ?>
    </a>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <select name="lang" id="lang" class="">
                <option value="en" <?php if ($lang=='en') e('selected'); ?>>English</option>
                <option value="ja" <?php if ($lang=='ja') e('selected'); ?>>Japanese</option>
            </select>
        </li>
    </ul>
</nav>
