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
     * @Route("/", name="benmacha_pagebuilder_home")

     *
     * @param Request                $request
     *
     *
     * @return Response
     */
    public function adminAction(Request $request)
    {
        $pageService = $this->get('benmacha_pagebuilder_page_service');

        return $this->render('@BenmachaPageBuilder/builder/index.html.twig', array(
            'pages' => $pageService->findAll(),
        ));
    }

    /**
     * @Route("/components-bootstrap4.js", name="benmacha_pagebuilder_components")

     */
    public function componentsAction( )
    {
        return $this->render('@BenmachaPageBuilder/builder/components-bootstrap4.js.twig');
    }

    /**
     * @Route("/components-widgets.js", name="benmacha_pagebuilder_widgets")
     *
     */
    public function widgetsAction( )
    {
        return $this->render('@BenmachaPageBuilder/builder/components-widget.js.twig');
    }

    /**
     * @Route("/components-bootstrap4.js", name="benmacha_pagebuilder_server")
     *
     */
    public function serverAction( )
    {
        return $this->render('@BenmachaPageBuilder/builder/components-server.js.twig');
    }

}
