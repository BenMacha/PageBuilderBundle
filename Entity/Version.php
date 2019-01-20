<?php

namespace Benmacha\PageBuilderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Doctrine\ORM\Mapping\MappedSuperclass;

/** @MappedSuperclass */
abstract class Version
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
     * @ORM\ManyToOne(targetEntity="Page", inversedBy="versions")
     */
    protected $page;

    /**
     * @var string
     *
     * @ORM\Column(name="sourceCode", type="text")
     */
    protected $sourceCode;

    /**
     * @var string
     *
     * @ORM\Column(name="version", type="string", length=255)
     */
    protected $version;

}
