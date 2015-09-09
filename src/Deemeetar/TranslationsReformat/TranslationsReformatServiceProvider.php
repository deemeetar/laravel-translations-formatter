<?php namespace Deemeetar\TranslationsReformat;

use Deemeetar\TranslationsReformat\Formatters\PSRPHP54Formatter;
use Illuminate\Support\ServiceProvider;

class TranslationsReformatServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		FormatManager::registerFormatter('psr-php54', new PSRPHP54Formatter());
	}

	public function boot()
	{
		$this->commands('Deemeetar\TranslationsReformat\Console\ReformatConsoleCommand');
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
