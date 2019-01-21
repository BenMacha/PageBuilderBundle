<?php

namespace Benmacha\PageBuilderBundle\Services;

use Doctrine\ORM\EntityManagerInterface;


class ProjectService
{

    /**
     * @var EntityManagerInterface
     */
    private $em;
    private $projectClass;
    private $pageClass;
    private $versionClass;

    public function __construct(EntityManagerInterface $em, $projectClass)
    {

        $this->em = $em;
        $this->projectClass = $projectClass;
        $this->manager = $em->getRepository($projectClass);
    }

    public function getProjectClass()
    {
        if (false !== strpos($this->projectClass, ':')) {
            $metadata = $this->em->getClassMetadata($this->projectClass);
            $this->projectClass = $metadata->getName();
        }

        return $this->pageClass;
    }

    public function findAll(){
        return $this->manager->findAll();
    }
}