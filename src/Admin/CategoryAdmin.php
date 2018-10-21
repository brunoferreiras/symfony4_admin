<?php

namespace App\Admin;


use App\Entity\Category;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class CategoryAdmin extends AbstractAdmin
{
    protected function configureListFields(ListMapper $list)
    {
        $list->addIdentifier('name');
    }

    protected function configureFormFields(FormMapper $form)
    {
        $form->add('name', TextType::class, [
            'label' => 'Nome',
            'attr' => [
                'placeholder' => 'Informe a categoria'
            ]
        ]);
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->remove('create');
        $collection->remove('delete');
        $collection->remove('edit');
    }

    public function toString($object)
    {
        return $object instanceof Category ? $object->getName() : 'Categoria';
    }
}
