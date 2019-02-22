<?php
/**
 * Created by PhpStorm.
 * User: benmacha
 * Date: 2019-01-21
 * Time: 07:50
 */

namespace Benmacha\PageBuilderBundle\Controller;

use AppBundle\Entity\Commercial;
use AppBundle\Entity\Earning;
use AppBundle\Entity\Invoice;
use AppBundle\Entity\Restaurant;
use AppBundle\Form\ActivationFeeType;
use Benmacha\PageBuilderBundle\Entity\Project;
use Benmacha\PageBuilderBundle\Form\ProjectType;
use Benmacha\TemplateBundle\Annotations\MenuAnnotation;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

/**
 * Project controller.
 *
 * @Route("projects")
 */
class ProjectController extends Controller
{

    /**
     * Lists all project entities.
     *
     * @Route("/", name="benmacha_pagebuilder_project_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $projectService =  $this->get('benmacha_pagebuilder_project_service');

        $projects = $projectService->findAll();

        return $this->render('@BenmachaPageBuilder/project/index.html.twig', array(
            'projects' => $projects,
        ));
    }

    /**
     * Creates a new project entity.
     *
     * @Route("/new", name="benmacha_pagebuilder_project_new")
     * @Method({"GET", "POST"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newAction(Request $request)
    {
        $projectService =  $this->get('benmacha_pagebuilder_project_service');

        /** @var Project $project */
        $project =  $projectService->createProject();

        $form = $this->createForm(ProjectType::class, $project);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($project);
            $em->flush();

            return $this->redirectToRoute('benmacha_pagebuilder_project_show', array('id' => $project->getId()));
        }

        return $this->render('@BenmachaPageBuilder/project/new.html.twig', array(
            'project' => $project,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a project entity.
     *
     * @Route("/{id}", name="benmacha_pagebuilder_project_show")
     * @Method("GET")
     * @param int $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction(int $id)
    {
        $projectService =  $this->get('benmacha_pagebuilder_project_service');

        /** @var Project $project */
        $project =  $projectService->find($id);

        $deleteForm = $this->createDeleteForm($project);

        return $this->render('@BenmachaPageBuilder/project/show.html.twig', array(
            'project' => $project,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing project entity.
     *
     * @Route("/{id}/edit", name="benmacha_pagebuilder_project_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, int $id)
    {

        $projectService =  $this->get('benmacha_pagebuilder_project_service');

        /** @var Project $project */
        $project =  $projectService->find($id);


        $deleteForm = $this->createDeleteForm($project);
        $editForm = $this->createForm(ProjectType::class, $project);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('benmacha_pagebuilder_project_edit', array('id' => $project->getId()));
        }

        return $this->render('@BenmachaPageBuilder/project/edit.html.twig', array(
            'project' => $project,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a project entity.
     *
     * @Route("/{id}", name="benmacha_pagebuilder_project_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, int $id)
    {

        $projectService =  $this->get('benmacha_pagebuilder_project_service');

        /** @var Project $project */
        $project =  $projectService->find($id);

        $form = $this->createDeleteForm($project);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($project);
            $em->flush();
        }

        return $this->redirectToRoute('benmacha_pagebuilder_project_index');
    }

    /**
     * Creates a form to delete a project entity.
     *
     * @param Project $project The project entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Project $project)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('benmacha_pagebuilder_project_delete', array('id' => $project->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }
}