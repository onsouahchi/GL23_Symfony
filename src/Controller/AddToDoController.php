<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AddToDoController extends AbstractController
{
    #[Route('/add/{key}/{element}', name: 'app_add_to_do')]
    public function index(Request $request,$key,$element): Response
    {
        $session=$request->getSession();
        if (count($session->all())==0) {
            $this->addFlash("erreur", "Message Flash: La liste n'est pas encore initialisée.  On a initialisé une liste pour vous :)");
            return $this->forward('App\Controller\ToDoController::index');
        }
        if (!$session->has($key))
            $this->addFlash("succes","Message Flash: ToDo $key ajouté avec succés");
        else  $this->addFlash("succes","Message Flash: ToDo $key modifié avec succés");

        $session->set($key,$element);

        return $this->render('to_do/index.html.twig.');
    }
}
