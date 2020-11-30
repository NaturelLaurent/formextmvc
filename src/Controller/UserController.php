<?php

namespace App\Controller;

use ApiPlatform\Core\Validator\ValidatorInterface;
use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\DBAL\Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Serializer\SerializerInterface;


class UserController extends AbstractController
{

    /**
     * @Route("/user", name="user_index", methods={"GET"})
     */
    public function index(UserRepository $userRepository): Response
    {
        return $this->json($userRepository->findAll(), Response::HTTP_OK);
    }

    /**
     * @Route("/user", name="user_new", methods={"POST"})
     */
    public function new(Request $request ,
                SerializerInterface $ser,
                ValidatorInterface $validator,
                UserPasswordEncoderInterface $encoder
    ): Response
    {
       $json = $request->getContent();

       $user = $ser->deserialize($json, User::class, 'json');
       
       $errors = $validator->validate($user);
       if ($errors) {
           return $this->json($errors, Response::HTTP_BAD_REQUEST);
       }

             $user->setPassword($encoder->encodePassword($user, $user->getPassword()));
       
             try {
                 $entityManager = $this->getDoctrine()->getManager();
                 $entityManager->persist($user);
                 $entityManager->flush();
                 
             } catch (Exception $e) {
                return $this->json(['message' => $e->getMessage()], Response::HTTP_FORBIDDEN);
             }

             return $this->json(['message' => "utilisateur créer"], Response::HTTP_OK);

     
    }

    /**
     * @Route("/user/{id}", name="user_show", methods={"GET"})
     */
    public function show(User $user, UserRepository $repo): Response
    { 

        try {
            $user = $repo->findBy(['id'=>$user->getId()]);
            
        } catch (Exception $e) {
            return $this->json(['message' => 'utilisateur non trouvé'], Response::HTTP_NOT_FOUND);
        }

       
            return $this->json($user, Response::HTTP_OK);
        
       
    }

   
    /**
     * @Route("/user/{id}", name="user_delete", methods={"DELETE"})
     */
    public function delete( User $user): Response
    {

        
     try {
         $entityManager = $this->getDoctrine()->getManager();
         $entityManager->remove($user);
         $entityManager->flush();
         
     } catch (Exception $e) {
        return $this->json(['message' => $e->getMessage()], Response::HTTP_NOT_FOUND);
     }
     
     return $this->json(['message' => "utilisateur supprimer"], Response::HTTP_OK);
      
    }
}
