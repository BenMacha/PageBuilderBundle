<?php
/**
 * Created by PhpStorm.
 * User: benmacha
 * Date: 01/03/19
 * Time: 10:16 ص
 */

namespace Benmacha\PageBuilderBundle\Entity;


interface PageInterface
{

    public function getId();

    public function getTitle();

    public function setTitle(string $title);

    public function getName();

    public function setName(string $name);

    public function getSourceCode();

    public function setSourceCode(string $sourceCode);

}