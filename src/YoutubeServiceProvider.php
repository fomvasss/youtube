<?php

namespace Fomvasss\Youtube;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class YoutubeServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $configPath = __DIR__ . '/../config/youtube.php';
        $publishPath = config_path('youtube.php');

        $this->publishes([$configPath => $publishPath], 'config');

        $this->registerHelpers();

        $loader = AliasLoader::getInstance();
        $loader->alias('Youtube', Facades\Youtube::class);

        Blade::directive('youtube', function($expression){
            return '<?php echo youtube_iframe(' . $expression . '); ?>';
        });

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind('youtube', function($app){
            return new Youtube();
        });

        $this->mergeConfigFrom(__DIR__.'/../config/youtube.php', 'youtube');

    }



    public function registerHelpers()
    {
        if (file_exists($file = __DIR__.'/helpers.php'))
        {
            require $file;
        }
    }

}
