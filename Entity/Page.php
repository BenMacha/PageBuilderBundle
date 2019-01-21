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
     * @var Page[]
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


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->versions = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set path.
     *
     * @param string $path
     *
     * @return Page
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path.
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set sourceCode.
     *
     * @param string $sourceCode
     *
     * @return Page
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
     * Set project.
     *
     * @param Project|null $project
     *
     * @return Page
     */
    public function setProject(Project $project = null)
    {
        $this->project = $project;

        return $this;
    }

    /**
     * Get project.
     *
     * @return Project|null
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * Add version.
     *
     * @param Version $version
     *
     * @return Page
     */
    public function addVersion(Version $version)
    {
        $this->versions[] = $version;

        return $this;
    }

    /**
     * Remove version.
     *
     * @param Version $version
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeVersion(Version $version)
    {
        return $this->versions->removeElement($version);
    }

    /**
     * Get versions.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVersions()
    {
        return $this->versions;
    }

}
