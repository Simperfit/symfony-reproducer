<?php

namespace App\Controller;

use App\Entity\Gerard;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TestController extends Controller
{
    /**
     * @Route("/test", name="test")
     */
    public function index(Request $request)
    {

        return new Response('toto');
       /* // replace this line with your own code!
// just setup a fresh $task object (remove the dummy data)
        $task = new Gerard();

        $form = $this->createFormBuilder($task)
            ->add('bool', ChoiceType::class)
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $task = $form->getData();

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            // $em = $this->getDoctrine()->getManager();
            // $em->persist($task);
            // $em->flush();

            return $this->redirectToRoute('task_success');
        }

        return $this->render('base.html.twig', array(
            'form' => $form->createView(),
        ));   */
    }
}
