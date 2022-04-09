<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ToDoController extends AbstractController
{
    #[Route('/', name: 'app_to_do')]
    public function index(Request $request): Response
    {
        $session=$request->getSession();
        $todos = array(
            'achat'=>'acheter clé usb',
            'cours'=>'Finaliser mon cours',
            'correction'=>'corriger mes examens'
        );

        foreach ($todos as $key=>$value)
            $session->set($key,$value);

        return $this->render('to_do/index.html.twig');
    }
}
