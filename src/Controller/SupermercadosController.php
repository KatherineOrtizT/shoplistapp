<?php

namespace App\Controller;

use App\Entity\Supermercados;
use App\Form\SupermercadosType;
use App\Repository\SupermercadosRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/supermercados')]
class SupermercadosController extends AbstractController
{
    #[Route('/', name: 'app_supermercados_index', methods: ['GET'])]
    public function index(SupermercadosRepository $supermercadosRepository): Response
    {
        return $this->render('supermercados/index.html.twig', [
            'supermercados' => $supermercadosRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_supermercados_new', methods: ['GET', 'POST'])]
    public function new(Request $request, SupermercadosRepository $supermercadosRepository): Response
    {
        $supermercado = new Supermercados();
        $form = $this->createForm(SupermercadosType::class, $supermercado);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $supermercadosRepository->save($supermercado, true);

            return $this->redirectToRoute('app_supermercados_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('supermercados/new.html.twig', [
            'supermercado' => $supermercado,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_supermercados_show', methods: ['GET'])]
    public function show(Supermercados $supermercado): Response
    {
        return $this->render('supermercados/show.html.twig', [
            'supermercado' => $supermercado,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_supermercados_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Supermercados $supermercado, SupermercadosRepository $supermercadosRepository): Response
    {
        $form = $this->createForm(SupermercadosType::class, $supermercado);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $supermercadosRepository->save($supermercado, true);

            return $this->redirectToRoute('app_supermercados_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('supermercados/edit.html.twig', [
            'supermercado' => $supermercado,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_supermercados_delete', methods: ['POST'])]
    public function delete(Request $request, Supermercados $supermercado, SupermercadosRepository $supermercadosRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$supermercado->getId(), $request->request->get('_token'))) {
            $supermercadosRepository->remove($supermercado, true);
        }

        return $this->redirectToRoute('app_supermercados_index', [], Response::HTTP_SEE_OTHER);
    }
}
