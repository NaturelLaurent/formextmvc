<?php


namespace App\Controller;


use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class UserController extends AbstractController
{
    /**
     * @Route("/user1", name="list_user", methods={"GET"})
     */
    public function userLireMethodeUn(UserRepository $userRepository, NormalizerInterface $normalizer) : Response
    {
        $users = $userRepository->findAll();

        $userArray = $normalizer->normalize($users);

        $json = json_encode($userArray);

        return new Response($json, Response::HTTP_OK, ['Content-Type' => "application/json"]);
    }
}