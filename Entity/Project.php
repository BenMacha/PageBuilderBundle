<?php

namespace Benmacha\PageBuilderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\MappedSuperclass;

/** @MappedSuperclass */
abstract class Project
{

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string",length=50, unique=true)
     */
    protected $name;

    /**
     * @var Page[]
     *
     * @ORM\OneToMany(targetEntity="Page", mappedBy="project")
     */
    protected $pages;



    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pages = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return Project
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add page.
     *
     * @param Page $page
     *
     * @return Project
     */
    public function addPage(Page $page)
    {
        $this->pages[] = $page;

        return $this;
    }

    /**
     * Remove page.
     *
     * @param Page $page
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removePage(Page $page)
    {
        return $this->pages->removeElement($page);
    }

    /**
     * Get pages.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPages()
    {
        return $this->pages;
    }

}
