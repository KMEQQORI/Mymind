<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ObservationsController extends Controller
{
    /**
     * @Route("/observations", name="observations")
     */
    public function index()
    {
        return $this->render('observations/index.html.twig', [
            'controller_name' => 'ObservationsController',
        ]);
    }
}
