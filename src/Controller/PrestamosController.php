<?php

namespace App\Controller;

use App\Entity\Prestamos;
use App\Form\PrestamosType;
use App\Repository\PrestamosRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/prestamos')]
class PrestamosController extends AbstractController
{
    #[Route('/', name: 'app_prestamos_index', methods: ['GET'])]
    public function index(PrestamosRepository $prestamosRepository): Response
    {
        return $this->render('prestamos/index.html.twig', [
            'prestamos' => $prestamosRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_prestamos_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $prestamo = new Prestamos();
        $form = $this->createForm(PrestamosType::class, $prestamo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($prestamo);
            $entityManager->flush();

            return $this->redirectToRoute('app_prestamos_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('prestamos/new.html.twig', [
            'prestamo' => $prestamo,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_prestamos_show', methods: ['GET'])]
    public function show(Prestamos $prestamo): Response
    {
        return $this->render('prestamos/show.html.twig', [
            'prestamo' => $prestamo,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_prestamos_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Prestamos $prestamo, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PrestamosType::class, $prestamo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_prestamos_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('prestamos/edit.html.twig', [
            'prestamo' => $prestamo,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_prestamos_delete', methods: ['POST'])]
    public function delete(Request $request, Prestamos $prestamo, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$prestamo->getId(), $request->request->get('_token'))) {
            $entityManager->remove($prestamo);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_prestamos_index', [], Response::HTTP_SEE_OTHER);
    }
}
