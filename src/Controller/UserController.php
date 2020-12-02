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
use Symfony\Component\Serializer\Normalizer\DenormalizableInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;

class UserController extends AbstractController
{
    /**
    * @Route("/user", name="list_user", methods={"GET"})
    */
    public function userReadMethod(UserRepository $userRepository, NormalizerInterface $normalizer) : Response
    {
    
        $user = $userRepository->findAll();

        $userArray = $normalizer->normalize($user);

        $json = json_encode($userArray);

        return new Response($json, Response::HTTP_OK, ['content-type' => "application/json"]);
    }

    /**
    * @Route("/user/{id}", name="one_user", methods={"GET"})
    */
    public function userMethod(UserRepository $userRepository, NormalizerInterface $normalizer,int $id) : Response
    {
        $user = $userRepository->find($id);

        if (empty($user)) {
            return $this->json($user, Response::HTTP_CREATED);
        }

        $userArray = $normalizer->normalize($user);

        $json = json_encode($userArray);

        return new Response($json, Response::HTTP_OK, ['content-type' => "application/json"]);
    }

    /**
    * @Route("/user/{id}", name="delete_user", methods={"DELETE"})
    */
    public function userDeleteMethod(UserRepository $userRepository, EntityManagerInterface $em, NormalizerInterface $normalizer,int $id) : Response
    {
        $user        =  $em->getRepository(User::class)->find($id);

        if (empty($user)) {
            return $this->json('no user found', Response::HTTP_CREATED);
        }
       
        try {

            $em->remove($user);     
            $em->flush();

            return $this->json('Delete its ok <3', Response::HTTP_CREATED);
        } catch (Exception $e) {
            return $this->json(['db' => 'db incorrect'], Response::HTTP_FORBIDDEN);
        } catch (\Exception $e) {
            return $this->json(['message' => $e->getMessage()], Response::HTTP_FORBIDDEN);
        }

    }

    /**
    * @Route("/user/{id}", name="patch_user", methods={"PATCH"})
    */
    public function userPatchMethodeUn( Request $request,
                                        ValidatorInterface $validator, 
                                        SerializerInterface $serializer, 
                                        EntityManagerInterface $em, 
                                        UserPasswordEncoderInterface $passwordEncoder, 
                                        int $id
                                    ): Response
    {

        $json        =  $request->getContent();
        $userPatch   =  $serializer->deserialize($json, User::class, 'json');

        $errors = $validator->validate($userPatch);
        if ($errors) {
            return $this->json($errors, Response::HTTP_BAD_REQUEST);
        }

        $user        =  $em->getRepository(User::class)->find($id);

        try {
            $json = $request->getContent();  
          
            $errors = $validator->validate($user);
            if ($errors) {
                return $this->json($errors, Response::HTTP_BAD_REQUEST);
            }
            
            if(empty($userPatch->getPassword()))
            {
                $user->setPassword($passwordEncoder->encodePassword($user, $userPatch->getPassword()));
            }
            $user->setEmail($userPatch->getEmail());
            $user->setRoles($userPatch->getRoles());
           
            $em->flush();

            return $this->json($user, Response::HTTP_CREATED);
        } catch (Exception $e) {
            return $this->json(['db' => 'db incorrect'], Response::HTTP_FORBIDDEN);
        } catch (\Exception $e) {
            return $this->json(['message' => $e->getMessage()], Response::HTTP_FORBIDDEN);
        }
    }

    /**
    * @Route("/user", name="user_new", methods={"POST"})
    */
    public function userNewMethodeUn(   Request $request, 
                                        ValidatorInterface $validator, 
                                        SerializerInterface $serializer, 
                                        EntityManagerInterface $em, 
                                        UserPasswordEncoderInterface $passwordEncoder
                                    ): Response
    {
        try {
       
            $json = $request->getContent();
            
            $user = $serializer->deserialize($json, User::class, 'json');
            // dd($user);

            $errors = $validator->validate($user);
            if ($errors) {
                return $this->json($errors, Response::HTTP_BAD_REQUEST);
            }

            $user->setPassword($passwordEncoder->encodePassword($user, $user->getPassword()));
            $em->persist($user);
            $em->flush();

            return $this->json($user, Response::HTTP_CREATED);
        } catch (Exception $e) {
            return $this->json(['db' => 'db incorrect'], Response::HTTP_FORBIDDEN);
        } catch (\Exception $e) {
            return $this->json(['message' => $e->getMessage()], Response::HTTP_FORBIDDEN);
        }
    }


}
