<?php

declare(strict_types=1);

namespace App\Controller;

use OpenApi\Annotations as OA;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class CheckController extends AbstractController
{
    #[Route('/check', name: 'app_check', methods: 'GET')]
    /**
     * @OA\Get(
     *     path="/check",
     *     summary="Sprawdza aktualną datę",
     *     description="Zwraca aktualną datę serwera w formacie JSON",
     *     @OA\Response(
     *         response=200,
     *         description="Zwraca aktualną datę",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="currDate", type="string", format="date-time", example="2024-12-24T12:34:56Z")
     *         )
     *     )
     * )
     */
    public function index(): JsonResponse
    {
        return $this->json(
            [
                'currDate' => (new \DateTime())->format('Y-m-d H:i:s'),
            ]
        );
    }
}