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
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;

class UserController extends AbstractController
{
    /**
     * @Route("/users", name="user_index", methods={"GET"})
     */
    public function index(UserRepository $userRepository): Response
    {
        return $this->json($userRepository->findAll(), Response::HTTP_OK, [], ['groups' => 'user']);
    }

    /**
     * @Route("/user", name="user_new", methods={"POST"})
     */
    public function new(Request $request, SerializerInterface $serializer, ValidatorInterface $validator, EntityManagerInterface $em, UserPasswordEncoderInterface $passEncoder): Response
    {
        try {
            $json = $request->getContent();
            $user = $serializer->deserialize($json, User::class, 'json');

            $errors = $validator->validate($user);
            if ($errors) {
                return $this->json($errors, Response::HTTP_BAD_REQUEST);
            }
            $user->setPassword($passEncoder->encodePassword($user, $user->getPassword()));
            $em->persist($user);
            $em->flush();

            return $this->json([
                "Created" => [
                    "id" => $user->getId(),
                    "email" => $user->getEmail()
                ],
                "url" => $this->generateUrl(
                    'user_show',
                    [
                        "id" => $user->getId()
                    ],
                    UrlGeneratorInterface::ABSOLUTE_URL
                )], Response::HTTP_CREATED);
        } catch (Exception $e) {
            return $this->json(['db' => 'db incorrect'], Response::HTTP_FORBIDDEN);
        } catch (\Exception $e) {
            return $this->json(['message' => $e->getMessage()], Response::HTTP_FORBIDDEN);
        }
    }

    /**
     * @Route("/user/{id}", name="user_show", methods={"GET"}, requirements={
     *  "id" = "\d+"
     * })
     */
    public function show(UserRepository $userRepository, $id): Response
    {

        return $this->json($userRepository->find($id), Response::HTTP_OK, [], ['groups' => 'user']);
    }

    /**
     * @Route("/user/{id}", name="user_edit", methods={"PUT"}, requirements={
     *  "id" = "\d+"
     * })
     */
    public function edit(Request $request, $id, UserRepository $userRepository, SerializerInterface $serializer, UserPasswordEncoderInterface $passEncoder, EntityManagerInterface $em): Response
    {
        $user = $userRepository->find($id);
        $json = $request->getContent();
        $userupdate = $serializer->deserialize($json, User::class, 'json');
        $user->setPassword($passEncoder->encodePassword($userupdate, $userupdate->getPassword()));
        $user->setEmail($userupdate->getEmail());
        $em->flush();

        return $this->json([
            "Modified" => [
                "id" => $user->getId(),
                "email" => $user->getEmail()
            ],
            "url" => $this->generateUrl(
                'user_show',
                [
                    "id" => $user->getId()
                ],
                UrlGeneratorInterface::ABSOLUTE_URL
            )], Response::HTTP_OK);
    }

    /**
     * @Route("/user/{id}", name="user_delete", methods={"DELETE"}, requirements={
     *  "id" = "\d+"
     * })
     */
    public function delete(UserRepository $userRepository, EntityManagerInterface $em, $id): Response
    {

        $user = $userRepository->find($id);
        $em->remove($user);
        $em->flush();

        return $this->json('l\utilisateur supprimé avec succes', Response::HTTP_OK);
    }
}
