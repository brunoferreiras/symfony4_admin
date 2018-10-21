<?php

namespace App\Entity;

use App\Application\Sonata\MediaBundle\Entity\Media;
use App\Application\Sonata\MediaBundle\Entity\Gallery;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\PersistentCollection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PostRepository")
 */
class Post
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
    private $title;

    /**
     * @var string
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $status;

    /**
     * @var Category
     * @ORM\ManyToMany(targetEntity="App\Entity\Category", inversedBy="posts")
     * @ORM\JoinTable(name="category_posts")
     */
    private $category;

    /**
     * @var Author
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Author", inversedBy="posts")
     *
     */
    private $author;

    /**
     * @var Media
     *
     * @ORM\ManyToOne(targetEntity="App\Application\Sonata\MediaBundle\Entity\Media", cascade={"persist"})
     */
    private $image;

    /**
     * @var Gallery
     *
     * @ORM\ManyToOne(targetEntity="App\Application\Sonata\MediaBundle\Entity\Gallery", cascade={"persist"})
     */
    private $gallery;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return bool
     */
    public function isStatus()
    {
        return $this->status;
    }

    /**
     * @param bool $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return Category
     */
    public function getCategory(): ?PersistentCollection
    {
        return $this->category;
    }

    /**
     * @param Category $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return Author
     */
    public function getAuthor(): ?Author
    {
        return $this->author;
    }

    /**
     * @param Author $author
     */
    public function setAuthor(Author $author): void
    {
        $this->author = $author;
    }

    /**
     * @return Media
     */
    public function getImage(): ?Media
    {
        return $this->image;
    }

    /**
     * @param Media $image
     */
    public function setImage(Media $image): void
    {
        $this->image = $image;
    }

    /**
     * @return Gallery
     */
    public function getGallery(): ?Gallery
    {
        return $this->gallery;
    }

    /**
     * @param Gallery $gallery
     */
    public function setGallery(Gallery $gallery): void
    {
        $this->gallery = $gallery;
    }
}

