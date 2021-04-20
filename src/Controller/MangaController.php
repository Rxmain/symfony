<?php

namespace App\Controller;

use App\Entity\Manga;
use App\Form\MangaType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MangaController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    /**
     * @Route("/manga", name="manga")
     */
    public function index(): Response
    {
        $mangas = $this->entityManager->getRepository(Manga::class)->findAll();

        return $this->render('manga/index.html.twig', [
            'mangas' => $mangas,
        ]);
    }

    /**
     * @Route ("/manga/new", name="new_manga")
     */
    public function new(Request $request): Response //Nouvelle méthode pour ajouter un formulaire
    {
        $manga = new Manga(); // Appel d'un nouvel objet de type Manga
        $form = $this->createForm(MangaType::class, $manga); // Création d'un formulaire $form et application de celui-ci selon le type MangaType avec les données de $manga

        $form->handleRequest($request); // sur le formulaire applique la requête Symfony HTTP

        if($form->isSubmitted() && $form->isValid()) // Si mon formulaire et valide et si il est envoyé fait qqch
        {
            $manga = $form->getData(); //Hydrate (def : prendre les infos et les mettre dans un objet) l'objet avec les infos entrées dans le form

            //pour communiquer avec la BDD il faut un EntityManager !!

            $this->entityManager->persist($manga); //Fige les données de $manga

            $this->entityManager->flush(); //Sauvegarde les données dans la BDD

            return $this->redirectToRoute('manga');


        }

        return $this->render('manga/new.html.twig', [
            'form_manga'=>$form->createView()
    ]);
    }
}
