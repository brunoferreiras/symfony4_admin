<?php

namespace App\Controller;


use App\Entity\Post;
use Sonata\AdminBundle\Controller\CRUDController;

class CustomController extends CRUDController
{
    public function exibirAction()
    {
        $em = $this->getDoctrine()->getManager();
        $posts = $em->getRepository(Post::class)->findAll();
        return $this->renderWithExtraParams('admin/custom/exibir.html.twig', compact('posts'));
    }
}