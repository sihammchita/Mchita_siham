<?php

namespace App\Controller;

use App\Entity\Realisteurs;
use App\Form\RealisteursType;
use App\Repository\RealisteursRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/realisteurs')]
class RealisteursController extends AbstractController
{
    #[Route('/', name: 'app_realisteurs_index', methods: ['GET'])]
    public function index(RealisteursRepository $realisteursRepository): Response
    {
        return $this->render('realisteurs/index.html.twig', [
            'realisteurs' => $realisteursRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_realisteurs_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $realisteur = new Realisteurs();
        $form = $this->createForm(RealisteursType::class, $realisteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($realisteur);
            $entityManager->flush();

            return $this->redirectToRoute('app_realisteurs_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('realisteurs/new.html.twig', [
            'realisteur' => $realisteur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_realisteurs_show', methods: ['GET'])]
    public function show(Realisteurs $realisteur): Response
    {
        return $this->render('realisteurs/show.html.twig', [
            'realisteur' => $realisteur,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_realisteurs_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Realisteurs $realisteur, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(RealisteursType::class, $realisteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_realisteurs_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('realisteurs/edit.html.twig', [
            'realisteur' => $realisteur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_realisteurs_delete', methods: ['POST'])]
    public function delete(Request $request, Realisteurs $realisteur, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$realisteur->getId(), $request->request->get('_token'))) {
            $entityManager->remove($realisteur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_realisteurs_index', [], Response::HTTP_SEE_OTHER);
    }
}
