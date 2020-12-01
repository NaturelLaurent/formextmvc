<?php

namespace App\Controller;

use ApiPlatform\Core\Validator\ValidatorInterface;
use App\Entity\Article;
use App\Form\ArticleType;
use App\Repository\ArticleRepository;
use App\Repository\UserRepository;
use DateTime;
use Doctrine\DBAL\Exception;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class ArticleController extends AbstractController
{
    /**
     * @Route("/aticles", name="article_index", methods={"GET"})
     */
    public function index(ArticleRepository $articleRepository): Response
    {
        return $this->json($articleRepository->findAll(), Response::HTTP_OK);
    }

    /**
     * @Route("/article/new", name="article_new", methods={"POST"})
     */
    public function new(UserRepository $userRepository,Request $request, SerializerInterface $serializer, ValidatorInterface $validator, EntityManagerInterface $em): Response
    {
        try{
            $json = $request->getContent();
            dd($json);
            $article = $serializer->deserialize($json, Article::class, 'json');
            
            //$id = $article->getAuthor();
            //$user = $userRepository->find($id);
            $errors = $validator->validate($article);
            if($errors){
                return $this->json($errors, Response::HTTP_BAD_REQUEST);
            }
           
            //$article->setAuthor($user);
            $article->setCreatedAt(new DateTime);
            $em->persist($article);
            $em->flush();
            
            return $this->json($article, Response::HTTP_CREATED);
            
        } catch (Exception $e) {
            return $this->json(['db' => 'db incorrect'], Response::HTTP_FORBIDDEN);
        } catch (\Exception $e) {
            return $this->json(['message' => $e->getMessage()], Response::HTTP_FORBIDDEN);
        }
    }

    /**
     * @Route("/article/{id}", name="article_show", methods={"GET"})
     */
    public function show(Article $article): Response
    {
        return $this->render('article/show.html.twig', [
            'article' => $article,
        ]);
    }

    /**
     * @Route("/article/{id}/edit", name="article_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Article $article): Response
    {
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('article_index');
        }

        return $this->render('article/edit.html.twig', [
            'article' => $article,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/article/{id}", name="article_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Article $article): Response
    {
        if ($this->isCsrfTokenValid('delete'.$article->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($article);
            $entityManager->flush();
        }

        return $this->redirectToRoute('article_index');
    }
}
