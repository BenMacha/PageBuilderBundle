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
     * Set sourceCode.
     *
     * @param string $sourceCode
     *
     * @return Version
     */
    public function setSourceCode($sourceCode)
    {
        $this->sourceCode = $sourceCode;

        return $this;
    }

    /**
     * Get sourceCode.
     *
     * @return string
     */
    public function getSourceCode()
    {
        return $this->sourceCode;
    }

    /**
     * Set version.
     *
     * @param string $version
     *
     * @return Version
     */
    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * Get version.
     *
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set page.
     *
     * @param Page|null $page
     *
     * @return Version
     */
    public function setPage(Page $page = null)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Get page.
     *
     * @return Page
     */
    public function getPage()
    {
        return $this->page;
    }
}
