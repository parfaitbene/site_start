<?php

namespace App\Controller\Admin\ECommerce;

use App\Entity\Bonus;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class BonusCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Bonus::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('name'),
            TextField::new('icon'),
            IntegerField::new('sequence'),
            Field::new('active', 'Actif?')
        ];
    }
}
