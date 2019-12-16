<?php
namespace KnotDoc\Di\App\Front\Controller;

use KnotDoc\Di\Exception\PageNotFoundException;
use KnotDoc\Di\FileSystem\Dir;

class HomeController extends BaseController
{
    /**
     * index
     *
     * @param array $vars
     *
     * @return array
     *
     * @throws
     */
    public function index(array $vars)
    {
        $lang = $vars['lang'] ?? 'en';

        // load i18n data
        $i18n = [];
        if ($lang !== 'en')
        {
            $lang_file = $this->getFileSystem()->getFile(Dir::I18N, "{$lang}.lang.php");
            if (!is_file($lang_file)){
                throw new PageNotFoundException('I18n file not found. ' . $lang_file);
            }
            /** @noinspection PhpIncludeInspection */
            $i18n = require $lang_file;
        }

        return [
            'lang' => $lang,
            'i18n' => $i18n,
        ];
    }

}