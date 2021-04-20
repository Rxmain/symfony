<?php

namespace App\Controller;

use App\Entity\Manga;
use App\Form\MangaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MangaController extends AbstractController
{
    /**
     * @Route("/manga", name="manga")
     */
    public function index(): Response
    {
        return $this->render('manga/index.html.twig', [
            'controller_name' => 'MangaController',
        ]);
    }

    /**
     * @Route ("/manga/new", name="new_manga")
     */
    public function new(): Response
    {
        $manga = new Manga();
        $form = $this->createForm(MangaType::class, $manga);

        return $this->render('manga/new.html.twig', [
            'form_manga'=>$form->createView()
    ]);
    }
}
