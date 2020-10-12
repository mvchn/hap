<?php

namespace App\Controller\Admin;

use App\Entity\Hap;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class HapCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Hap::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('...')
            //->setDateFormat('Y-m-d')
            ->setTimeFormat('H:i')
            //->setDateTimeFormat('Y-m-d H:i')
            // ...
            ;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title'),
            DateTimeField::new('startAt'),
            DateTimeField::new('stopAt'),
        ];
    }
}
