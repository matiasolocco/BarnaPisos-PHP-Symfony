<?php 

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class PisosController extends AbstractController{
    #[Route('/pisos')] 
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
}