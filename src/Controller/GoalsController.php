<?php

namespace App\Controller;
use App\Entity\Tache;
use App\Entity\Categorie;
use App\Entity\Goal;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;




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
        $normalizer->setIgnoredAttributes(array('taches','categorie'));
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
        $json = $serializer->serialize($goal, 'json');

        $response =array(
            'code' => 0,
            'message' => 'tache get it',
            'errors' =>null,
            'result' =>json_decode($json)
        );
        return new JsonResponse($response);
    }




}
