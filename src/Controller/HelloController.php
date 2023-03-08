<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\SerializerInterface;

final class HelloController extends AbstractController
{
    public function __construct(
        private readonly SerializerInterface $serializer,
    ) {
    }

    #[Route('/')]
    public function __invoke(Request $request): Response
    {
        $data = [
            'Hello' => 'Me & You',
        ];

        return new Response($this->serializer->serialize($data, XmlEncoder::FORMAT), headers: [
            'Content-Type' => 'application/xml',
        ]);
    }
}
