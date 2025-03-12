<?php

namespace App\Controller;

use App\Repository\NewsRepository;
use App\Repository\ProjectsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(Request $request,NewsRepository $newsRepository, ProjectsRepository $projectsRepository): Response
    {

        //  $news = $newsRepository->findAll(); Not nescesary since pagerfanta takes care of fetching data.
        $projects = $projectsRepository->findAll();
        $about = [
            "whoarewe" => "Design Architects består af de 3 partnere  Dan Verbaum, John P. Herluf og Niels Hoy Hansen som hver især gennem årene er blevet internationalt anerkendte for deres spændende og nyskabende bygge projekter. De er nu gået sammen om at skabe firmaet Design Architects i forsøget på at skabe et kreativt, udviklende og inspirerende miljø.  Firmaet henvender sig til både det danske marked, men i allerhøjeste grad også det udenlandske.",
            "founded" => "Design Architects startede op som et freelance projekt da de 3 tilfældigt mødtes for 4 år siden, i forbindelse med Verdensudstillingen. Over en stille Carlsberg øl (i den danske pavillion, selvfølgelig), fandt de at de sammen kunne skabe en særdeles kreativ sfære, hvori de hver især kunne bidrage med deres ideer som uden videre passede ind i hinanden. Dette ville de alle 3 gerne prøve at bruge lidt mere sjæl, tid og arbejde på, og ud af det voksede Design Architects.  De første projekter er allerede i hus, og er ved at blive bygget, og mange flere nye venter lige om hjørnet, nu hvor de alle 3 er gået 100% ind i samarbejdet.",
            "weoffer" => "Design Architects kan tilbyde design af alle former fra bygninger, lige fra nye én families huse, til renovering af gamle lejligheder, til de helt store opgaver med skyskrabere i New York. 
                De internationale opgaver er en stor del af virksomhedens fundament, men Design Architects arbejder på at blive langt mere kendt i Danmark for sine alternative og altid kreative løsninger, med smukt brugervenligt design som man ikke blot skal bo i, men leve i. 
                "
        ];


        $page = max(1, (int) $request->query->get('page', 1));
        $search = $request->query->get('search', '');
        $newsPagination = $newsRepository->findPaginatedNews($page, 6, !empty($search) ? $search : null);

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'about' => $about,
            'newsPagination' => $newsPagination,
            'searchTerm' => $search,
            'projects' => $projects,
    ]);
    }


}
