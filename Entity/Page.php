<?php

namespace Benmacha\PageBuilderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


use Doctrine\ORM\Mapping\MappedSuperclass;

/** @MappedSuperclass */
abstract class Page
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
     * @var Page
     *
     * @ORM\ManyToOne(targetEntity="Project", inversedBy="pages")
     */
    protected $project;

    /**
     * @var Page
     *
     * @ORM\OneToMany(targetEntity="Version", mappedBy="page")
     */
    protected $versions;

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=255, unique=true)
     */
    protected $path;

    /**
     * @var string
     *
     * @ORM\Column(name="sourceCode", type="text")
     */
    protected $sourceCode;

}
