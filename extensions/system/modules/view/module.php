<?php

use Pagekit\View\ViewListener;

return [

    'name' => 'system/view',

    'main' => function ($app) {

        $app->extend('view', function ($view, $app) {

            $view->setEngine($app['tmpl']);
            $view->set('app', $app);
            $view->set('url', $app['url']);

            return $view;
        });

        $app->extend('assets', function($assets) {
            return $assets->register('export', 'Pagekit\View\Asset\ExportAsset');
        });

        $app->subscribe(new ViewListener);
    },

    'autoload' => [

        'Pagekit\\View\\' => 'src'

    ]

];
