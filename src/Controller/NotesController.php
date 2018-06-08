<?php

namespace App\Controller;

use App\Entity\Note;
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


class NotesController extends Controller
{
    /**
     * @Route("/notes/page/{id}", name="notes")
     */
    public function index($id)
    {
        $em = $this->getDoctrine()->getRepository(Note::class);

        $notes = $em->findBy(['page' => $id],['conf' => 'Desc','creation_date' => 'DESC']);


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
        $json = $serializer->serialize($notes, 'json');

        $response =array(
            'code' => 0,
            'errors' =>null,
            'result' =>json_decode($json)
        );

        return new JsonResponse($response);
    }



}
