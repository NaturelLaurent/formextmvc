<?php

namespace App\Controller;


use ApiPlatform\Core\Validator\ValidatorInterface;
use App\Entity\Article;
use App\Form\ArticleType;
use App\Repository\ArticleRepository;
use Doctrine\DBAL\Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Serializer\SerializerInterface;


class ArticleController extends AbstractController
{
    /**
     * @Route("/", name="article_index", methods={"GET"})
     */
    public function index(ArticleRepository $articleRepository): Response
    {
        return $this->json($articleRepository->findAll(), Response::HTTP_OK);
    }


    /**
     * @Route("/article", name="article_new", methods={"POST"})
     */
    public function new(
        Request $request,
        SerializerInterface $serialiser,
        ValidatorInterface $validator,
        UserPasswordEncoderInterface $encoder
    ): Response {
        $json = $request->getContent();

        $article = $serialiser->deserialize($json, Article::class, 'json');
      
        $errors = $validator->validate($article);
        if ($errors) {
            return $this->json($errors, Response::HTTP_BAD_REQUEST);
        }

      
        try {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($article);
            $entityManager->flush();
        } catch (Exception $e) {
            return $this->json(['message' => $e->getMessage()], Response::HTTP_FORBIDDEN);
        }

        return $this->json(['message' => "Article créer"], Response::HTTP_OK);
    }


    /**
     * @Route("/{id}", name="article_show", methods={"GET"})
     */
    public function show(Article $article,ArticleRepository $articleRepository): Response
    {
        try {
            $user = $articleRepository->findBy(['id'=>$article->getId()]);
            
        } catch (Exception $e) {
            return $this->json(['message' => 'Article non trouvé'], Response::HTTP_NOT_FOUND);
        }

       
            return $this->json($user, Response::HTTP_OK);
    }

  
    /**
     * @Route("/{id}", name="article_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Article $article): Response
    {
        try {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($article);
            $entityManager->flush();
            
        } catch (Exception $e) {
           return $this->json(['message' => $e->getMessage()], Response::HTTP_NOT_FOUND);
        }
        
        return $this->json(['message' => "Article supprimer"], Response::HTTP_OK);         
       
    }
}
