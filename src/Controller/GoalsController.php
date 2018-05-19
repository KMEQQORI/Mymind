<?php

namespace App\Controller;
use App\Entity\Categorie;
use App\Entity\Goal;
use App\Entity\Tache;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;




class GoalsController extends Controller
{

    /**
     * @Route("/Goals",name="AllGoals")
     */

    public function showAllGoals()
    {
        $em = $this->getDoctrine()->getRepository(Goal::class);
        $goals = $em->findAll();



        $encoders = array( new JsonEncoder());
        $normalizer = new ObjectNormalizer();
        $normalizer->setIgnoredAttributes(array('goal','goals'));
        $normalizer->setCircularReferenceLimit(0);
        // Add Circular reference handler
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId();
        });
        $normalizers = array($normalizer);




        $serializer = new Serializer($normalizers, $encoders);
        $json = $serializer->serialize($goals, 'json');

        $response =array(
            'code' => 0,
            'message' => 'tache get it',
            'errors' =>null,
            'result' =>json_decode($json)
        );




        return new JsonResponse($response);
    }



    /**
     * @Route("/Goal/{id}",name="AllGoal")
     */

    public function showGoal($id)
    {
        $em = $this->getDoctrine()->getRepository(Goal::class);
        $goals = $em->find($id);

        $encoders = array( new JsonEncoder());
        $normalizer = new ObjectNormalizer();
        $normalizer->setIgnoredAttributes(array('categorie'));
        $normalizer->setCircularReferenceLimit(0);
        // Add Circular reference handler
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId();
        });
        $normalizers = array($normalizer);


        $serializer = new Serializer($normalizers, $encoders);
        $json = $serializer->serialize($goals, 'json');

        $response =array(
            'code' => 0,
            'message' => 'tache get it',
            'errors' =>null,
            'result' =>json_decode($json)
        );

        return new JsonResponse($response);
    }






    /**
     * @Route("/Goals/Categorie/{id}",name="GoalsOfCategorie")
     */


    public function showGoalsOfCategorie($id)
    {
        $em = $this->getDoctrine()->getRepository(Goal::class);
        $goal = $em->findAllCategorie($id);


        $encoders = array(new JsonEncoder());
        $normalizer = new ObjectNormalizer();
        $normalizer->setIgnoredAttributes(array('categorie'));
        $normalizer->setCircularReferenceLimit(0);
        // Add Circular reference handler
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId();
        });
        $normalizers = array($normalizer);


        $serializer = new Serializer($normalizers, $encoders);
        $json = $serializer->serialize($goal, 'json');

        $response = array(
            'code' => 0,
            'message' => 'tache get it',
            'errors' => null,
            'result' => json_decode($json)
        );


        return new JsonResponse($response);
    }

    /**
     * @Route("/Goals/Add", methods="POST")
     */

    public function AddNewGoal()
    {

        $em = $this->getDoctrine()->getManager();
        $goal= new Goal();
        $goal->setTitreGoal($_POST['titreGoal']);
        $goal->setDescGoal($_POST['descGoal']);
        $goal->setCreationDateGoal( new \DateTime($_POST['dateCreation']));

        $categorie=$this->getDoctrine()->getRepository(Categorie::class)->find($_POST['idCategorie']);
        $goal->setCategorie($categorie);

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $em->persist($goal);

        // actually executes the queries (i.e. the INSERT query)
        $em->flush();


        $response =array(
            'code' => 0,
            'message' => 'tache cree',
            'errors' =>null,
            'result' => $goal
        );
        return new JsonResponse($response);


    }


    /**
     * @Route("/Goal/Delete/{id}", methods="GET")
     */

    public function DeleteGoal($id)
    {
        $em = $this->getDoctrine()->getManager();
        $goal =  $this->getDoctrine()->getRepository(Goal::class)->find($id);

        $em->remove($goal);




        // actually executes the queries (i.e. the INSERT query)
        $em->flush();


        $response =array(
            'code' => 0,
            'message' => 'tache cree',
            'errors' =>null,
            'result' => " "
        );
        return new JsonResponse($response);


    }




}
