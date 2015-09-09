<?php namespace Deemeetar\TranslationsReformat\Formatters;

interface Formatter
{
    /**
     * @param array $input
     * @return string
     */
    public function format(array $input);
}