<?php
namespace App\Admin;


use App\Entity\Category;
use App\Entity\Post;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelType;
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
            ->add('category.name', TextType::class, [
                'label' => 'Categoria'
            ])
            ->add('status', 'boolean', [
                'editable' => true
            ]);
    }

    protected function configureFormFields(FormMapper $form)
    {
        $form->add('category', ModelType::class, [
            'class' => Category::class,
            'property' => 'name'
        ])
            ->add('title', TextType::class)
            ->add('content', TextareaType::class)
            ->add('status', CheckboxType::class, [
                'required' => false
            ]);
    }

    public function toString($object)
    {
        return $object instanceof Post ? $object->getTitle() : 'Postagens';
    }
}