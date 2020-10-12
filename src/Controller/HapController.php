<?php

namespace App\Controller;

use App\Entity\Hap;
use App\Repository\HapRepository;
use App\Repository\TickRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class HapController extends AbstractController
{
    private $hapRepository;

    private $tickRepository;

    private $twig;

    public function __construct(Environment $twig, HapRepository $hapRepository, TickRepository $tickRepository)
    {
        $this->hapRepository = $hapRepository;
        $this->tickRepository = $tickRepository;
        $this->twig = $twig;
    }

    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {
        return new Response($this->twig->render('hap/index.html.twig', [
            'haps' => $this->hapRepository->findAll(),
        ]));
    }

    /**
     * @Route("/hap/{id}", name="hap")
     */
    public function show(Request $request, Hap $hap): Response
    {
        $offset = max(0, $request->query->getInt('offset', 0));
        $paginator = $this->tickRepository->getTicksPaginator($hap, $offset);

        return new Response($this->twig->render('hap/show.html.twig', [
            'hap' => $hap,
            'ticks' => $paginator,
            'previous' => $offset - TickRepository::PAGINATOR_PER_PAGE,
            'next' => min(count($paginator), $offset + TickRepository::PAGINATOR_PER_PAGE),
        ]));
    }
}
