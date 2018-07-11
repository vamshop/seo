<?php

/**
 * SeoUrls Controller
 *
 * @property SeoUrl $SeoUrl
 * @property PaginatorComponent $Paginator
 */
namespace Seo\Controller\Admin;

class UrlsController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Search.Prg', [
            'actions' => ['index']
        ]);
    }
}
