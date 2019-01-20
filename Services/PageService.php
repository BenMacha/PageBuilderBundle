<?php

namespace Benmacha\PageBuilderBundle\Services;

use Doctrine\ORM\EntityManagerInterface;


class PageService
{

    /**
     * @var EntityManagerInterface
     */
    private $em;
    private $projectClass;
    private $pageClass;
    private $versionClass;

    public function __construct(EntityManagerInterface $em, $projectClass, $pageClass, $versionClass)
    {

        $this->em = $em;
        $this->projectClass = $projectClass;
        $this->pageClass = $pageClass;
        $this->versionClass = $versionClass;

    }

    public function getProjectClass()
    {
        if (false !== strpos($this->projectClass, ':')) {
            $metadata = $this->em->getClassMetadata($this->projectClass);
            $this->projectClass = $metadata->getName();
        }

        return $this->pageClass;
    }

    public function getPageClass()
    {
        if (false !== strpos($this->pageClass, ':')) {
            $metadata = $this->em->getClassMetadata($this->pageClass);
            $this->pageClass = $metadata->getName();
        }

        return $this->pageClass;
    }

    public function getVersionClass()
    {
        if (false !== strpos($this->versionClass, ':')) {
            $metadata = $this->em->getClassMetadata($this->versionClass);
            $this->versionClass = $metadata->getName();
        }
        return $this->versionClass;
    }
}