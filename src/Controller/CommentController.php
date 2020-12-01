<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Form\CommentType;
use App\Repository\CommentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class CommentController extends AbstractController
{
    /**
     * @Route("/comments", name="comment_index", methods={"GET"})
     */
    public function index(CommentRepository $commentRepository)//: Response
    {
       
    }

    /**
     * @Route("/comment", name="comment_new", methods={"POST"})
     */
    public function new(Request $request)//: Response
    {
        
    }

    /**
     * @Route("/comment/{id}", name="comment_show", methods={"GET"})
     */
    public function show(Comment $comment)//: Response
    {
        
    }

    /**
     * @Route("/comment/{id}", name="comment_edit", methods={"PUT"})
     */
    public function edit(Request $request, Comment $comment)//: Response
    {
    
    }

    /**
     * @Route("/comment/{id}", name="comment_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Comment $comment)//: Response
    {
    
    }
}
