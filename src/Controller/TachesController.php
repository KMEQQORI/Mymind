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
     * @Route("/Taches/InProgress/Likes/{id}",name="AllInProgressByLikesTaches")
     */

    public function showAllInProgressByLikesTaches($id)
    {
        $em = $this->getDoctrine()->getRepository(Tache::class);

        if($id == 0)
        {
            $inProgress = $em->findBy(['Wip' => '100'],['Conf' => 'DESC']);
            $toDo= $em->findBy(['Pers_Tache' => '0','Wip' => '0'],['Conf' => 'DESC']);
        }
        else
        {
            $inProgress = $em->findBy(['Wip' => '100', "goal" =>$id],['Conf' => 'DESC']);
            $toDo= $em->findBy(['Pers_Tache' => '0','Wip' => '0', "goal" =>$id],['Conf' => 'DESC']);
        }



        $encoders = array( new JsonEncoder());
        $normalizer = new ObjectNormalizer();
        $normalizer->setIgnoredAttributes(array('taches','goals'));
        $normalizer->setCircularReferenceLimit(-1);
        // Add Circular reference handler
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId();
        });
        $normalizers = array($normalizer);

        if($inProgress == NULL)
        {
            $taskPage=["message"=>"you don't have any tasks in Progress ,What the hell are you doing !!!!","toDo"=>$toDo];
        }
        elseif($inProgress == NULL && $toDo == NULL)
        {
            $taskPage=["message"=>"You don't have any tasks to Do or In progress Please add new tasks in your goal page","toDo"=>$toDo];
        }
        else
        {
            $taskPage=["inProgress"=>$inProgress,"toDo"=>$toDo];
        }


        $serializer = new Serializer($normalizers, $encoders);
        $json = $serializer->serialize($taskPage, 'json');

        $response =array(
            'code' => 0,
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
        //$tache = $em->find($id);

        /*
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
        */

        $response =array(
            'code' => 0,
            'message' => 'tache get it',
            'errors' =>null,
            'result' => 'yep'
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
        $tache->setWip(0);

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
     * @Route("/Tache/Wip/{id}",name="WipTache")
     */

    public function WipToggleTache($id)
    {
        $em = $this->getDoctrine()->getManager();

        $tache = $em->getRepository(Tache::class)->find($id);

        if( $tache->getWip() == 100)
            $tache->setWip(0);
        else
            $tache->setWip(100);

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
     * @Route("/Tache/Conf/{id}",name="ConfTache")
     */

    public function ConfTache($id)
    {
        $em = $this->getDoctrine()->getManager();

        $tache = $em->getRepository(Tache::class)->find($id);

        $tache->setConf($tache->getConf()+1);

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $em->persist($tache);

        // actually executes the queries (i.e. the INSERT query)
        $em->flush();


        return new  JsonResponse( array(
            'code' => 0,
            'message' => 'tache Confirmer avec succes',
            'errors' =>null
        ));
    }


    /**
     * @Route("/Tache/Cancel/{id}",name="CancelTache")
     */

    public function CancelTache($id)
    {
        $em = $this->getDoctrine()->getManager();

        $tache = $em->getRepository(Tache::class)->find($id);
        $tache->setPersTache(-100);

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
     * @Route("/Goal/Done/{id}",name="DoneGoal")
     */

    public function DoneGoal($id)
    {
        $em = $this->getDoctrine()->getManager();

        $tasks = $em->getRepository(Tache::class)->findAllGoal($id);

        foreach ($tasks as $task)
        {
            $task->setPersTache(100);
            $em->persist($task);
        }


        // tell Doctrine you want to (eventually) save the Product (no queries yet)


        // actually executes the queries (i.e. the INSERT query)
        $em->flush();



        $response =array(
            'code' => 0,
            'message' => 'tache get it',
            'errors' =>null,
            'result' =>"Goal Done"
        );

        return new JsonResponse($response);
    }

    /**
     * @Route("/Goal/UnDone/{id}",name="UnDoneGoal")
     */

    public function UnDoneGoal($id)
    {
        $em = $this->getDoctrine()->getManager();

        $tasks = $em->getRepository(Tache::class)->findAllGoal($id);

        foreach ($tasks as $task)
        {
            $task->setPersTache(0);
            $em->persist($task);
        }


        // tell Doctrine you want to (eventually) save the Product (no queries yet)


        // actually executes the queries (i.e. the INSERT query)
        $em->flush();



        $response =array(
            'code' => 0,
            'message' => 'tache get it',
            'errors' =>null,
            'result' =>"Goal Done"
        );

        return new JsonResponse($response);
    }

    /**
     * @Route("/Goal/Cancel/{id}",name="CancelGoal")
     */

    public function CancelGoal($id)
    {
        $em = $this->getDoctrine()->getManager();

        $tasks = $em->getRepository(Tache::class)->findAllGoal($id);

        foreach ($tasks as $task)
        {
            $task->setPersTache(-100);
            $em->persist($task);
        }


        // tell Doctrine you want to (eventually) save the Product (no queries yet)


        // actually executes the queries (i.e. the INSERT query)
        $em->flush();



        $response =array(
            'code' => 0,
            'message' => 'tache get it',
            'errors' =>null,
            'result' =>"Goal Done"
        );

        return new JsonResponse($response);
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
        $tache->setWip(0);
        $tache->setConf(0);



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


    /**
     * @Route("/Taches/Duplicate/{id}", methods="GET")
     */

    public function DuplicateTache($id){

        $em = $this->getDoctrine()->getManager();
        $tache= new Tache();
        $old=$this->getDoctrine()->getRepository(Tache::class)->find($id);

        $tache->setTitreTache($old->getTitreTache());
        $tache->setDescTache($old->getDescTache());
        $tache->setPersTache(0);
        $tache->setCreationDateTache(new \DateTime($old->getCreationDateTache()));
        $tache->setDeadLineTache(new \DateTime($old->getDeadLineTache()));
        $tache->setValueTache($old->getValueTache());
        $tache->setGoal($old->getGoal());
        $tache->setWip($old->getWip());
        $tache->setConf($old->getConf());

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



    /**
     * @Route("/Taches/Delete/{id}", methods="GET")
     */

    public function DeleteTache($id)
    {

        $em = $this->getDoctrine()->getManager();
        $tache = $this->getDoctrine()->getRepository(Tache::class)->find($id);

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $em->remove($tache);

        // actually executes the queries (i.e. the INSERT query)
        $em->flush();


        $response =array(
            'code' => 0,
            'message' => 'tache cree',
            'errors' =>null,
            'result' =>"Task Deleted"
        );
        return new JsonResponse($response);


    }




}

?>