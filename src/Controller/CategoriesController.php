<?php

namespace App\Controller;

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

class CategoriesController extends Controller
{
    /**
     * @Route("/",name="home")
     */

    public function home()
    {
        return $this->render(
            'home.html.twig'
        );
    }

    /**
     *
     * @Route("/Categorie/Generate", name="GenCategories")
     */
    public function Generate_Categories()
    {

        $em = $this->getDoctrine()->getManager();
        $number = mt_rand(0, 100);

        $goal = new Goal();
        $goal->setTitreGoal("Un goal Generer");
        $goal->setDescGoal("une description magnigique");

        $categorie = new Categorie();
        $categorie->setTitreCategorie("un titre parfait pour ma categorie numero  $number ");
        $categorie->setDescCategorie("la Une tres bonne description numero  $number");
        $goal->setCategorie($categorie);


        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $em->persist($goal);
        $em->persist($categorie);


        // actually executes the queries (i.e. the INSERT query)
        $em->flush();

        return new Response('La categorie a ete merveuilleusement Saved new product with id '.$categorie->getId());

    }


    /**
     * @Route("/Categories",name="AllCategories")
     */

    public function showAllCategories()
    {
        $em = $this->getDoctrine()->getRepository(Categorie::class);
        $categories = $em->findAll();

        $encoders = array( new JsonEncoder());
        $normalizer = new ObjectNormalizer();
        $normalizer->setIgnoredAttributes(array('goals'));
        $normalizer->setCircularReferenceLimit(0);
        // Add Circular reference handler
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId();
        });
        $normalizers = array($normalizer);


        $serializer = new Serializer($normalizers, $encoders);
        $json = $serializer->serialize($categories, 'json');

        $response =array(
            'code' => 0,
            'message' => 'tache get it',
            'errors' =>null,
            'result' =>json_decode($json)
        );


        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Content-Type', 'application/json');

        return new JsonResponse($response);
    }



    /**
     * @Route("/Categorie/{id}",name="AllCategories")
     */

    public function showCategorie($id)
    {
        $em = $this->getDoctrine()->getRepository(Categorie::class);
        $categories = $em->find($id);

        $encoders = array( new JsonEncoder());
        $normalizer = new ObjectNormalizer();
        $normalizer->setCircularReferenceLimit(0);
        // Add Circular reference handler
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId();
        });
        $normalizers = array($normalizer);


        $serializer = new Serializer($normalizers, $encoders);
        $json = $serializer->serialize($categories, 'json');

        $response =array(
            'code' => 0,
            'message' => 'tache get it',
            'errors' =>null,
            'result' =>json_decode($json)
        );

        return new JsonResponse($response);
    }




}

?>