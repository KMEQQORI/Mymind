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

class TachesController extends Controller
{
    /**
     *
     * @Route("/Taches/Generate", name="GenTaches")
     */
    public function Generate_Categories()
    {
        $em = $this->getDoctrine()->getManager();
        $number = mt_rand(0, 100);

        $tache= new Tache();
        $tache->setTitreTache("Une tache Generer");
        $tache->setDescTache("une description magnigique");
        $tache->setPersTache("49");
        $tache->setValueTache("500");

        $goal=$this->getDoctrine()->getRepository(Goal::class)->find(3);

        $tache->setGoal($goal);

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $em->persist($tache);

        // actually executes the queries (i.e. the INSERT query)
        $em->flush();

        return new Response('La tache a ete merveuilleusement Saved new product with id '.$tache->getId());

    }

    /**
     * @Route("/Taches",name="AllTaches")
     */

    public function showAllTaches()
    {
        $em = $this->getDoctrine()->getRepository(Tache::class);
        $tache = $em->findAll();
        ;

        $encoders = array( new JsonEncoder());
        $normalizer = new ObjectNormalizer();
        $normalizer->setIgnoredAttributes(array('goal'));
        $normalizer->setCircularReferenceLimit(0);
        // Add Circular reference handler
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId();
        });
        $normalizers = array($normalizer);


        $serializer = new Serializer($normalizers, $encoders);
        $json = $serializer->serialize($tache, 'json');

        $response =array(
            'code' => 0,
            'message' => 'tache get it',
            'errors' =>null,
            'result' =>json_decode($json)
        );

        return new JsonResponse($response);
    }

    /**
     * @Route("/Taches/Done",name="AllDoneTaches")
     */

    public function showAllDoneTaches()
    {
        $em = $this->getDoctrine()->getRepository(Tache::class);
        $tache = $em->findAllDoneTache();
        ;

        $encoders = array( new JsonEncoder());
        $normalizer = new ObjectNormalizer();
        $normalizer->setIgnoredAttributes(array('taches',''));
        $normalizer->setCircularReferenceLimit(-1);
        // Add Circular reference handler
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId();
        });
        $normalizers = array($normalizer);


        $serializer = new Serializer($normalizers, $encoders);
        $json = $serializer->serialize($tache, 'json');

        $response =array(
            'code' => 0,
            'message' => 'tache get it',
            'errors' =>null,
            'result' =>json_decode($json)
        );

        return new JsonResponse($response);
    }





    /**
     * @Route("/Taches/InProgress",name="AllInProgressTaches")
     */

    public function showAllInProgressTaches()
    {
        $em = $this->getDoctrine()->getRepository(Tache::class);
        $tache = $em->findAllInProgressTache();

        $encoders = array( new JsonEncoder());
        $normalizer = new ObjectNormalizer();
        $normalizer->setIgnoredAttributes(array('taches','goals'));
        $normalizer->setCircularReferenceLimit(-1);
        // Add Circular reference handler
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId();
        });
        $normalizers = array($normalizer);


        $serializer = new Serializer($normalizers, $encoders);
        $json = $serializer->serialize($tache, 'json');

        $response =array(
            'code' => 0,
            'message' => 'tache get it',
            'errors' =>null,
            'result' =>json_decode($json)
        );

        return new JsonResponse($response);
    }


    /**
     * @Route("/Tache/{id}",name="ShowTache")
     */

    public function showTache($id)
    {
        $em = $this->getDoctrine()->getRepository(Tache::class);
        $tache = $em->find($id);

        $encoders = array( new JsonEncoder());
        $normalizer = new ObjectNormalizer();
        $normalizer->setIgnoredAttributes(array('goal'));
        $normalizer->setCircularReferenceLimit(0);
        // Add Circular reference handler
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId();
        });
        $normalizers = array($normalizer);


        $serializer = new Serializer($normalizers, $encoders);
        $json = $serializer->serialize($tache, 'json');

        $response =array(
            'code' => 0,
            'message' => 'tache get it',
            'errors' =>null,
            'result' =>json_decode($json)
        );

        return new JsonResponse($response);
    }


    /**
     * @Route("/Tache/Done/{id}",name="DoneTache")
     */

    public function doneTache($id)
    {
        $em = $this->getDoctrine()->getManager();

        $tache = $em->getRepository(Tache::class)->find($id);
        $tache->setPersTache(100);

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $em->persist($tache);

        // actually executes the queries (i.e. the INSERT query)
        $em->flush();


        return new  JsonResponse( array(
            'code' => 0,
            'message' => 'tache fini avec success',
            'errors' =>null,
            'result' => 'tache fini'
        ));
    }


    /**
     * @Route("/Tache/UnDone/{id}",name="UnDoneTache")
     */

    public function unDoneTache($id)
    {
        $em = $this->getDoctrine()->getManager();

        $tache = $em->getRepository(Tache::class)->find($id);
        $tache->setPersTache(0);

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $em->persist($tache);

        // actually executes the queries (i.e. the INSERT query)
        $em->flush();


        return new  JsonResponse( array(
            'code' => 0,
            'message' => 'tache fini avec success',
            'errors' =>null,
            'result' => 'tache reOpen'
        ));
    }


    /**
     * @Route("/Taches/Goal/{id}",name="TachesOfGOal")
     */

    public function showTachesOfGoal($id)
    {
        $em = $this->getDoctrine()->getRepository(Tache::class);
        $tache = $em->findAllGoal($id);


        $encoders = array( new JsonEncoder());
        $normalizer = new ObjectNormalizer();
        $normalizer->setIgnoredAttributes(array('goal'));
        $normalizer->setCircularReferenceLimit(0);
        // Add Circular reference handler
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId();
        });
        $normalizers = array($normalizer);


        $serializer = new Serializer($normalizers, $encoders);
        $json = $serializer->serialize($tache, 'json');

        $response =array(
            'code' => 0,
            'message' => 'tache get it',
            'errors' =>null,
            'result' =>json_decode($json)
        );
        return new JsonResponse($response);
    }


    /**
     * @Route("/Taches/Categorie/{id}",name="TachesOfCategorie")
     */

  public function showTachesOfCategorie($id)
    {
        $em = $this->getDoctrine()->getRepository(Tache::class);
        $tache = $em->findAllCategorie($id);


        $encoders = array( new JsonEncoder());
        $normalizer = new ObjectNormalizer();
        $normalizer->setIgnoredAttributes(array('goal'));
        $normalizer->setCircularReferenceLimit(0);
        // Add Circular reference handler
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId();
        });
        $normalizers = array($normalizer);


        $serializer = new Serializer($normalizers, $encoders);
        $json = $serializer->serialize($tache, 'json');

        $response =array(
            'code' => 0,
            'message' => 'tache get it',
            'errors' =>null,
            'result' =>json_decode($json)
        );
        return new JsonResponse($response);
    }


    /**
     * @Route("/Taches/Add", methods="POST")
     */

    public function AddNewTache(){

        $em = $this->getDoctrine()->getManager();
        $tache= new Tache();
        $tache->setTitreTache($_POST['titreTache']);
        $tache->setDescTache($_POST['descTache']);
        $tache->setPersTache(0);
        $tache->setCreationDateTache( new \DateTime($_POST['dateCreation']));
        $tache->setDeadLineTache(new \DateTime($_POST['deadLine']));
        $tache->setValueTache($_POST['valueTache']);



        $goal=$this->getDoctrine()->getRepository(Goal::class)->find($_POST['idGoal']);

        $tache->setGoal($goal);

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $em->persist($tache);

        // actually executes the queries (i.e. the INSERT query)
        $em->flush();


        $response =array(
            'code' => 0,
            'message' => 'tache cree',
            'errors' =>null,
            'result' =>"Task Created"
        );
        return new JsonResponse($response);


    }




}

?>