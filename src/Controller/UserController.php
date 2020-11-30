<?php


namespace App\Controller;


use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\DenormalizableInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="list_user", methods={"GET"})
     */
    public function userLireMethodeUn(UserRepository $userRepository, NormalizerInterface $normalizer) : Response
    {
        $users = $userRepository->findAll();

        $userArray = $normalizer->normalize($users, null, ['groups' => 'user:read']);

        $json = json_encode($userArray);

        return new Response($json, Response::HTTP_OK, ['Content-Type' => "application/json"]);
    }

    /**
     * @Route("/user2", name="list_user2", methods={"GET"})
     */
    public function userLireMethodeDeux(UserRepository $userRepository, NormalizerInterface $normalizer) : Response
    {
        $users = $userRepository->findAll();

        $userArray = $normalizer->normalize($users, null, ['groups' => 'user:read']);

        return $this->json($userArray, Response::HTTP_OK);
    }

    /**
     * @Route("/user3", name="list_user3", methods={"GET"})
     */
    public function userLireMethodeTrois(UserRepository $userRepository) : Response
    {
        return $this->json($userRepository->findAll(), Response::HTTP_OK, [], ['groups' => 'user:read']);
    }

    /**
     * @Route("user", name="user_new", methods={"POST"})
     */
    public function userNewMethodeUn(Request $request, SerializerInterface $serializer, EntityManagerInterface $em) : Response
    {
        $json = $request->getContent();
        $user = $serializer->deserialize($json, User::class, 'json');
        $em->persist($user);
        $em->flush();

        return $this->json($user, Response::HTTP_OK);
    }
}