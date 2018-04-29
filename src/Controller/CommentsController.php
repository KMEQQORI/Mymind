<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Tache;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class CommentsController extends Controller
{
    /**
     * @Route("/comments", name="comments")
     */
    public function index()
    {
        // replace this line with your own code!
        return $this->render('@Maker/demoPage.html.twig', [ 'path' => str_replace($this->getParameter('kernel.project_dir').'/', '', __FILE__) ]);
    }


    /**
     * @Route("/Tache/{id}/Comment/{commentaire}",name="CommentTache")
     */

    public function commentTache($id,$commentaire)
    {
        $em = $this->getDoctrine()->getManager();

        $tache = $em->getRepository(Tache::class)->find($id);
        $comment = new Comment();
        $comment->setCommentText($commentaire);
        $comment->setCreationDateComment(new \DateTime());
        $comment->setTache($tache);

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $em->persist($comment);
        // actually executes the queries (i.e. the INSERT query)
        $em->flush();


        return new  JsonResponse( array(
            'code' => 0,
            'message' => 'Commenter avec success',
            'errors' =>null,
            'result' => 'tache fini'
        ));
    }




}
