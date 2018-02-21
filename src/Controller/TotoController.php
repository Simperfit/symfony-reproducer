<?php

namespace App\Controller;

use App\Entity\Gerard;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Workflow\DefinitionBuilder;
use Symfony\Component\Workflow\MarkingStore\SingleStateMarkingStore;
use Symfony\Component\Workflow\Transition;
use Symfony\Component\Workflow\Workflow;

class TotoController extends Controller
{
    /**
     * @Route("/", name="index")
     */
    public function index(Request $request)
    {
        return new Response('toto');
    }

    /**
     * @Route("/php", name="php")
     */
    public function testRenderPhp(Request $request)
    {
        return $this->render("hello.html.php");
    }

    /**
     * @Route("/twig", name="twig")
     */
    public function testRenderTwig(Request $request)
    {
        return $this->render("base.html.twig");
    }
}
