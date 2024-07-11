<?php

namespace App\Controller;

use App\Entity\Multas;
use App\Form\MultasType;
use App\Repository\MultasRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/multas')]
class MultasController extends AbstractController
{
    #[Route('/', name: 'app_multas_index', methods: ['GET'])]
    public function index(MultasRepository $multasRepository): Response
    {
        return $this->render('multas/index.html.twig', [
            'multas' => $multasRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_multas_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $multa = new Multas();
        $form = $this->createForm(MultasType::class, $multa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($multa);
            $entityManager->flush();

            return $this->redirectToRoute('app_multas_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('multas/new.html.twig', [
            'multa' => $multa,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_multas_show', methods: ['GET'])]
    public function show(Multas $multa): Response
    {
        return $this->render('multas/show.html.twig', [
            'multa' => $multa,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_multas_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Multas $multa, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MultasType::class, $multa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_multas_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('multas/edit.html.twig', [
            'multa' => $multa,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_multas_delete', methods: ['POST'])]
    public function delete(Request $request, Multas $multa, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$multa->getId(), $request->request->get('_token'))) {
            $entityManager->remove($multa);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_multas_index', [], Response::HTTP_SEE_OTHER);
    }
}
