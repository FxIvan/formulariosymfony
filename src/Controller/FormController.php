<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\UserType;
use App\Entity\Formdb;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;

class FormController extends AbstractController
{
    /**
     * @Route("/form", name="app_form")
     */
    public function index(Request $request , ManagerRegistry $doctrine): Response
    {
        $user = new Formdb();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request); //determino si fue enviado
        if($form->isSubmitted() && $form->isValid()){
            $em = $doctrine->getManager();//puedo guardar en la base de datos

            $em->persist($user);
            $em->flush();

            $this->addFlash('exito','Se ha registrado exitosamente');
            return $this->redirectToRoute('app_form');
        }

        return $this->render('form/index.html.twig', [
            "formulario"=>$form->createView()
        ]);
    }
}
