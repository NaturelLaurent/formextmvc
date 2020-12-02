<?php


namespace App\Controller;


use App\Entity\Article;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use ApiPlatform\Core\Validator\ValidatorInterface;
use Doctrine\DBAL\Exception;

class ArticleController extends AbstractController
{
    /**
     * @Route("/article", name="article_new", methods={"POST"})
     */
    public function articleNew(Request $request, ValidatorInterface $validator, SerializerInterface $serializer, EntityManagerInterface $em): Response
    {
        try {
            $json = $request->getContent();

            $article = $serializer->deserialize($json, Article::class, 'json');

            $errors = $validator->validate($article);
            if ($errors) {
                return $this->json($errors, Response::HTTP_BAD_REQUEST);
            }

            $em->persist($article);
            $em->flush();

            return $this->json($article, Response::HTTP_CREATED, [], ['groups' => 'article:read']);
        } catch (Exception $e) {
            return $this->json(['db' => 'db incorrect', 'res' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        } catch (\Exception $e) {
            return $this->json(['message' => $e->getMessage()], Response::HTTP_FORBIDDEN);
        }
    }
}