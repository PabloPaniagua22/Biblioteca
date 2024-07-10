<?php

namespace App\Controller;

use App\Entity\Bibliotecario;
use App\Form\Bibliotecario1Type;
use App\Repository\BibliotecarioRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/bibliotecario')]
class BibliotecarioController extends AbstractController
{
    #[Route('/', name: 'app_bibliotecario_index', methods: ['GET'])]
    public function index(BibliotecarioRepository $bibliotecarioRepository): Response
    {
        return $this->render('bibliotecario/index.html.twig', [
            'bibliotecarios' => $bibliotecarioRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_bibliotecario_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $bibliotecario = new Bibliotecario();
        $form = $this->createForm(Bibliotecario1Type::class, $bibliotecario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($bibliotecario);
            $entityManager->flush();

            return $this->redirectToRoute('app_bibliotecario_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('bibliotecario/new.html.twig', [
            'bibliotecario' => $bibliotecario,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_bibliotecario_show', methods: ['GET'])]
    public function show(Bibliotecario $bibliotecario): Response
    {
        return $this->render('bibliotecario/show.html.twig', [
            'bibliotecario' => $bibliotecario,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_bibliotecario_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Bibliotecario $bibliotecario, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(Bibliotecario1Type::class, $bibliotecario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_bibliotecario_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('bibliotecario/edit.html.twig', [
            'bibliotecario' => $bibliotecario,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_bibliotecario_delete', methods: ['POST'])]
    public function delete(Request $request, Bibliotecario $bibliotecario, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bibliotecario->getId(), $request->request->get('_token'))) {
            $entityManager->remove($bibliotecario);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_bibliotecario_index', [], Response::HTTP_SEE_OTHER);
    }
}
