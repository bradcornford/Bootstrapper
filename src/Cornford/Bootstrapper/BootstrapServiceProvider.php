<?php namespace Cornford\Bootstrapper;

use Illuminate\Support\ServiceProvider;

class BootstrapServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

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
			return new Bootstrap;
        });
    }

    /**
     * Get the services provided by the provider.
	 *
     * @return array
     */
    public function provides()
    {
	    return array('bootstrap');
	}

}
