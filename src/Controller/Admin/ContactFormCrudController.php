<?php

namespace App\Controller\Admin;

use App\Entity\ContactForm;
use App\Entity\SiteConfig;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mime\Address;

class ContactFormCrudController extends AbstractCrudController
{
    private $mailer;
    
    public function __construct(\Swift_Mailer $mailer) {
        $this->mailer = $mailer;
    }
    
    public static function getEntityFqcn(): string
    {
        return ContactForm::class;
    }
    
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->showEntityActionsAsDropdown()
            ->setEntityLabelInSingular('Message de contact')
            ->setEntityLabelInPlural('Messages de contact')
        ;
    }
    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('name', 'Emetteur'),
            TextField::new('subject', 'Objet'),
            EmailField::new('email'),
            TextField::new('state', 'Etat')->formatValue(function($value){
                return $value == ContactForm::STATE_READ ? 'Lu' : 'Non lu';
            }),
            TextareaField::new('message')->hideOnIndex()
        ];
    }
    
    public function configureActions(Actions $actions): Actions
    {
         $markAsRead = Action::new('READ', 'Marqué comme lu')
            ->linkToCrudAction('setToReadAction')
            ->displayIf(static function (ContactForm $entity) {
                return $entity->getState() == $entity::STATE_NOT_READ;
            });
         $markAsNotRead = Action::new('NOT_READ', 'Marqué comme non lu')
            ->linkToCrudAction('setToNotReadAction')
            ->displayIf(static function (ContactForm $entity) {
                return $entity->getState() == $entity::STATE_READ;
            });
         $sendMail = Action::new('SENDMAIL', 'Renvoyer le mail')
            ->linkToCrudAction('sendMailAction');
            
        return $actions
            ->remove(Crud::PAGE_INDEX, Action::NEW)
            ->remove(Crud::PAGE_INDEX, Action::EDIT)
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ->add(Crud::PAGE_INDEX, $sendMail)
            ->add(Crud::PAGE_INDEX, $markAsRead)
            ->add(Crud::PAGE_EDIT, $markAsRead)
            ->add(Crud::PAGE_INDEX, $markAsNotRead)
            ->add(Crud::PAGE_EDIT, $markAsNotRead)
            ->setPermission(Action::DELETE, 'ROLE_MODERATOR')
        ;
    }
    
    //Renvoyer le mail
    function sendMailAction(AdminContext $context) {
        $config = $this->getDoctrine()->getRepository(SiteConfig::class)->findAll()[0];
        $contactForm = $context->getEntity()->getInstance();

        $message = (new \Swift_Message($contactForm->getSubject()))
        ->setFrom($contactForm->getEmail(), $contactForm->getName())
        ->setTo($config->getContactFormEmailTo()? $config->getContactFormEmailTo() : $this->getParameter('app.contact.email'))
        ->setBody($contactForm->getMessage(), 'text/plain');

        $this->mailer->send($message);

        $url = $context->getReferrer()
                    ?? $this->get(CrudUrlGenerator::class)->build()->setAction(Action::INDEX)->generateUrl();

        return $this->redirect($url);
    }
    
    // Marquer un message comme lu
    public function setToReadAction(AdminContext $context){
        $entity = $context->getEntity()->getInstance()->setState(ContactForm::STATE_READ);
        $manager = $this->getDoctrine()->getManagerForClass(ContactForm::class);
        $manager->persist($entity);
        $manager->flush();

        $url = $context->getReferrer()
                    ?? $this->get(CrudUrlGenerator::class)->build()->setAction(Action::INDEX)->generateUrl();

        return $this->redirect($url);
    }
    
    // Marquer un message comme non lu
    public function setToNotReadAction(AdminContext $context){
        $entity = $context->getEntity()->getInstance()->setState(ContactForm::STATE_NOT_READ);
        $manager = $this->getDoctrine()->getManagerForClass(ContactForm::class);
        $manager->persist($entity);
        $manager->flush();

        $url = $context->getReferrer()
                    ?? $this->get(CrudUrlGenerator::class)->build()->setAction(Action::INDEX)->generateUrl();

        return $this->redirect($url);
    }
}
