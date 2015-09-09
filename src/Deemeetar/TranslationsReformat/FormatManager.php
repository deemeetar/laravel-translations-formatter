<?php namespace Deemeetar\TranslationsReformat;

use Deemeetar\TranslationsReformat\Filesystem\Reader;
use Deemeetar\TranslationsReformat\Filesystem\Writer;
use Deemeetar\TranslationsReformat\Formatters\Formatter;
use Illuminate\Filesystem\Filesystem;

class FormatManager
{
    public static $formatters = [];

    protected $files;
    /**
     * @var Reader
     */
    private $reader;
    /**
     * @var Writer
     */
    private $writer;

    /**
     * FormatManager constructor.
     * @param Filesystem $files
     * @param Reader $reader
     * @param Writer $writer
     */
    public function __construct(Filesystem $files, Reader $reader, Writer $writer)
    {
        $this->files = $files;
        $this->reader = $reader;
        $this->writer = $writer;
    }

    /**
     * @param $name
     * @param Formatter $formatter
     */
    public static function registerFormatter($name, Formatter $formatter)
    {
        static::$formatters[$name] = $formatter;
    }

    /**
     * @param $name
     * @return Formatter
     */
    public static function getFormatter($name)
    {
        return static::$formatters[$name];
    }

    public function format($format, $file = null)
    {
        $formatter = self::getFormatter($format);
        if (! $file) {
            foreach ($this->files->directories(app_path() . '/lang') as $langPath) {
                foreach ($this->files->files($langPath) as $file) {
                    $this->format($format, $file);
                }
            }
        }

        $content = $this->reader->read($file);

        $this->writer->write($file, $formatter->format($content));
    }

}