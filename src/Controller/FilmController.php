<?php

// src/Controller/FilmController.php

namespace App\Controller;

use App\Repository\FilmRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FilmController extends AbstractController
{
    /**
     * @Route("/films/apres/{year}", name="films_after_year")
     */
    public function filmsAfterYear($year, FilmRepository $filmRepository): Response
    {
        // Appel de la méthode personnalisée du repository pour obtenir les films
        $films = $filmRepository->findFilmsAfterYear($year);

        // Retourne les résultats (ici simplifié avec JSON pour l'exemple)
        return $this->json($films);
    }
}
