<?php

namespace App\Controller;

use App\Entity\ProductosLista;
use App\Form\ProductosListaType;
use App\Repository\ProductosListaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/productoslistas')]
class ProductosListaController extends AbstractController
{
    #[Route('/', name: 'app_productos_lista_index', methods: ['GET'])]
    public function index(ProductosListaRepository $productosListaRepository): Response
    {
        return $this->render('productos_lista/index.html.twig', [
            'productos_listas' => $productosListaRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_productos_lista_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ProductosListaRepository $productosListaRepository): Response
    {
        $productosListum = new ProductosLista();
        $form = $this->createForm(ProductosListaType::class, $productosListum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $productosListaRepository->save($productosListum, true);

            return $this->redirectToRoute('app_productos_lista_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('productos_lista/new.html.twig', [
            'productos_listum' => $productosListum,
            'form' => $form,
        ]);
    }

    // #[Route('/{id}', name: 'app_productos_lista_show', methods: ['GET'])]
    // public function show(ProductosLista $productosListum): Response
    // {
    //     return $this->render('productos_lista/show.html.twig', [
    //         'productos_listum' => $productosListum,
    //     ]);
    // }

    // #[Route('/{id}/edit', name: 'app_productos_lista_edit', methods: ['GET', 'POST'])]
    // public function edit(Request $request, ProductosLista $productosListum, ProductosListaRepository $productosListaRepository): Response
    // {
    //     $form = $this->createForm(ProductosListaType::class, $productosListum);
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $productosListaRepository->save($productosListum, true);

    //         return $this->redirectToRoute('app_productos_lista_index', [], Response::HTTP_SEE_OTHER);
    //     }

    //     return $this->renderForm('productos_lista/edit.html.twig', [
    //         'productos_listum' => $productosListum,
    //         'form' => $form,
    //     ]);
    // }

    // #[Route('/{id}', name: 'app_productos_lista_delete', methods: ['POST'])]
    // public function delete(Request $request, ProductosLista $productosListum, ProductosListaRepository $productosListaRepository): Response
    // {
    //     if ($this->isCsrfTokenValid('delete'.$productosListum->getId(), $request->request->get('_token'))) {
    //         $productosListaRepository->remove($productosListum, true);
    //     }

    //     return $this->redirectToRoute('app_productos_lista_index', [], Response::HTTP_SEE_OTHER);
    // }
}
