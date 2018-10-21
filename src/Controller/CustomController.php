<?php

namespace App\Controller;


use Sonata\AdminBundle\Controller\CRUDController;

class CustomController extends CRUDController
{
    public function exibirAction()
    {
        return $this->renderWithExtraParams('admin/custom/exibir.html.twig');
    }
}