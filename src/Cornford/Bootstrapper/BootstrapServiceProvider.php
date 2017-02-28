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
		$assetPath = __DIR__.'/../../../public';
		$this->publishes([$assetPath => public_path('packages/cornford/bootstrapper')], 'bootstrapper');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->singleton('bootstrap', function($app)
		{
			return new Bootstrap(
				$this->app->make('Collective\Html\FormBuilder', ['csrfToken' => $app['session.store']->getToken()]),
				$this->app->make('Collective\Html\HtmlBuilder'),
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
