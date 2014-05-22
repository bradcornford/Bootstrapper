<?php namespace Cornford\Bootstrapper;

use Illuminate\Support\ServiceProvider;

class BootstrapServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = true;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('cornford/bootstrapper');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['bootstrap'] = $this->app->share(function()
		{
			return new Bootstrap(
				$this->app->make('Illuminate\Html\FormBuilder'),
				$this->app->make('Illuminate\Html\HtmlBuilder'),
				$this->app->make('Illuminate\Http\Request')
			);
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return string[]
	 */
	public function provides()
	{
		return array('bootstrap');
	}

}
