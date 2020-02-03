<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/' => [[['_route' => 'home', '_controller' => 'App\\Controller\\SiteHacceScolController::home'], null, null, null, false, false, null]],
        '/site_hacce_scol/parcourir' => [[['_route' => 'site_index', '_controller' => 'App\\Controller\\SiteHacceScolController::index'], null, null, null, false, false, null]],
        '/site_hacce_scol/ajouter' => [[['_route' => 'site_ajouter', '_controller' => 'App\\Controller\\SiteHacceScolController::ajouter'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
                .'|/site_hacce_scol/([^/]++)(*:67)'
            .')/?$}sD',
    ],
    [ // $dynamicRoutes
        35 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        67 => [
            [['_route' => 'site_show', '_controller' => 'App\\Controller\\SiteHacceScolController::show'], ['id'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
