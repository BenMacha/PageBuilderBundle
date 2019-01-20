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
     * @var Page
     *
     * @ORM\OneToMany(targetEntity="Page", mappedBy="project")
     */
    protected $pages;





}
