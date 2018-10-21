<?php

namespace App\Admin;


use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Route\RouteCollection;

class CustomAdmin extends AbstractAdmin
{
    protected $baseRoutePattern = 'custom';
    protected  $baseRouteName = 'custom';

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->clear();
        $collection->add('exibir');
    }
}