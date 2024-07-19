<?php
namespace App\Controller;

use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController{

    #[Route('/new/user', name: 'newUser')]
    public function uploadPiso (EntityManagerInterface $doctrine, Request $request, UserPasswordHasherInterface $hasher) {
       $form = $this -> createForm(UserType::class);
       $form -> handleRequest($request);

       if( $form -> isSubmitted() &&  $form -> isValid() ){
            $user = $form -> getData();
            //Encriptación
            $originalPassword =  $user -> getPassword();
            $scriptedPassword = $hasher -> hashPassword( $user, $originalPassword );
            $user -> setPassword($scriptedPassword);

            $doctrine -> persist($user);
            $doctrine -> flush();

            $this -> addFlash(type:'exito', message:'Usuario creado correctamente');
            
            return $this->redirectToRoute('listPisos');
       }

        return $this -> render('pisos/newPiso.html.twig', ['pisoForm' => $form]);
        

    }

}