<?php

namespace App\Controller;

use App\Entity\Address;
use App\Entity\Cities;
use App\Entity\Hlavni;
use App\Entity\Users;
use App\Form\AddressFormType;
use App\Form\HlavniType;
use App\Repository\AddressRepository;
use App\Repository\CitiesRepository;
use App\Repository\UsersRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Asset\UrlPackage;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BartaController extends BaseController
{

    /**
     * @return Response
     * @Route("/default", name="default")
     */
    public function default(ManagerRegistry $doctrine, Request $request): Response
    {

        $hlavni = new Hlavni();
        $form = $this->createForm(HlavniType::class, $hlavni);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $doctrine->getManager();
            $em->persist($hlavni);
            $em->flush();
        }

        // preda data do sablony
        return $this->render("Barta/default.html.twig", ["TITLE" => "Default", 'form' => $form->createView()]);
    }

    /**
     * @return Response
     * @Route("/edit", name="edit")
     */
    public function edit(): Response
    {

        // preda data do sablony
        return $this->render("Barta/edit.html.twig", ["TITLE" => "Edit"]);
    }

    /**
     * @return Response
     * @Route("/add", name="add")
     */
    public function add(): Response
    {

        // preda data do sablony
        return $this->render("Barta/add.html.twig", ["TITLE" => "Add"]);
    }

    /**
     * @return Response
     * @Route("/detail", name="detail")
     */
    public function detail(): Response
    {

        // preda data do sablony
        return $this->render("Barta/detail.html.twig", ["TITLE" => "Detail"]);
    }

}