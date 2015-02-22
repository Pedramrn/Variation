<?php namespace Jiro\Variation;

use Illuminate\Support\ServiceProvider;
use Jiro\Property\Database\Eloquent\Property;
use Jiro\Property\Database\Eloquent\PropertyValue;
use Jiro\Variation\Database\Eloquent\Option;
use Jiro\Variation\Database\Eloquent\OptionValue;
use Jiro\Variation\Database\Eloquent\Variation;

class VariationServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = true;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(VariationInterface::class, Variation::class);
		$this->app->bind(OptionInterface::class, Option::class);
		$this->app->bind(OptionValueInterface::class, OptionValue::class);

        $this->registerCommands();

    }

    /**
     * Register the variation related console commands.
     *
     * @return void
     */
    public function registerCommands()
    {
        $this->app->singleton('command.jiro.variation.install', function($app)
        {
            return new Console\InstallCommand($app['files'], $app['composer']);
        });

        $this->commands('command.jiro.variation.install');
    }

    /**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return [
			'Jiro\Product\Variation\OptionValueInterface',
			'Jiro\Product\Variation\OptionInterface',
			'Jiro\Product\Variation\VariationInterface'
		];
	}

}
