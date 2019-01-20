<?php

namespace Benmacha\PageBuilderBundle\Entity;

use Benmacha\PageBuilderBundle\Entity\Traits\TimestampedTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Page
 *
 * @ORM\Table(name="macha_page")
 * @ORM\Entity(repositoryClass="Benmacha\PageBuilderBundle\Repository\PageRepository")
 * @ORM\HasLifecycleCallbacks()
 */
abstract class Page
{

    use TimestampedTrait;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="text", unique=true)
     */
    private $path;

    /**
     * @var string
     *
     * @ORM\Column(name="ve", type="text")
     */
    private $versions;

    /**
     * @var string
     *
     * @ORM\Column(name="sourceCode", type="text")
     */
    private $sourceCode;


}
