<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 */
class Category
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return Post
     */
    public function getPosts()
    {
        return $this->posts;
    }

    /**
     * @param Post $posts
     */
    public function setPosts($posts)
    {
        $this->posts = $posts;
    }

    /**
     * @var Post
     * @ORM\OneToMany(targetEntity="App\Entity\Post", mappedBy="category")
     */
    private $posts;
}
