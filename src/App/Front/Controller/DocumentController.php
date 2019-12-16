<?php
namespace KnotDoc\Di\App\Front\Controller;

use cebe\markdown\GithubMarkdown;
use KnotDoc\Di\Exception\PageNotFoundException;
use KnotDoc\Di\FileSystem\Dir;

class DocumentController extends BaseController
{
    /**
     * Copmile document page
     *
     * @param array $vars
     * @param string $route_name
     *
     * @return array
     *
     * @throws PageNotFoundException
     */
    public function compilePage(array $vars, string $route_name)
    {
        $lang = $vars['lang'] ?? 'en';

        // load md contents
        $page_id = substr($route_name, strlen('document.'));

        $page_md_file = $this->getFileSystem()->getFile(Dir::DOCUMENT, "{$lang}/{$lang}.{$page_id}.md");
        if (!is_file($page_md_file)){
            throw new PageNotFoundException('Page contents file not found. ' . $page_md_file);
        }

        $md = file_get_contents($page_md_file);

        $page_html = (new GithubMarkdown)->parse($md);

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

        // load pager data
        $pager_file = $this->getFileSystem()->getFile(Dir::CONFIG, "pager.config.php");
        if (!is_file($pager_file)){
            throw new PageNotFoundException('Pager file not found. ' . $pager_file);
        }
        /** @noinspection PhpIncludeInspection */
        $pager = require $pager_file;

        // load page name data
        $page_name_file = $this->getFileSystem()->getFile(Dir::CONFIG, "page_name.config.php");
        if (!is_file($page_name_file)){
            throw new PageNotFoundException('Page name file not found. ' . $page_name_file);
        }
        /** @noinspection PhpIncludeInspection */
        $page_name = require $page_name_file;

        // load page URL data
        $page_url_file = $this->getFileSystem()->getFile(Dir::CONFIG, "page_url.config.php");
        if (!is_file($page_url_file)){
            throw new PageNotFoundException('Page URL file not found. ' . $page_url_file);
        }
        /** @noinspection PhpIncludeInspection */
        $page_url = require $page_url_file;


        return [
            'lang' => $lang,
            'page_id' => $page_id,
            'i18n' => $i18n,
            'page_html' => $page_html,
            'pager' => $pager[$page_id] ?? [],
            'page_name' => $page_name,
            'page_url' => $page_url,
        ];
    }

}