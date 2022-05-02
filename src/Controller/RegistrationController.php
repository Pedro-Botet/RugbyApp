<?php

namespace App\Controller;

use App\Entity\Jugador;
use App\Entity\User;

use App\Repository\UserRepository;

use App\Form\RegisterUserType;
use App\Form\RegisterJugadorType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class RegistrationController extends AbstractController
{
     /**
     * Registra un Usuario nuevo y persiste el objeto User() en la BD
     * 
     * @Route("/registerJugador", name="register_jugador")
     */
    public function Resgistration(Request $request, UserRepository $repository, UserPasswordEncoderInterface $passwordEncoder): Response
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
                    ->setPassword(
                        $passwordEncoder->encodePassword(
                            $user,
                            $formUser->get('password')->getData()));
                            
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($user);

                $jugador->setNombre($formJugador->get('nombre')->getData())
                    ->setApellido($formJugador->get('apellido')->getData())
                    ->setNombre($formJugador->get('nombre')->getData())
                    ->setEmail($formUser->get('email')->getData())
                    ->setTelefono($formUser->get('telefono')->getData())
                    ->setEmail($formUser->get('email')->getData())        
                    ->setFechaNacimiento($formUser->get('fecha_nacimiento')->getData())
                    ->setAltura($formUser->get('altura')->getData())
                    ->setPeso($formUser->get('peso')->getData());
                
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