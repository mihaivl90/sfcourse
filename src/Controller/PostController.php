<?php

namespace App\Controller;

use App\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/post", name="post.")
 */
class PostController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        return $this->render('post/index.html.twig', [
            'controller_name' => 'PostController',
        ]);
    }
    /**
     * @Route("/create", name="create")
     * @param Request $request
     * @return Response
     */

     public function create(Request $request): Response
     {
        // creeaza un nou post din title
         $post = new Post();

         $post->setTitle('Acesta va fi un title');

         // entity mananger
         $em = $this->getDoctrine()->getManager();

         $em->persist($post);

         // return a response
         return new Response('Post a fost creat');
    }
}
