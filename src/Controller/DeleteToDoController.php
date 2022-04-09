<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeleteToDoController extends AbstractController
{
    #[Route('/delete/{key}', name: 'app_delete_to_do')]
    public function index(Request $request,$key): Response
    {
        $session=$request->getSession();
        if (count($session->all())==0) {
            $this->addFlash("erreur", "Message Flash: La liste n'est pas encore initialisée.  On a initialisé une liste pour vous :)");
            return $this->forward('App\Controller\ToDoController::index');
        }
        if ($session->has($key)) {
            $this->addFlash("succes", "Message Flash: ToDo $key supprimé avec succés");
            $session->remove($key);
        }
        else {
            $this->addFlash("erreur", "Message Flash: ToDo $key n'existe pas");
        }
        return $this->render('to_do/index.html.twig');
    }
}
