<?php

namespace App\Controller;

use App\Entity\Materiales;
use App\Form\MaterialesType;
use App\Repository\MaterialesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/materiales')]
class MaterialesController extends AbstractController
{
    #[Route('/', name: 'app_materiales_index', methods: ['GET'])]
    public function index(MaterialesRepository $materialesRepository): Response
    {
        return $this->render('materiales/index.html.twig', [
            'materiales' => $materialesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_materiales_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $materiale = new Materiales();
        $form = $this->createForm(MaterialesType::class, $materiale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($materiale);
            $entityManager->flush();

            return $this->redirectToRoute('app_materiales_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('materiales/new.html.twig', [
            'materiale' => $materiale,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_materiales_show', methods: ['GET'])]
    public function show(Materiales $materiale): Response
    {
        return $this->render('materiales/show.html.twig', [
            'materiale' => $materiale,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_materiales_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Materiales $materiale, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MaterialesType::class, $materiale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_materiales_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('materiales/edit.html.twig', [
            'materiale' => $materiale,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_materiales_delete', methods: ['POST'])]
    public function delete(Request $request, Materiales $materiale, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$materiale->getId(), $request->request->get('_token'))) {
            $entityManager->remove($materiale);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_materiales_index', [], Response::HTTP_SEE_OTHER);
    }
}
