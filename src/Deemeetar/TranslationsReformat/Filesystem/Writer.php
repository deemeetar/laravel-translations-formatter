<?php namespace Deemeetar\TranslationsReformat\Filesystem;

class Writer
{
    public function write($file, $content)
    {
//        dd($file, $content);
        file_put_contents($file, $content);
    }

}