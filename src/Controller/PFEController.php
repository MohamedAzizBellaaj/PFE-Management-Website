<?php

namespace App\Controller;

use App\Entity\Entreprise;
use App\Entity\PFE;
use App\Form\PFEType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/pfe')]
class PFEController extends AbstractController
{
    #[Route('/add', name:'PFE.add')]
function add(ManagerRegistry $doctrine, Request $request): Response
    {
    $manager = $doctrine->getManager();
    $PFE = new PFE();
    $form = $this->createForm(PFEType::class, $PFE);
    $form->handleRequest($request);
    if ($form->isSubmitted()) {
        $manager->persist($PFE);
        $manager->flush();
        $this->addFlash(
            'success',
            'PFE registered successfully !'
        );
        return $this->render('pfe/info.html.twig', ['PFE' => $PFE]);

    }
    return $this->render('pfe/index.html.twig', [
        'form' => $form->createView(),
    ]);
}
#[Route('/list', name:'PFE.list')]
function listAll(ManagerRegistry $doctrine, ): Response
    {
    $repository = $doctrine->getRepository(Entreprise::class);
    $entrepriseList = $repository->findAll();

    return $this->render('pfe/list.html.twig', [
        'entrepriseList' => $entrepriseList,
    ]);
}
}