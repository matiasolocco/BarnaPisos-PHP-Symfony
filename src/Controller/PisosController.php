<?php 

namespace App\Controller;

use App\Entity\Piso;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class PisosController extends AbstractController{
    #[Route('/piso/{id}', name: 'showPiso')] 
    public function getPisos(EntityManagerInterface $doctrine, $id){
        $repository = $doctrine -> getRepository(Piso::class);
        $piso = $repository -> find($id);

        return $this->render('pisos/piso.html.twig', ['piso' => $piso]);
    }

    #[Route('pisos')]
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

            $doctrine -> persist($piso);
            $doctrine -> persist($piso2);
            $doctrine -> persist($piso3);

            $doctrine -> flush();

        return new Response('Pisos publicados correctamente');

    }
}