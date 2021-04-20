<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MyInformationsController extends AbstractController
{
    /**
     * @Route("/my/informations", name="my_informations")
     */
    public function index(): Response
    {
        return $this->render('my_informations/index.html.twig', [
            'controller_name' => 'MyInformationsController',
        ]);
    }
}
