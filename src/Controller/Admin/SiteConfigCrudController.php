<?php

namespace App\Controller\Admin;

use App\Entity\SiteConfig;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use Vich\UploaderBundle\Form\Type\VichFileType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;

class SiteConfigCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SiteConfig::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        $fields = [
            FormField::addPanel('Informations générales sur la plateforme')
                ->setIcon('fa fa-globe')
                ->setHelp('Informations sur la plateforme'),
            TextField::new('name'),
            TextField::new('slogan'),
            TextEditorField::new('description')->onlyOnForms(),
            TextField::new('localisation'),
            
            FormField::addPanel('Contacts site web')
                ->setIcon('fa fa-network')
                ->setHelp('Informations de contact'),
            TextField::new('contact'),
            TextField::new('email'),
            
            FormField::addPanel('Images')
                ->setIcon('fa fa-network')
                ->setHelp('Images du site'),
            Field::new('bannerFile', 'Bannière du site')
                ->setFormType(VichFileType::class)
                ->setFormTypeOption('by_reference', false)
                ->onlyOnForms(),
            
            FormField::addPanel('Formulaire de contact')
                ->setIcon('fa fa-network')
                ->setHelp('Paramètres du formulaire de contact'),
            TextField::new('contactFormPageTitle', 'Titre de la page (bannière)')
                ->setHelp('Texte affiché sur la bannière pour la page de contact.')
                ->onlyOnForms(),
            EmailField::new('contactFormEmailTo', 'Email de réception')
                ->setHelp('Par défaut: contact@start237.com'),
            TextField::new('contactFormTitle', 'Titre du formulaire')
                ->onlyOnForms(),
            TextEditorField::new('contactFormText', 'Texte de description')
                ->setFormType(CKEditorType::class)
                ->onlyOnForms(),
            
            FormField::addPanel('Carte Google Map')
                ->setIcon('fa fa-map')
                ->setHelp('Google map iframe'),
            TextareaField::new('siteMap', 'Google map (code iframe)')
                ->onlyOnForms(),
        ];
                
        return $fields;
    }
    
    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->remove(Crud::PAGE_INDEX, Action::NEW)
            ->remove(Crud::PAGE_INDEX, Action::DELETE)
        ;
    }
}
