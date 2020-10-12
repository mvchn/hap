<?php

namespace App\EventSubscriber;

use App\Repository\HapRepository;
use App\Repository\TickRepository;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Twig\Environment;

class TwigEventSubscriber implements EventSubscriberInterface
{
    private $twig;
    private $hapRepository;

    public function __construct(Environment $twig, HapRepository $hapRepository)
    {
        $this->twig = $twig;
        $this->hapRepository = $hapRepository;
    }
    public function onControllerEvent(ControllerEvent $event)
    {
        $this->twig->addGlobal('haps', $this->hapRepository->findAll());
    }

    public static function getSubscribedEvents()
    {
        return [
            ControllerEvent::class => 'onControllerEvent',
        ];
    }
}
