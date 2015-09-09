<?php namespace Deemeetar\TranslationsReformat\Filesystem;

class Reader
{
    public function read($file)
    {
        $fileinfo = pathinfo($file);
        $filename = $fileinfo['filename'];

        $dirinfo = pathinfo($fileinfo['dirname']);
        $locale = $dirinfo['filename'];

        $content = \Lang::getLoader()->load($locale, $filename);

        return $content;
    }
}