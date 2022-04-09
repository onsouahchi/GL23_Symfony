<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ResetToDoController extends AbstractController
{
    #[Route('/reset', name: 'app_reset_to_do')]
    public function index(Request $request): Response
    {
        $session=$request->getSession();
        if (count($session->all())==0) {
            $this->addFlash("erreur", "Message Flash: La liste n'est pas encore initialisée. On a initialisé une liste pour vous :)");
        }
        else {
            $session->clear();
            $this->addFlash("succes", "Message Flash: ToDo Reset efféctué avec succés");
        }
        return $this->forward('App\Controller\ToDoController::index');
    }
}