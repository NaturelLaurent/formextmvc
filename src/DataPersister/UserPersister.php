<?php


namespace App\DataPersister;


use ApiPlatform\Core\DataPersister\DataPersisterInterface;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserPersister implements DataPersisterInterface
{
    private $passwordEncoder;
    private $em;

    public function __construct(EntityManagerInterface $entityManager, UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
        $this->em = $entityManager;
    }

    public function supports($data): bool
    {
        return $data instanceof User;
    }

    public function persist($user)
    {
        $user->setPassword($this->passwordEncoder->encodePassword($user, $user->getPassword()));

        $this->em->persist($user);
        $this->em->flush();
    }

    public function remove($user)
    {
        $this->em->remove($user);
    }
}
