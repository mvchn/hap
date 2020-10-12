<?php

namespace App\EntityListener;

use App\Entity\Hap;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Component\String\Slugger\SluggerInterface;

class HapEntityListener
{
    private $slugger;

    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }

    public function prePersist(Hap $conference, LifecycleEventArgs $event)
    {
        $conference->computeSlug($this->slugger);
    }
}