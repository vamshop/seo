<?php
use \Cake\Core\Configure;
use \Vamshop\Core\Vamshop;
use \Cake\Cache\Cache;
use \Vamshop\Core\Nav;

$cacheConfig = array_merge(Configure::read('Vamshop.Cache.defaultConfig'), ['groups' => ['seo_lite']]);
Cache::config('seo_lite', $cacheConfig);

Configure::write('Seolite.keys', [
    'meta_keywords' => [
        'label' => __d('seolite', 'Keywords'),
    ],
    'meta_description' => [
        'label' => __d('seolite', 'Description'),
    ],
    'rel_canonical' => [
        'label' => __d('seolite', 'Canonical Page'),
    ],
]);

Vamshop::hookHelper('*', 'Seolite.SeoLite');

$queryString = env('REQUEST_URI');
if (strpos($queryString, 'admin') === false) {
    return;
}

/*
 * stuff for /admin routes only
 */

Vamshop::hookBehavior('Vamshop/Nodes.Nodes', 'Seolite.CustomFields', [
    'priority' => 1,
]);

$title = 'SeoLite';
$element = 'Seolite.admin/meta';
$options = [
    'elementData' => [
        'field' => 'body',
    ],
];
Vamshop::hookAdminTab('Admin/Nodes/add', $title, $element, $options);
Vamshop::hookAdminTab('Admin/Nodes/edit', $title, $element, $options);
$options['elementData']['field'] = 'description';
Vamshop::hookAdminTab('Admin/SeoLiteUrls/add', $title, $element, $options);
Vamshop::hookAdminTab('Admin/SeoLiteUrls/edit', $title, $element, $options);

Nav::add('sidebar', 'seo_lite', [
    'title' => 'SeoLite',
    'url' => 'javascript:void(0)',
    'children' => [
        'urls' => [
            'title' => __d('seo_lite', 'Meta by URL'),
            'url' => [
                'admin' => true,
                'plugin' => 'Seolite',
                'controller' => 'Urls',
                'action' => 'index',
            ],
        ],
    ],
]);
