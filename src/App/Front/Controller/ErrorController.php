<?php
namespace KnotDoc\Di\App\Front\Controller;

use KnotDoc\Di\Exception\PageNotFoundException;
use KnotDoc\Di\FileSystem\Dir;

class ErrorController extends BaseController
{
    /**
     * 404: Not Found
     *
     * @param array $vars
     *
     * @return array
     *
     * @throws PageNotFoundException
     */
    public function status404(array $vars)
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
    /**
     * 500: Internal server error
     *
     * @param array $vars
     *
     * @return array
     */
    public function status500(array $vars)
    {
        return $vars;
    }
    /**
     * Show error
     *
     * @param array $vars
     *
     * @return array;
     *
     * @throws
     */
    public function showError(array $vars) : array
    {
        $error_code = $vars['error_code'] ?? 0;

        return [
            'message' => $error_message_map[$error_code] ?? 'Unknown error',
        ];
    }
}