<?php
use \Cake\Core\Configure;
use \Vamshop\Core\Vamshop;
use \Cake\Cache\Cache;
use \Vamshop\Core\Nav;

$cacheConfig = array_merge(Configure::read('Vamshop.Cache.defaultConfig'), ['groups' => ['seo_lite']]);
Cache::config('seo_lite', $cacheConfig);

Configure::write('Seo.keys', [
    'meta_keywords' => [
        'label' => __d('seo', 'Keywords'),
    ],
    'meta_description' => [
        'label' => __d('seo', 'Description'),
    ],
    'rel_canonical' => [
        'label' => __d('seo', 'Canonical Page'),
    ],
]);

Vamshop::hookHelper('*', 'Seo.Seo');

$queryString = env('REQUEST_URI');
if (strpos($queryString, 'admin') === false) {
    return;
}

/*
 * stuff for /admin routes only
 */

Vamshop::hookBehavior('Vamshop/Nodes.Nodes', 'Seo.CustomFields', [
    'priority' => 1,
]);

$title = 'Seo';
$element = 'Seo.admin/meta';
$options = [
    'elementData' => [
        'field' => 'body',
    ],
];
Vamshop::hookAdminTab('Admin/Nodes/add', $title, $element, $options);
Vamshop::hookAdminTab('Admin/Nodes/edit', $title, $element, $options);
$options['elementData']['field'] = 'description';
Vamshop::hookAdminTab('Admin/SeoUrls/add', $title, $element, $options);
Vamshop::hookAdminTab('Admin/SeoUrls/edit', $title, $element, $options);

Nav::add('sidebar', 'seo_lite', [
    'icon' => 'bolt',
    'title' => 'Seo',
    'url' => 'javascript:void(0)',
    'children' => [
        'urls' => [
            'title' => __d('seo_lite', 'Meta by URL'),
            'url' => [
                'admin' => true,
                'plugin' => 'Seo',
                'controller' => 'Urls',
                'action' => 'index',
            ],
        ],
    ],
]);
