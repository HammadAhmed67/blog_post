<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    #[Route('/', name: 'app_post')]
    public function index(PostRepository $postRepository): Response
    {
        $post = $postRepository->findAll();
        return $this->render('post/index.html.twig', [
            'posts' => $post,
        ]);
    }

    #[Route('/post/{id?}', name: 'post_show')]
    public function custom(Request $request):Response {
        $id = $request->get(key:'id');
        return $this->render('post/show.html.twig', [
            'post_id' => $id
        ]);
}
}
