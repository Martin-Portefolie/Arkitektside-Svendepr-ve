<?php

namespace App\Controller;

use App\Entity\News;
use App\Entity\Project;
use App\Form\NewsType;
use App\Form\ProjectType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request; 
use Symfony\Component\HttpFoundation\Response; 
use Symfony\Component\HttpFoundation\RedirectResponse; 
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;


#[IsGranted('ROLE_ADMIN')]
class AdminController extends AbstractController
{
    #[Route('/admin', name: 'admin_dashboard')]
    public function dashboard(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    #[Route('/admin/news', name: 'admin_news')]
    public function manageNews(EntityManagerInterface $entityManager): Response
    {
        $news = $entityManager->getRepository(News::class)->findAll();
        return $this->render('admin/news.html.twig', ['news' => $news]);
    }

    #[Route('/admin/project', name: 'admin_project')]
    public function manageProjects(EntityManagerInterface $entityManager): Response
    {
        $projects = $entityManager->getRepository(Project::class)->findAll();
        return $this->render('admin/project.html.twig', ['projects' => $projects]);
    }

    // CREATE News
    #[Route('/admin/news/create', name: 'admin_news_create')]
    public function createNews(Request $request, EntityManagerInterface $entityManager): Response
    {
        $news = new News();
        $form = $this->createForm(NewsType::class, $news);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($news);
            $entityManager->flush();

            return $this->redirectToRoute('admin_news');
        }

        return $this->render('admin/news_form.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    // EDIT News
    #[Route('/admin/news/edit/{id}', name: 'admin_news_edit')]
    public function editNews(Request $request, News $news, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(NewsType::class, $news);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            return $this->redirectToRoute('admin_news');
        }

        return $this->render('admin/news_form.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    // DELETE News
    #[Route('/admin/news/delete/{id}', name: 'admin_news_delete', methods: ['POST'])]
    public function deleteNews(News $news, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($news);
        $entityManager->flush();
        return $this->redirectToRoute('admin_news');
    }

    #[Route('/admin/project/create', name: 'admin_project_create')]
    public function createProject(Request $request, EntityManagerInterface $entityManager): Response
    {
        $project = new Project();
        $form = $this->createForm(ProjectType::class, $project);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('imageFile')->getData();
    
            if ($imageFile) {
                $newFilename = uniqid().'.'.$imageFile->guessExtension();
                $imageFile->move(
                    $this->getParameter('uploads_directory'),
                    $newFilename
                );
                $project->setImage($newFilename);
            }
    
            $entityManager->persist($project);
            $entityManager->flush();
    
            $this->addFlash('success', 'Projektet er oprettet!');
            return $this->redirectToRoute('admin_project');
        }
    
        return $this->render('admin/project_form.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    
    #[Route('/admin/project/edit/{id}', name: 'admin_project_edit')]
    public function editProject(Request $request, Project $project, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ProjectType::class, $project);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('imageFile')->getData();
    
            if ($imageFile) {
                $newFilename = uniqid().'.'.$imageFile->guessExtension();
                $imageFile->move(
                    $this->getParameter('uploads_directory'),
                    $newFilename
                );
                $project->setImage($newFilename);
            }
    
            $entityManager->flush();
    
            $this->addFlash('success', 'Projektet er opdateret!');
            return $this->redirectToRoute('admin_project');
        }
    
        return $this->render('admin/project_form.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    


// DELETE Project
#[Route('/admin/project/delete/{id}', name: 'admin_project_delete', methods: ['POST'])]
public function deleteProject(Project $project, EntityManagerInterface $entityManager): Response
{
    $entityManager->remove($project);
    $entityManager->flush();
    return $this->redirectToRoute('admin_project');
}


}
