<?php

namespace App\Controller;

use App\Entity\Multa;
use App\Form\MultaType;
use App\Repository\MultaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/multa')]
class MultaController extends AbstractController
{
    #[Route('/', name: 'app_multa_index', methods: ['GET'])]
    public function index(MultaRepository $multaRepository): Response
    {
        return $this->render('multa/index.html.twig', [
            'multas' => $multaRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_multa_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $multum = new Multa();
        $form = $this->createForm(MultaType::class, $multum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($multum);
            $entityManager->flush();

            return $this->redirectToRoute('app_multa_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('multa/new.html.twig', [
            'multum' => $multum,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_multa_show', methods: ['GET'])]
    public function show(Multa $multum): Response
    {
        return $this->render('multa/show.html.twig', [
            'multum' => $multum,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_multa_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Multa $multum, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MultaType::class, $multum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_multa_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('multa/edit.html.twig', [
            'multum' => $multum,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_multa_delete', methods: ['POST'])]
    public function delete(Request $request, Multa $multum, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$multum->getId(), $request->request->get('_token'))) {
            $entityManager->remove($multum);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_multa_index', [], Response::HTTP_SEE_OTHER);
    }
}
