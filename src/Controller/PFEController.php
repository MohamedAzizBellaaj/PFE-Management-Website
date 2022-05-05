<?php

namespace App\Controller;

use App\Entity\PFE;
use App\Form\PFEType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/pfe')]
class PFEController extends AbstractController
{
    #[Route('/add', name:'PFE.add')]
function add(Request $request): Response
    {
    $PFE = new PFE();
    $form = $this->createForm(PFEType::class, $PFE);
    $form->handleRequest($request);
    if ($form->isSubmitted()) {
        $this->manager->persist($PFE);
        $this->manager->flush();
    }
    return $this->render('pfe/index.html.twig', [
        'form' => $form->createView(),
    ]);
}
}