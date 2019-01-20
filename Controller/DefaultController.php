<?php

/**
 * PHP version 7.* & Symfony 3.4.
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt.
 *
 * UberEats by Ben Macha.
 *
 * @category   Symfony Project
 *
 * @author     Ali Ben Macha       <contact@benmacha.tn>
 * @copyright  Ⓒ 2018 Cubes.TN
 *
 * @see       http://www.cubes.tn
 */

namespace Benmacha\PageBuilderBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="benmacga_pagebuilder_home")

     *
     * @param Request                $request
     *
     *
     * @return Response
     */
    public function adminAction(Request $request)
    {
        return $this->render('@PageBuilder/builder/index.html.twig');
    }

    /**
     * @Route("/components.js", name="benmacha_pagebuilder_components")
     *
     * @param Request                $request
     *
     *
     * @return Response
     */
    public function componentsAction(Request $request)
    {
        return $this->render('@PageBuilder/builder/components.js.twig');
    }

}
