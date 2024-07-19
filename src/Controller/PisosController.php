<?php 

namespace App\Controller;

use App\Entity\Location;
use App\Entity\Piso;
use App\Form\PisoType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class PisosController extends AbstractController{
    #[Route('/piso/{id}', name: 'showPiso')] 
    public function getPisos(EntityManagerInterface $doctrine, $id){
        $repository = $doctrine -> getRepository(Piso::class);
        $piso = $repository -> find($id);

        return $this->render('pisos/piso.html.twig', ['piso' => $piso]);
    }

    #[Route('/pisos', name: 'listPisos')]
    public function pisos (EntityManagerInterface $doctrine) {
       $repository = $doctrine -> getRepository(Piso::class);
       $pisos = $repository -> findAll();

        return $this->render('pisos/pisosList.html.twig', ['pisos' => $pisos]);

    }

    #[Route('/new/pisos')]
    public function insertPisos (EntityManagerInterface $doctrine) {
       
            $piso = new Piso();
            $piso -> setDescription('Luminoso piso en Passeig de Sant Gervasi');
            $piso -> setPrice(2000);
            $piso -> setIncludes('Garaje');
            $piso -> setRooms(2);
            $piso -> setSize(60);
            $piso -> setFloor('5º exterior con ascensor');
            $piso -> setImage('https://www.atemporalbarcelona.es/media/properties/878/FsUUH2A0TzRf4P5eKaADvBN1fgfJbgKP2i8c7C4k.jpeg');
            $piso -> setNotes('Llamanos para concertar una cita');

            $piso2 = new Piso();
            $piso2 -> setDescription('Amplio ático en la dreta del Eixample');
            $piso2 -> setPrice(1200);
            $piso2 -> setIncludes('Trastero');
            $piso2 -> setRooms(1);
            $piso2 -> setSize(60);
            $piso2 -> setFloor('5º exterior con ascensor');
            $piso2 -> setImage('https://www.atemporalbarcelona.es/media/properties/878/FsUUH2A0TzRf4P5eKaADvBN1fgfJbgKP2i8c7C4k.jpeg');
            $piso2 -> setNotes('Llamanos para concertar una cita');

            $piso3 = new Piso();
            $piso3 -> setDescription('Acogedor piso con vistas a la Sagrada Familia');
            $piso3 -> setPrice(1400);
            $piso3 -> setIncludes('Garaje');
            $piso3 -> setRooms(2);
            $piso3 -> setSize(70);
            $piso3 -> setFloor('4º exterior con ascensor');
            $piso3 -> setImage('https://www.barnaquatre.com/wp-content/uploads/2024/06/1-1.jpg');
            $piso3 -> setNotes('Llamanos para concertar una cita');

            //BARRIOS - DISTRITOS
            $location = new Location();
            $location -> setName("Eixample");

            $location2 = new Location();
            $location2 -> setName("Sarriá-Sant Servasi");

            $location3 = new Location();
            $location3 -> setName("Sagrada Familia");

            $location4 = new Location();
            $location4 -> setName("El Raval");

            $location5 = new Location();
            $location5 -> setName("Sants");

            $location6 = new Location();
            $location6 -> setName("Vallcarca - Penitents");

            $location7 = new Location();
            $location7 -> setName('Gràcia');

            //Añadir location a piso
            $piso -> addZone($location2);
            $piso2 -> addZone($location);
            $piso3 -> addZone($location3);
            
           
            $doctrine -> persist($piso);
            $doctrine -> persist($piso2);
            $doctrine -> persist($piso3);

            $doctrine -> persist($location);
            $doctrine -> persist($location2);
            $doctrine -> persist($location3);
            $doctrine -> persist($location4);
            $doctrine -> persist($location5);
            $doctrine -> persist($location6);
            $doctrine -> persist($location7);

            
            $doctrine -> flush();

        return new Response('Pisos publicados correctamente');

    }



    #[Route('/upload/piso', name: 'uploadPiso')]
    public function uploadPiso (EntityManagerInterface $doctrine, Request $request) {
       $form = $this -> createForm(PisoType::class);
       $form -> handleRequest($request);

       if( $form -> isSubmitted() &&  $form -> isValid() ){
            $piso = $form -> getData();
            $doctrine -> persist($piso);
            $doctrine -> flush();

            $this -> addFlash(type:'exito', message:'Piso cargado correctamente');

            return $this->redirectToRoute('listPisos');
       }

        return $this -> render('pisos/newPiso.html.twig', ['pisoForm' => $form]);
        

    }


    #[Route('/edit/piso/{id}', name: 'editPiso')]
    public function editdPiso (EntityManagerInterface $doctrine, Request $request, $id) {

       $repository = $doctrine -> getRepository(Piso::class);
       $piso = $repository -> find($id);

       $form = $this -> createForm(PisoType::class, $piso);
       $form -> handleRequest($request);

       if( $form -> isSubmitted() &&  $form -> isValid() ){
            $piso = $form -> getData();
            $doctrine -> persist($piso);
            $doctrine -> flush();

            $this -> addFlash(type:'exito', message:'Piso editado correctamente');
            
            return $this->redirectToRoute('listPisos');
       }

        return $this -> render('pisos/newPiso.html.twig', ['pisoForm' => $form]);
        

    }

    #[Route('/delete/piso/{id}', name: 'deletePiso')]
    public function deletePiso (EntityManagerInterface $doctrine, Request $request, $id) {

       $repository = $doctrine -> getRepository(Piso::class);
       $piso = $repository -> find($id);

       $doctrine -> remove($piso);
       $doctrine -> flush();

       return $this->redirectToRoute('listPisos');
        

    }


}