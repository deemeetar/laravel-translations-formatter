<?php namespace Deemeetar\TranslationsReformat\Console;

use Deemeetar\TranslationsReformat\FormatManager;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class ReformatConsoleCommand extends Command
{

    protected $name = 'reformat:translations';
    protected $description = 'Reformat translations files';
    protected $manager;

    /**
     * ReformatConsoleCommand constructor.
     */
    public function __construct(FormatManager $formatManager)
    {
        $this->manager = $formatManager;
        parent::__construct();
    }


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        $format = $this->argument('format');
        $file = $this->option('file');

        $this->manager->format($format);


//        dd($contents);
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return array(
            array(
                'format',
                InputArgument::OPTIONAL,
                'The desired format for the output',
                'psr-php54'
            ),
        );
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return array(
            array(
                'file',
                "f",
                InputOption::VALUE_OPTIONAL,
                'If specified, only that file will be reformated',
                '*'
            ),
        );
    }

}