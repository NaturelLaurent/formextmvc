<?php

namespace App\Controller;

use ApiPlatform\Core\Validator\ValidatorInterface;
use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;



class CategorieController extends AbstractController
{
    /**
     * @Route("/categorie", name="categorie_index", methods={"GET"})
     */
    public function index(CategorieRepository $categorieRepository): Response
    {
        return $this->json($categorieRepository->findAll(), Response::HTTP_OK);
    }


    /**
     * @Route("/categorie", name="categorie_new", methods={"POST"})
     */
    public function new(
        Request $request,
        SerializerInterface $serialiser,
        ValidatorInterface $validator

    ): Response {
        $json = $request->getContent();

        $categorie = $serialiser->deserialize($json, Categorie::class, 'json');

        $errors = $validator->validate($categorie);
        if ($errors) {
            return $this->json($errors, Response::HTTP_BAD_REQUEST);
        }


        try {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($categorie);
            $entityManager->flush();
        } catch (Exception $e) {
            return $this->json(['message' => $e->getMessage()], Response::HTTP_FORBIDDEN);
        }

        return $this->json(['message' => "  Categorie créer"], Response::HTTP_OK);
    }


    /**
     * @Route("categorie/{id}", name="categorie_show", methods={"GET"})
     */
    public function show(Categorie  $categorie = null, CategorieRepository $categorieRepository): Response
    {
        if ($categorie) {
            return $this->json($categorie, Response::HTTP_OK);

        }else{
            return $this->json(['message' => 'Categorie non trouvé'], Response::HTTP_NOT_FOUND);
        }
    }


    /**
     * @Route("categorie/{id}", name="categorie_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Categorie $categorie): Response
    {
        try {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($categorie);
            $entityManager->flush();
        } catch (Exception $e) {
            return $this->json(['message' => $e->getMessage()], Response::HTTP_NOT_FOUND);
        }

        return $this->json(['message' => "Categorie supprimer"], Response::HTTP_OK);
    }
}
