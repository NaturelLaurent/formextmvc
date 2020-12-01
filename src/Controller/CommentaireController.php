<?php

namespace App\Controller;

use ApiPlatform\Core\Validator\ValidatorInterface;
use App\Entity\Commentaire;
use App\Form\CommentaireType;
use App\Repository\CommentaireRepository;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;


class CommentaireController extends AbstractController
{
    /**
     * @Route("/commentaire", name="commentaire_index", methods={"GET"})
     */
    public function index(CommentaireRepository $commentaireRepository): Response
    {
        return $this->json($commentaireRepository->findAll(), Response::HTTP_OK);
    }


    /**
     * @Route("/commentaire", name="commentaire_new", methods={"POST"})
     */
    public function new(
        Request $request,
        SerializerInterface $serialiser,
        ValidatorInterface $validator

    ): Response {
        $json = $request->getContent();

        $commentaire = $serialiser->deserialize($json, Commentaire::class, 'json');

        $errors = $validator->validate($commentaire);
        if ($errors) {
            return $this->json($errors, Response::HTTP_BAD_REQUEST);
        }


        try {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($commentaire);
            $entityManager->flush();
        } catch (Exception $e) {
            return $this->json(['message' => $e->getMessage()], Response::HTTP_FORBIDDEN);
        }

        return $this->json(['message' => "  Commentaire créer"], Response::HTTP_OK);
    }


    /**
     * @Route("commentaire/{id}", name="commentaire_show", methods={"GET"})
     */
    public function show(Commentaire  $commentaire = null, CommentaireRepository $commentaireRepository): Response
    {
        if ($commentaire) {
            return $this->json($commentaire, Response::HTTP_OK);

        }else{
            return $this->json(['message' => 'Commentaire non trouvé'], Response::HTTP_NOT_FOUND);
        }
    }


    /**
     * @Route("commentaire/{id}", name="commentaire_delete", methods={"DELETE"})
     */
    public function delete(Commentaire $commentaire): Response
    {
        try {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($commentaire);
            $entityManager->flush();
        } catch (Exception $e) {
            return $this->json(['message' => $e->getMessage()], Response::HTTP_NOT_FOUND);
        }

        return $this->json(['message' => "commentaire supprimer"], Response::HTTP_OK);
    }
}
