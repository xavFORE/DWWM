<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
//use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Patronyme;
use App\Form\PatronymeType;
use App\Form\PatronymeBasicType;
use App\Form\PatronymeDateType;
use App\Form\PatronymePrenomType;



class MeteoController extends AbstractController
{
    /**
     * @Route("/meteo", name="meteo")
     */
    public function index(): Response
    {
        return $this->render('meteo/index.html.twig', [
            'controller_name' => 'MeteoController',
        ]);
    }
    
    public function temps(): Response
    {
        return new Response( "<h1>le temps est magnifique!</h1>" );
    }

    public function matin(): Response
    {
        return new Response( "<h1>ce matin le temps était brumeux !</h1>" );
    }

    public function previsionSP(): Response
    {
        return new Response( "<h1>vous devez préciser le moment.</h1>" );
    }

    public function prevision( $moment, $prenom ): Response
    {
        return $this->render(
            'meteo/meteo.html.twig', 
            [
                'moment' => $moment,
                'prenom' => $prenom
            ]);    
    }

    
    public function ajoutPatronyme( Request $request ): Response
    {
        $patro = new Patronyme();

        $formulaire = $this->createForm(PatronymeType::class, $patro);

        $formulaire->handleRequest($request);
        if ($formulaire->isSubmitted() && $formulaire->isValid()) 
        {
            $nom = $patro->getPrenom();
            $nom = strip_tags( $nom );
            $patro->setPrenom( $nom );
           
            //$entityManager = $this->getDoctrine()->getManager();
           
            $doctrine = $this->getDoctrine();
            $entityManager = $doctrine->getManager();
           
            $entityManager->persist($patro); // On confie notre entit&#xE9; &#xE0; l'entity manager (on persist l'entit&#xE9;)
            $entityManager->flush(); 
            return new Response( "formulaire OK $nom");
        }


        return $this->render(
            'meteo/ajoutPatronyme.html.twig', 
            [
                'formulaire' => $formulaire->createView()
            ]);    
    }


    
    public function affichePatronyme( $id ): Response
    {
            $doctrine = $this->getDoctrine();
            $entityManager = $doctrine->getManager();
           
            $patro = $doctrine->getRepository(Patronyme::class)->find($id);

            $lesPatro = $doctrine->getRepository(Patronyme::class)->findAll();

            return $this->render(
            'meteo/affichePatronyme.html.twig', 
            [
                'patro' => $patro,
                'listPatro' => $lesPatro,
                'id' => $id
            ]);    
    }


    public function affichePatronymeS(Patronyme $id ): Response
    {
            return $this->render(
            'meteo/affichePatronymeS.html.twig', 
            [
                'id' => $id
            ]);    
    }

    
    public function cherchePatronyme( Request $request ): Response
    {
        $patro = new Patronyme();
        $formulaire = $this->createForm(PatronymePrenomType::class, $patro);

        $formulaire->handleRequest($request);
        if ($formulaire->isSubmitted() && $formulaire->isValid()) 
        {
            $prenom = $patro->getPrenom();

            /*
            $doctrine = $this->getDoctrine();
            $entityManager = $doctrine->getManager();
            $patro = $doctrine->getRepository(Patronyme::class)->find($id);
            */

            return new Response( "<h1>formulaire OK $prenom</h1>");
        }


        return $this->render(
            'meteo/ajoutPatronyme.html.twig', 
            [
                'formulaire' => $formulaire->createView()
            ]);    
    }


}
