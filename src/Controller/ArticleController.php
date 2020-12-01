<?php

namespace App\Controller;

use ApiPlatform\Core\Validator\ValidatorInterface;
use App\Entity\Article;
use App\Repository\ArticleRepository;
use DateTime;
use Doctrine\DBAL\Exception;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Serializer\SerializerInterface;

class ArticleController extends AbstractController
{
    /**
     * @Route("/articles", name="article_index", methods={"GET"})
     */
    public function index(ArticleRepository $articleRepository): Response
    {
        return $this->json($articleRepository->findAll(), Response::HTTP_OK);
    }

    /**
     * @Route("/article", name="article_new", methods={"POST"})
     */
    public function new(Request $request, SerializerInterface $serializer, ValidatorInterface $validator, EntityManagerInterface $em): Response
    {
        try {
            $json = $request->getContent();
            $article = $serializer->deserialize($json, Article::class, 'json');

            $errors = $validator->validate($article);
            if ($errors) {
                return $this->json($errors, Response::HTTP_BAD_REQUEST);
            }

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
     * @Route("/article/{id}", name="article_show", methods={"GET"}, requirements={
     *  "id" = "\d+"
     * })
     */
    public function show(ArticleRepository $articleRepository, $id): Response
    {
        return $this->json($articleRepository->find($id), Response::HTTP_OK);
    }

    /**
     * @Route("/article/{id}", name="article_edit", methods={"PUT"}, requirements={
     *  "id" = "\d+"
     * })
     */
    public function edit($id,Request $request, ArticleRepository $articleRepository, SerializerInterface $serializerInterface, EntityManagerInterface $em) //: Response
    {
        $article = $articleRepository->find($id);
        $json = $request->getContent();
        $articleUpdate = $serializerInterface->deserialize($json, Article::class, 'json');
        $article->setTitle($articleUpdate->getTitle());
        $article->setContent($articleUpdate->getContent());

        $em->flush();

        return $this->json([
            "Modified" => [
                "id" => $article->getId(),
                "Title" => $article->getTitle()
            ],
            "url" => $this->generateUrl(
                'article_show',
                [
                    "id" => $article->getId()
                ],
                UrlGeneratorInterface::ABSOLUTE_URL
            )], Response::HTTP_OK);

    
    }

    /**
     * @Route("/article/{id}", name="article_delete", methods={"DELETE"}, requirements={
     *  "id" = "\d+"
     * })
     */
    public function delete(ArticleRepository $articleRepository, $id, EntityManagerInterface $em): Response
    {
        $article = $articleRepository->find($id);
        $em->remove($article);
        $em->flush();

        return $this->json('l\'article supprimé avec succes', Response::HTTP_OK);
    }
}
