<?php

namespace Benmacha\PageBuilderBundle\Services;

use Doctrine\ORM\EntityManagerInterface;


class PageService
{

    /**
     * @var EntityManagerInterface
     */
    private $em;
    private $pageClass;
    private $versionClass;

    public function __construct(EntityManagerInterface $em, $pageClass, $versionClass)
    {

        $this->em = $em;
        $this->pageClass = $pageClass;
        $this->versionClass = $versionClass;

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