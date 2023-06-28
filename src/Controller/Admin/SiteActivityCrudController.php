<?php

namespace App\Controller\Admin;

use App\Entity\SiteActivity;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;

class SiteActivityCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SiteActivity::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('name')->setRequired(true),
            TextField::new('icon')
                ->setRequired(true)
                ->setHelp('<a href="https://mdbootstrap.com/docs/standard/content-styles/icons/" target="_blank">Consulter la liste</a>'),
            IntegerField::new('sequence'),
            BooleanField::new('active'),
        ];
    }
}
