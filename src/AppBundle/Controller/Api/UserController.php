<?php
/**
 * Created by PhpStorm.
 * User: Ed
 * Date: 21.11.2017
 * Time: 19:05
 */

namespace AppBundle\Controller\Api;

use AppBundle\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Tests\Encoder\PasswordEncoder;
use AppBundle\Entity\User;
use AppBundle\Repository\UserRepository;


class UserController extends Controller
{

    /**
     * @Route("/api/user/post", name="user_register")
     */
    public function registerAction(Request $request)
    {
//        $passwordEncoder = new PasswordEncoder();

        $head = $request->getMethod();

        //TODO differentiate between http and json request

//        $body = $request->getContent();
//        $data = json_decode($body);
        var_dump($head);
        var_dump($request->get("email"));
        exit();
        // 1) build the form
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($data);
        if ($form->isSubmitted() && $form->isValid()) {

            // 3) Encode the password (you could also do this via Doctrine listener)
//            $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);

            // 4) save the User!
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user

            $response =  new Response("Registierung erfolgreich, bitte E-Mail Adresse bestätigen", 201);
        }

        $encoded_response =  json_encode($response);

        return new Response($encoded_response,400);
    }

    /**
     * @Route("/api/user/get", name="user_login")
     * @Method({"Get"})
     */
    public function loginAction(Request $request)
    {
        $head = $request->getContentType();

        //TODO differentiate between http and json request

        $body = $request->getContent();
        $data = json_decode($body);

        $user = $this->getDoctrine()->getRepository(User::class)->loadUserByUsername($data['email']);

        return new Response("it worked", 200);
    }
}