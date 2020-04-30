<?php

namespace App\Controller\Admin;

use App\Entity\KenCategories;
use App\Form\KenCategoriesType;
use App\Repository\KenCategoriesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/ken/categories")
 */
class KenCategoriesController extends AbstractController
{
    /**
     * @Route("/", name="ken_categories_index", methods={"GET"})
     */
    public function index(KenCategoriesRepository $kenCategoriesRepository): Response
    {
        return $this->render('ken_categories/index.html.twig', [
            'ken_categories' => $kenCategoriesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="ken_categories_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $kenCategory = new KenCategories();
        $form = $this->createForm(KenCategoriesType::class, $kenCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($kenCategory);
            $entityManager->flush();

            return $this->redirectToRoute('ken_categories_index');
        }

        return $this->render('ken_categories/new.html.twig', [
            'ken_category' => $kenCategory,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ken_categories_show", methods={"GET"})
     */
    public function show(KenCategories $kenCategory): Response
    {
        return $this->render('ken_categories/show.html.twig', [
            'ken_category' => $kenCategory,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="ken_categories_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, KenCategories $kenCategory): Response
    {
        $form = $this->createForm(KenCategoriesType::class, $kenCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ken_categories_index');
        }

        return $this->render('ken_categories/edit.html.twig', [
            'ken_category' => $kenCategory,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ken_categories_delete", methods={"DELETE"})
     */
    public function delete(Request $request, KenCategories $kenCategory): Response
    {
        if ($this->isCsrfTokenValid('delete'.$kenCategory->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($kenCategory);
            $entityManager->flush();
        }

        return $this->redirectToRoute('ken_categories_index');
    }
}
