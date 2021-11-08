<?php

namespace ClickForce\Commons;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

/**
 * CommonsServiceProvider
 */
class CommonsServiceProvider extends ServiceProvider
{
    /**
     * boot
     * @return void
     */
    public function boot()
    {
        /**
         * php artisan migrate 會直接導入，不用複製檔案過去 /database/migrations
         * 問題1 不能用在其他 database
         */
        // $this->loadMigrationsFrom(__DIR__ . '/../migrations');

        /**
         * 複製檔案到 migrations，必須要 php artisan 安裝到每個資料庫
         */
        $this->publishes([
            __DIR__ . '/../migrations/' => database_path("/migrations/"),
        ], 'migrations');

        $this->publishes([
            __DIR__ . '/../factories/' => database_path("/factories/"),
        ], 'factories');

        // Lang
        // $this->loadTranslationsFrom(__DIR__ . '/gds/resources/lang', 'gds-commons');

        // $this->publishes([
        //     __DIR__ . '/gds/resources/lang' => resource_path('lang/vendor/gds-commons'),
        // ]);
    }

    /**
     * register
     * @return void
     */
    public function register()
    {
    }
}
