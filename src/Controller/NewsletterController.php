<?php

namespace App\Controller;

use App\Entity\Newsletter;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class NewsletterController extends AbstractController
{
    #[Route('/newsletter/subscribe', name: 'newsletter_subscribe', methods: ['POST'])]
    public function subscribe(Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        // Get JSON data from request
        $data = json_decode($request->getContent(), true);
        $email = $data['email'] ?? null;

        // Validate email
        if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return new JsonResponse(['success' => false, 'message' => 'Invalid email address'], 400);
        }

        // Check if email is already in database (optional)
        $existingEmail = $entityManager->getRepository(Newsletter::class)->findOneBy(['email' => $email]);
        if ($existingEmail) {
            return new JsonResponse(['success' => false, 'message' => 'Email already subscribed'], 400);
        }

        // Save email to database
        $newsletter = new Newsletter();
        $newsletter->setEmail($email);
        $entityManager->persist($newsletter);
        $entityManager->flush();

        return new JsonResponse(['success' => true]);
    }
}
