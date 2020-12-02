<?php


namespace App\Controller;


use ApiPlatform\Core\Validator\ValidatorInterface;
use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\DBAL\Exception;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="list_user", methods={"GET"})
     */
    public function userLireMethodeUn(UserRepository $userRepository, NormalizerInterface $normalizer): Response
    {
        $users = $userRepository->findAll();

        $userArray = $normalizer->normalize($users, null, ['groups' => 'user:read']);

        $json = json_encode($userArray);

        return new Response($json, Response::HTTP_OK, ['Content-Type' => "application/json"]);
    }

    /**
     * @Route("/user2", name="list_user2", methods={"GET"})
     */
    public function userLireMethodeDeux(UserRepository $userRepository, NormalizerInterface $normalizer): Response
    {
        $users = $userRepository->findAll();

        $userArray = $normalizer->normalize($users, null, ['groups' => 'user:read']);

        return $this->json($userArray, Response::HTTP_OK);
    }

    /**
     * @Route("/user3", name="list_user3", methods={"GET"})
     */
    public function userLireMethodeTrois(UserRepository $userRepository): Response
    {
        return $this->json($userRepository->findAll(), Response::HTTP_OK, [], ['groups' => 'user:read']);
    }

    /**
     * @Route("user", name="user_new", methods={"POST"})
     */
    public function userNewMethodeUn(Request $request, ValidatorInterface $validator, SerializerInterface $serializer, EntityManagerInterface $em, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        try {
            $json = $request->getContent();
            $user = $serializer->deserialize($json, User::class, 'json');

            $errors = $validator->validate($user);
            if ($errors) {
                return $this->json($errors, Response::HTTP_BAD_REQUEST);
            }

            $user->setPassword($passwordEncoder->encodePassword($user, $user->getPassword()));
            $em->persist($user);
            $em->flush();

            return $this->json($user, Response::HTTP_CREATED);
        } catch (Exception $e) {
            return $this->json(['db' => 'db incorrect'], Response::HTTP_BAD_REQUEST);
        } catch (\Exception $e) {
            return $this->json(['message' => $e->getMessage()], Response::HTTP_FORBIDDEN);
        }
    }
}