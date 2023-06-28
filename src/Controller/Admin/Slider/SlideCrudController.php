<?php

namespace App\Controller\Admin\Slider;

use App\Entity\Slide;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use Vich\UploaderBundle\Form\Type\VichFileType;

class SlideCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Slide::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('title1'),
            TextField::new('title2'),
            TextField::new('buttonText'),
            UrlField::new('buttonUrl')->onlyOnForms(),
            UrlField::new('buttonUrl')->onlyOnDetail(),
            BooleanField::new('isUrlNewWindow')->onlyOnForms(),
            BooleanField::new('isUrlNewWindow')->onlyOnDetail(),
            IntegerField::new('sequence', 'Ordre')->setSortable(true),
            AssociationField::new('slider')->setRequired(true),
            Field::new('imageFile', 'Image')
                ->setFormType(VichFileType::class)
                ->setHelp('(2500px x 1400px)')
                ->setFormTypeOption('by_reference', false)
                ->setFormTypeOption('allow_delete', false)
                ->setRequired(true)
                ->onlyWhenCreating(),
            Field::new('imageFile', 'Image')
                ->setFormType(VichFileType::class)
                ->setHelp('(2500px x 1400px)')
                ->setFormTypeOption('by_reference', false)
                ->setFormTypeOption('allow_delete', false)
                ->setRequired(false)
                ->onlyWhenUpdating(),
            BooleanField::new('active')
        ];
    }
}
