<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class CardDeckController extends Controller
{
    /**
     * @Route("/{username}/deck", name="deck_overview")
     * @Security("has_role('ROLE_USER')")
     */
    public function deckOverviewAction(Request $request, $username)
    {
        return $this->render('start/deck_overview.html.twig', [
            'header_headline' => 'Deine Decks'
        ]);
    }


    /**
     * @Route("/{username}/deck/{deckname}", name="flashcard_trainView")
     * @Security("has_role('ROLE_USER')")
     */
    public function flashcardTrainAction(Request $request, $username, $deckname)
    {
        return $this->render('start/flashcard_train_view.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
}
