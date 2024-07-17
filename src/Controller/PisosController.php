<?php 

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class PisosController extends AbstractController{
    #[Route('/piso')] 
    public function getPisos(){
        $piso = [
            'description' => 'Luminoso piso en Passeig de Sant Gervasi',
            'price' => '1600',
            'includes'=> 'Garaje',
            'rooms' => '2',
            'size' => '80',
            'floor' => '4º exterior con ascensor',
            'image' => 'https://images.habimg.com/imgh/8166-3800737/piso-de-4-habitaciones-en-el-corazon-de-sant-gervasi-barcelona_c3907c27-a59a-4f06-af30-214b70320a7eG.jpg',
            'notes' => 'Llamanos para concertar una cita'
        ];

        return $this->render('pisos/piso.html.twig', ['piso' => $piso]);
    }

    #[Route('pisos')]
    public function pisos () {
        $pisos =
        [
            [
            'description' => 'Luminoso piso en Passeig de Sant Gervasi',
            'price' => '2000',
            'includes'=> 'Garaje',
            'rooms' => '2',
            'size' => '80',
            'floor' => '4º exterior con ascensor',
            'image' => 'https://images.habimg.com/imgh/8166-3800737/piso-de-4-habitaciones-en-el-corazon-de-sant-gervasi-barcelona_c3907c27-a59a-4f06-af30-214b70320a7eG.jpg',
            'notes' => 'Llamanos para concertar una cita'
            ],
            [
                'description' => 'Amplio ático en la dreta del Eixample',
                'price' => '1200',
                'includes'=> 'Trastero',
                'rooms' => '1',
                'size' => '60',
                'floor' => '5º exterior con ascensor',
                'image' => 'https://www.atemporalbarcelona.es/media/properties/878/FsUUH2A0TzRf4P5eKaADvBN1fgfJbgKP2i8c7C4k.jpeg',
                'notes' => 'No te pierdas esta oportunidad'
            ],
            [
                'description' => 'Acogedor piso con vistas a la Sagrada Familia',
                'price' => '1900',
                'includes'=> 'Garaje',
                'rooms' => '2',
                'size' => '70',
                'floor' => '4º exterior con ascensor',
                'image' => 'https://www.barnaquatre.com/wp-content/uploads/2024/06/1-1.jpg',
                'notes' => 'Llamanos para concertar una cita'
            ]
            ];
            return $this->render('pisos/pisosList.html.twig', ['pisos' => $pisos]);

    }
}