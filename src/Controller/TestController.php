<?php

namespace App\Controller;

use App\Entity\Gerard;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Workflow\DefinitionBuilder;
use Symfony\Component\Workflow\MarkingStore\SingleStateMarkingStore;
use Symfony\Component\Workflow\Transition;
use Symfony\Component\Workflow\Workflow;

class TestController extends Controller
{
    /**
     * @Route("/test", name="test")
     */
    public function index(Request $request)
    {
        $definitionBuilder = new DefinitionBuilder();
        $definition = $definitionBuilder->addPlaces(['draft', 'review', 'rejected', 'published'])
            // Transitions are defined with a unique name, an origin place and a destination place
            ->addTransition(new Transition('to_review', 'draft', 'review'))
            ->addTransition(new Transition('publish', 'review', 'published'))
            ->addTransition(new Transition('reject', 'review', 'rejected'))
            ->build()
        ;

        $marking = new SingleStateMarkingStore('currentState');
        $workflow = new Workflow($definition, $marking);

        return $this->render('base.html.twig', array(
            'object' => new \stdClass(),
        ));
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
