<?php

namespace App\Controller;

use App\Entity\Articles;
use App\Form\ArticlesType;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticlesController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    /**
     * @Route("/articles", name="articles")
     */
    public function index(): Response
    {
        $articles = $this->entityManager->getRepository(Articles::class)->findAll();
        return $this->render('articles/articles.html.twig', [
            'articles' => $articles,
        ]);
    }

    /**
     * @IsGranted("ROLE_ADMIN")
     * @Route("/articles/new", name="new_articles")
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function new(Request $request)
    {
        $articles= new Articles();
        $form_articles = $this->createForm(ArticlesType::class, $articles);

        $form_articles->handleRequest($request);

        if($form_articles->isSubmitted() && $form_articles->isValid())
        {
            $articles = $form_articles->getData();

            $this->entityManager->persist($articles);
            $this->entityManager->flush();

            return $this->redirectToRoute('articles');

        }
        return $this->render(
            'articles/new.html.twig',
            ['form_articles' => $form_articles->createView()]
        );


    }

    /**
     * @Route("/articles/edit/{id}", name="edit_articles")
     */
    public function edit(Request $request, Articles $articles, EntityManagerInterface $em)
    {
        $form_articles = $this->createForm(ArticlesType::class, $articles);

        $form_articles->handleRequest($request);
        if($form_articles->isSubmitted() && $form_articles->isValid())
        {
            $articles = $form_articles->getData();

            $em->persist($articles);
            $em->flush();

            $this->addFlash('success', 'Article Updated!');

            return $this->redirectToRoute('articles');


        }
        return $this->render(
            'articles/edit.html.twig',
            ['form_articles' => $form_articles->createView()]
        );


    }
}
