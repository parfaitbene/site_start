<?php

namespace App\Controller\Admin;

use App\Entity\SocialNetwork;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;

class SocialNetworkCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SocialNetwork::class;
    }

    public function configureFields(string $pageName): iterable
    {
       return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('name'),
            UrlField::new('url'),
            TextField::new('icon')->onlyOnForms(),
            NumberField::new('sequence', 'Ordre'),
            BooleanField::new('active')
        ];
    }
}
