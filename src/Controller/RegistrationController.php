<?php

namespace App\Controller;

use App\Entity\Jugador;
use App\Entity\User;

use App\Repository\UserRepository;

use App\Form\RegisterUserType;
use App\Form\RegisterJugadorType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;


class RegistrationController extends AbstractController
{
     /**
     * Registra un Usuario nuevo y persiste el objeto User() en la BD
     * 
     * @Route("/registerJugador", name="register_jugador")
     */
    public function Resgistration(Request $request, UserRepository $repository, UserPasswordHasherInterface $passwordHasher, ManagerRegistry $doctrine): Response
    {
        $user = new User();
        $jugador = new Jugador();

        $formJugador =$this->createForm(RegisterJugadorType::class);
        $formUser = $this->createForm(RegisterUserType::class);
        $formUser->handleRequest($request);

        if($formUser->isSubmitted() && $formUser->isValid()) {
            
            $email = $formUser->get('email')->getData();
            $userRepetido = $repository->findOneByEmail($email);
           
            // Comprobar si ya existe el Usuario
            if($userRepetido != null){

                return $this->render('error.html.twig', [
                    'error' => 'El Usuario ya existe',
                ]);

            }else{

                $user->setEmail($formUser->get('email')->getData())
                    ->setRoles(['ROLE_USER'])
                    ->setPassword(
                        $hashedPassword = $passwordHasher->hashPassword(
                            $user,
                            $formUser->get('password')->getData()));
                            
                $entityManager = $doctrine()->getManager();
                $entityManager->persist($user);

                $jugador->setId($user->getId())
                    ->setNombre($formJugador->get('nombre')->getData())
                    ->setApellido($formJugador->get('apellido')->getData())
                    ->setEmail($formUser->get('email')->getData())
                    ->setTelefono($formJugador->get('telefono')->getData())
                    ->setFechaNacimiento($formJugador->get('fechaNacimiento')->getData())
                    ->setAltura($formJugador->get('altura')->getData())
                    ->setPeso($formJugador->get('peso')->getData());
                
                $entityManager->persist($jugador);
                $entityManager->flush();

                return $this->redirectToRoute('home');
            }
        }

        return $this->render('registration/form_register_jugador.html.twig', [
            'formUser' => $formUser->createView(),
            'formJugador' => $formJugador->createView(),
            'titulo' => 'Registro Nuevo Jugador',
        ]);
    }
}