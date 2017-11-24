<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

error_reporting(E_ALL);
ini_set("display_errors", 1);

class CardDeckController extends Controller
{
    /**
     * @Route("/{username}/deck", name="deck_overview")
     * @Security("has_role('ROLE_USER')")
     */
    public function deckOverviewAction(Request $request, $username)
    {
        $sessionUsername = $this->get('security.token_storage')->getToken()->getUser()->getUsername();

        // check username from url
        if($username !== $sessionUsername){
            return $this->redirectToRoute("homepage");
        }

        return $this->render('start/deck_overview.html.twig', [
            'header_headline' => 'Deine Kartendecks'
        ]);
    }


    /**
     * @Route("/{username}/deck/{deckname}/train", name="flashcard_trainView")
     * @Security("has_role('ROLE_USER')")
     */
    public function flashcardTrainAction(Request $request, $username, $deckname)
    {
        $sessionUsername = $this->get('security.token_storage')->getToken()->getUser()->getUsername();

        // check username from url
        if($username !== $sessionUsername){
            return $this->redirectToRoute("homepage");
        }

        return $this->render('start/flashcard_train_view.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/{username}/deck/add", name="add_deck")
     * @Security("has_role('ROLE_USER')")
     */
    public function apiDeckAddAction(Request $request, $username)
    {
        $sessionUsername = $this->get('security.token_storage')->getToken()->getUser()->getUsername();

        // check username from url
        if($username !== $sessionUsername){
            return $this->redirectToRoute("homepage");
        }


        // Check Parameter wenn nicht valide redirect with error message
        if(
            empty($request->get("deckname")) ||
            strlen(trim($request->get("deckname"))) < 3 ||
            strlen(trim($request->get("deckname"))) > 15 ||
            empty($request->get("deck-share-code")) ||
            strlen(trim($request->get("deck-share-code"))) !== 10
        ){
            return $this->redirectWithMessage(
                "deck_overview",
                "Das Formular war nicht valide.",
                array('username' => $sessionUsername)
            );
        }

        //TODO check deck limit if no premium user
        //TODO check if deckname already exists for user


        // TODO check if cards submitted if yes check validation


        // TODO insert deckname and cards to user (Service erstellen)
        // TODO ggf. für die validierungen auch eine extra Klasse erstellen ???

        var_dump($request->get("card"));
        exit();

        return $this->render('start/deck_overview.html.twig', [
            'header_headline' => 'Deine Kartendecks'
        ]);
    }

}
