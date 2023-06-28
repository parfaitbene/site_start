<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use App\Entity\SiteConfig;
use App\Entity\ContactForm;
use App\Entity\SiteActivity;
use App\Entity\Article;
use App\Entity\Category;
use App\Entity\Media\GalleryCategory;
use App\Entity\Media\GalleryMedia;
use App\Entity\Media\GalleryVideo;
use App\Entity\Formule;
use App\Entity\Console;
use App\Entity\Screen;
use App\Entity\Bonus;
use App\Entity\Menu;
use App\Entity\Link;
use App\Entity\SocialNetwork;
use App\Entity\Slider;
use App\Entity\Slide;
use App\Entity\Partner;
use App\Entity\Testimonial;
use App\Entity\MarketingBlock;
use App\Entity\Module\Module1;
use App\Entity\Module\Module2;
use App\Entity\Module\Module3;
use App\Entity\Module\Module4;
use App\Entity\Module\Module5;
use App\Entity\Module\Module6;
use App\Entity\Module\ModuleMarketingBlock;
use App\Entity\Module\ModuleFormule;
use App\Entity\Module\ModuleArticle;
use App\Entity\Module\ModuleParallax;
use App\Entity\Module\ModuleTestimonial;
use App\Entity\Module\ModulePartner;

class SiteAdminController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('START');
    }
    
    public function configureCrud(): Crud
    {
        return Crud::new()
            ->addFormTheme('bootstrap_4_layout.html.twig')
            ->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig')
        ;
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        
        yield MenuItem::section('Contenus');    
        yield MenuItem::subMenu('Blog', '')
                 ->setSubItems([
                    MenuItem::linkToCrud('Categories',  null, Category::class),
                    MenuItem::linkToCrud('Articles',  null, Article::class)
                ]);
        
        yield MenuItem::subMenu('Médias', '')
                 ->setSubItems([
                    MenuItem::linkToCrud('Categories',  null, GalleryCategory::class),
                    MenuItem::linkToCrud('Média',  null, GalleryMedia::class),
                    MenuItem::linkToCrud('Vidéo externe',  null, GalleryVideo::class)
                ]);
        
        yield MenuItem::subMenu('Produits et services', '')
                 ->setSubItems([
                    MenuItem::linkToCrud('Formules',  null, Formule::class),
                    MenuItem::linkToCrud('Bonus',  null, Bonus::class),
                    MenuItem::linkToCrud('Consoles',  null, Console::class),
                    MenuItem::linkToCrud('Ecrans',  null, Screen::class),
                    MenuItem::linkToCrud('Bloc marketing',  null, MarketingBlock::class)
                ]);
        
        yield MenuItem::linkToCrud('Témoignages', null, Testimonial::class);      
        yield MenuItem::linkToCrud('Partenaires', null, Partner::class);      
        yield MenuItem::linkToCrud('Messages de contact', null, ContactForm::class);      
        
        yield MenuItem::section('Configurations');       
        yield MenuItem::subMenu('Gestion des menus', '')
                 ->setSubItems([
                    MenuItem::linkToCrud('Menus',  null, Menu::class),
                    MenuItem::linkToCrud('Liens', null, Link::class)
                ]);
        yield MenuItem::subMenu('Configuration Slider', '')
                 ->setSubItems([
                    MenuItem::linkToCrud('Slider',  null, Slider::class),
                    MenuItem::linkToCrud('Slides', null, Slide::class)
                ]);
        yield MenuItem::subMenu('Modules', '')
                 ->setSubItems([
                    MenuItem::linkToCrud('Liste d\'articles',  null, ModuleArticle::class),
                    MenuItem::linkToCrud('Image, Text, CTA',  null, Module1::class),
                    MenuItem::linkToCrud('Image, Text',  null, Module2::class),
                    MenuItem::linkToCrud('Images x 3',  null, Module3::class),
                    MenuItem::linkToCrud('Text, Image',  null, Module4::class),
                    MenuItem::linkToCrud('Slider',  null, Module5::class),
                    MenuItem::linkToCrud('Parallax',  null, ModuleParallax::class),
                    MenuItem::linkToCrud('Formules',  null, ModuleFormule::class),
                    MenuItem::linkToCrud('Image, Text, Image',  null, Module6::class),
                    MenuItem::linkToCrud('Blocs marketing',  null, ModuleMarketingBlock::class),
                    MenuItem::linkToCrud('Témoignages',  null, ModuleTestimonial::class),
                    MenuItem::linkToCrud('Partenaires',  null, ModulePartner::class),
                ]);
        
        yield MenuItem::section('Système');
        yield MenuItem::linkToCrud('Paramètres du site', '', SiteConfig::class);
        yield MenuItem::linkToCrud('Activités de la structure', '', SiteActivity::class);
        yield MenuItem::linkToCrud('Réseaux sociaux', '', SocialNetwork::class);
    }
}
