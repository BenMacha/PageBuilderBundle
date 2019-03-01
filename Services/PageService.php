<?php

namespace Benmacha\PageBuilderBundle\Services;

use Benmacha\PageBuilderBundle\Entity\PageInterface;
use Doctrine\ORM\EntityManagerInterface;


class PageService
{

    /**
     * @var EntityManagerInterface
     */
    private $em;
    private $manager;
    private $pageClass;

    public function __construct(EntityManagerInterface $em, $pageClass)
    {
        $this->em = $em;
        $this->pageClass = $pageClass;

        $this->manager = $em->getRepository($pageClass);

    }

    /**
     * @return string
     */
    public function getPageClass()
    {
        if (false !== strpos($this->pageClass, ':')) {
            $metadata = $this->em->getClassMetadata($this->pageClass);
            $this->pageClass = $metadata->getName();
        }

        return $this->pageClass;
    }

    /**
     * @return mixed
     */
    public function createPage()
    {
        $class = $this->getPageClass();
        $project = new $class();

        return $project;
    }

    /**
     * @return object[]
     */
    public function findAll(){
        return $this->manager->findAll();
    }

    /**
     * @param $id
     * @return object|null
     */
    public function find($id){
        return $this->manager->find($id);
    }

}