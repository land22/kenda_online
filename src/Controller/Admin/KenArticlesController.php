<?php

namespace App\Controller\Admin;

use App\Entity\KenArticles;
use App\Form\KenArticlesType;
use App\Repository\KenArticlesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/ken/articles")
 */
class KenArticlesController extends AbstractController
{
    /**
     * @Route("/", name="ken_articles_index", methods={"GET"})
     */
    public function index(KenArticlesRepository $kenArticlesRepository): Response
    {
        return $this->render('ken_articles/index.html.twig', [
            'ken_articles' => $kenArticlesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="ken_articles_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $kenArticle = new KenArticles();
        $form = $this->createForm(KenArticlesType::class, $kenArticle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($kenArticle);
            $entityManager->flush();

            return $this->redirectToRoute('ken_articles_index');
        }

        return $this->render('ken_articles/new.html.twig', [
            'ken_article' => $kenArticle,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ken_articles_show", methods={"GET"})
     */
    public function show(KenArticles $kenArticle): Response
    {
        return $this->render('ken_articles/show.html.twig', [
            'ken_article' => $kenArticle,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="ken_articles_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, KenArticles $kenArticle): Response
    {
        $form = $this->createForm(KenArticlesType::class, $kenArticle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ken_articles_index');
        }

        return $this->render('ken_articles/edit.html.twig', [
            'ken_article' => $kenArticle,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ken_articles_delete", methods={"DELETE"})
     */
    public function delete(Request $request, KenArticles $kenArticle): Response
    {
        if ($this->isCsrfTokenValid('delete'.$kenArticle->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($kenArticle);
            $entityManager->flush();
        }

        return $this->redirectToRoute('ken_articles_index');
    }
}
