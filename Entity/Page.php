<?php

namespace Benmacha\PageBuilderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


use Doctrine\ORM\Mapping\MappedSuperclass;

/** @MappedSuperclass */
abstract class Page implements PageInterface
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
    protected $title;

    /**
     * @var string
     *
     * @ORM\Column(name="names", type="string",length=50, unique=true)
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="sourceCode", type="text")
     */
    protected $sourceCode;

    /**
     * @return int
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
     * @return Page
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Page
     */
    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getSourceCode()
    {
        return $this->sourceCode;
    }

    /**
     * @param string $sourceCode
     * @return Page
     */
    public function setSourceCode(string $sourceCode)
    {
        $this->sourceCode = $sourceCode;
        return $this;
    }



}
