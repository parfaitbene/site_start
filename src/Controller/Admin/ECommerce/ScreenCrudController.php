<?php

namespace App\Controller\Admin\ECommerce;

use App\Entity\Screen;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;

class ScreenCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Screen::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('name', 'Nom'),
            MoneyField::new('price', 'Prix')
                ->setCurrency('XAF')
                ->setNumDecimals(0)
                ->setStoredAsCents(false),
            IntegerField::new('sequence'),
            Field::new('active', 'Actif?')
        ];
    }
}
