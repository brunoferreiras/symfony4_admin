<?php

namespace App\Admin;

use App\Entity\Category;
use App\Entity\Post;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class PostAdmin extends AbstractAdmin
{
    protected function configureListFields(ListMapper $list)
    {
        $list->addIdentifier('title', TextType::class, [
            'label' => 'Titulo'
        ])
            ->add('category', null, [
                'label' => 'Categoria',
                'associated_property' => 'name'
            ])
            ->add('status', 'boolean', [
                'editable' => true
            ]);
    }

    protected function configureFormFields(FormMapper $form)
    {
        // Form with tabs
        $form
            ->tab('Conteudo')
                ->with('Conteudo')
                    ->add('title', TextType::class)
                    ->add('content', TextareaType::class)
                    ->add('status', CheckboxType::class, [
                        'required' => false
                    ])
                ->end()
            ->end()
            ->tab('Auxiliar')
            ->add('category', ModelType::class, [
                'class' => Category::class,
                'property' => 'name',
                'multiple' => true
            ])
            ->add('author', ModelType::class, [
                'property' => 'name'
            ])
            ->end()
            ->end();
        // Form with Columns
//        $form
//            ->with('Conteudo', ['class' => 'col-md-9'])
//            ->add('title', TextType::class)
//            ->add('content', TextareaType::class)
//            ->add('status', CheckboxType::class, [
//                'required' => false
//            ])
//            ->end()
//            ->with('Auxiliar', ['class' => 'col-md-3'])
//            ->add('category', ModelType::class, [
//                'class' => Category::class,
//                'property' => 'name',
//                'multiple' => true
//            ])
//            ->add('author', ModelType::class, [
//                'property' => 'name'
//            ])
//            ->end();
    }

    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter->add('title')
            ->add('status')
            ->add('category', null, [], EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'name'
            ]);
    }

    public function toString($object)
    {
        return $object instanceof Post ? $object->getTitle() : 'Postagens';
    }
}
