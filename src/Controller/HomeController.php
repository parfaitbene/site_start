<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use ElephantIO\Client;
use ElephantIO\Engine\SocketIO\Version1X;
use App\Entity\SiteConfig;
use App\Entity\ContactForm;
use App\Entity\NewsletterEmail;
use App\Entity\SiteActivity;
use App\Entity\SocialNetwork;
use App\Entity\Formule;
use App\Entity\Reservation;
use App\Entity\Console;
use App\Entity\Screen;
use App\Entity\Menu;
use App\Entity\Link;
use App\Entity\Slider;
use App\Entity\Slide;
use App\Entity\Module\Module;
use App\Form\ContactFormType;
use App\Form\ReservationFormType;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mime\Address;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use App\Entity\Media\GalleryCategory;
use App\Entity\Media\GalleryMedia;

class HomeController extends AbstractController
{
    private $mailer;
    
    public function __construct(MailerInterface $mailer) {
        $this->mailer = $mailer;
    }
    /**
     * @Route("/", name="home")
     */
    public function indexAction()
    {
        $config = $this->getDoctrine()->getRepository(SiteConfig::class)->findAll()[0];
        $homeSlider = $this->getDoctrine()->getRepository(Slider::class)->findBy(['active' => True])? $this->getDoctrine()->getRepository(Slider::class)->findBy(['active' => True])[0] : null;   
        $slides = $homeSlider? $this->getDoctrine()->getRepository(Slide::class)->findBy(['slider' => $homeSlider, 'active' => true]) : [];
        $activities = $this->getDoctrine()->getRepository(SiteActivity::class)->findBy(['active' => true], ['sequence' => 'asc']);
        $modulesTop = $this->getDoctrine()->getRepository(Module::class)-> findBy(['active' => true, 'position' => Module::POSITION_HOME_TOP], ['sequence' => 'asc']);
                
        return $this->render('public/pages/home.html.twig', [
            'config' => $config,
            'slider' => $homeSlider,
            'slides' => $slides,
            'activities' => $activities,
            'modulesTop' => $modulesTop
        ]);
    }

    /**
     * @Route("/formule/{slug}", name="formules", methods={"GET", "POST"})
     */
    public function formuleAction(Request $request, string $slug)
    {
        $config = $this->getDoctrine()->getRepository(SiteConfig::class)->findAll()[0];
        $formule = $this->getDoctrine()->getRepository(Formule::class)->findOneBy(['slug' => $slug, 'active' => true]);
        
        if(!$formule){
            throw $this->createNotFoundException("Contenu introuvable");
        }
        
        $socialNetworks = $this->getDoctrine()->getRepository(SocialNetwork::class)->findBy(['active' => true], ['sequence' => 'asc']);
        $consoles = $this->getDoctrine()->getRepository(Console::class)->findBy(['active' => true], ['sequence' => 'asc']);
        $screens = $this->getDoctrine()->getRepository(Screen::class)->findBy(['active' => true], ['sequence' => 'asc']);
        $reservation = new Reservation();
        $reservation->setFormule($formule);
        $reservation->setDuration(1);
        $form = $this->createForm(ReservationFormType::class, $reservation);
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($reservation);
            $entityManager->flush();
            
            $email = (new TemplatedEmail())
            ->from($this->getParameter('app.info.email'))
            ->to($config->getContactFormEmailTo()? $config->getContactFormEmailTo() : $this->getParameter('app.contact.email'))
            ->subject('Réservation - '. $reservation->getFormule()->getName())
            ->htmlTemplate('emails/reservation.html.twig')
            ->context([
                'reservation' => $reservation,
            ]);
            
            if($reservation->getEmail()){
                $email = (new TemplatedEmail())
                ->from($this->getParameter('app.info.email'))
                ->to($reservation->getEmail())
                ->subject('Votre réservation')
                ->htmlTemplate('emails/reservation_customer.html.twig')
                ->context([
                    'reservation' => $reservation,
                ]);
            }
            
            
            
            $this->mailer->send($email);
            
            $this->addFlash('reservation_msg', 'Votre réservation a été enregistré avec succès.');
        }
        
        return $this->render('public/pages/formule.html.twig', [
            'config' => $config,
            'socialNetworks' => $socialNetworks,
            'formule' => $formule,
            'reservation' => $reservation,
            'consoles' => $consoles,
            'screens' => $screens,
            'form' => $form->createView()
        ]);                
    }

    public function contactForm()
    {
        $config = $this->getDoctrine()->getRepository(SiteConfig::class)->findAll()[0];
        $contactForm = new ContactForm();
        $form = $this->createForm(ContactFormType::class, $contactForm);
        
        return $this->render('public/pages/contact_form/_form.html.twig', [
            'config' => $config,
            'contactForm' => $contactForm,
            'form' => $form->createView(),
        ]);
    }
    
     /**
     * @Route("/contact", name="contact",  methods={"GET","POST"})
     */
    public function contactAction(Request $request)
    {
        $config = $this->getDoctrine()->getRepository(SiteConfig::class)->findAll()[0];
        $contactForm = new ContactForm();
        $form = $this->createForm(ContactFormType::class, $contactForm);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contactForm);
            $entityManager->flush();
            
            $email = (new Email())
            ->from(new Address($contactForm->getEmail(), $contactForm->getName()))
            ->to($config->getContactFormEmailTo()? $config->getContactFormEmailTo() : $this->getParameter('app.contact.email'))
            ->subject($contactForm->getSubject())
            ->text($contactForm->getMessage());
            
            $this->mailer->send($email);
            
            if($contactForm->getHasCopy()){
                $email = (new Email())
                ->from(new Address(($config->getContactFormEmailTo()? $config->getContactFormEmailTo() : $this->getParameter('app.contact.email')), $this->getParameter('app.contact.name')))
                ->to($contactForm->getEmail())
                ->subject($contactForm->getSubject())
                ->html($contactForm->getMessage());
                
                $this->mailer->send($email);
            }
            
            $this->addFlash('app_msg', 'Votre message a été envoyé avec succès.');
        }
        
        return $this->render('public/pages/contact_form/contact.html.twig', [
            'config' => $config,
            'contactForm' => $contactForm,
            'form' => $form->createView(),
        ]);
    }
    
    function newsletterForm() {
        $formData = ['email' => ''];
        $form = $this->createFormBuilder($formData)
            ->add('email', EmailType::class)
            ->getForm();
        
        return $this->render('public/fragments/newsletter.html.twig', ['form' => $form->createView()]);
    }
    
    /**
     * @Route("/newsletter/new", name="newsletter_save", methods={"POST"}, options = {"expose" = false})
     */
    public function newsletterSave(Request $request): JsonResponse
    {
        $form = $this->createFormBuilder(['email' => ''])
            ->add('email', EmailType::class)
            ->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $emailExist = $this->getDoctrine()->getRepository(NewsletterEmail::class)->findOneByEmail($form->getData()['email']);
            
            if($emailExist){
                return (new JsonResponse(['message' => 'Vous êtes déjà abonné(e) à notre newsletter 😉']));
            }
            
            $emailNewsletter = (new NewsletterEmail())->setEmail($form->getData()['email']);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($emailNewsletter);
            $entityManager->flush();
            
            $response = new JsonResponse(['message' => 'Félicitations votre abonnement à la newsletter avec l\'adresse <strong>'. $form->getData()['email'] .'</strong> a réussi !!!']); 
            
            return $response;
        }
        
        return new JsonResponse();
    }

    /**
     * @Route("/gallery", name="gallery")
     */
    public function galleryAction()
    {
        $config = $this->getDoctrine()->getRepository(SiteConfig::class)->findAll()[0];
        $galleryCategories = $this->getDoctrine()->getRepository(GalleryCategory::class)->findBy(['active' => true], ['sequence' => 'asc']);
        $medias = $this->getDoctrine()->getRepository(GalleryMedia::class)->findBy(['active' => true], ['sequence' => 'asc']);
        
        return $this->render('public/pages/gallery.html.twig', [
            'config' => $config,
            'galleryCategories' => $galleryCategories,
            'medias' => $medias,
        ]);
    }
    
    function siteInfosbar() {
        $config = $this->getDoctrine()->getRepository(SiteConfig::class)->findAll()[0];
        $socialNetworks = $this->getDoctrine()->getRepository(SocialNetwork::class)->findBy(['active' => true], ['sequence' => 'asc']);
        
        return $this->render('public/fragments/infos_bar.html.twig', [
            'config' => $config,
            'socialNetworks' => $socialNetworks,
        ]);
    }
    
    function siteNavbar() {
        $config = $this->getDoctrine()->getRepository(SiteConfig::class)->findAll()[0];
        $mainMenu = $this->getDoctrine()->getRepository(Menu::class)->findBy(['position' => 'HEADER', 'active' => true])[0];
        $mainLinks = $this->getDoctrine()->getRepository(Link::class)->findBy(['menu' => $mainMenu, 'active' => true], ['sequence' => 'asc']);
        
        return $this->render('public/fragments/nav_bar.html.twig', [
            'config' => $config,
            'mainLinks' => $mainLinks
        ]);
    }
    
    function siteFooter() {
        $config = $this->getDoctrine()->getRepository(SiteConfig::class)->findAll()[0];
        $socialNetworks = $this->getDoctrine()->getRepository(SocialNetwork::class)->findBy(['active' => true], ['sequence' => 'asc']);
        $mainMenu = $this->getDoctrine()->getRepository(Menu::class)->findBy(['position' => 'HEADER', 'active' => true])[0];
        $mainLinks = $this->getDoctrine()->getRepository(Link::class)->findBy(['menu' => $mainMenu, 'active' => true], ['sequence' => 'asc']);
        
        return $this->render('public/fragments/footer.html.twig', [
            'config' => $config,
            'socialNetworks' => $socialNetworks,
            'mainLinks' => $mainLinks
        ]);
    }
    
    /**
     * @Route("/events", name="events")
     */
    public function eventsAction()
    {
        $config = $this->getDoctrine()->getRepository(SiteConfig::class)->findAll()[0];
        $socialNetworks = $this->getDoctrine()->getRepository(SocialNetwork::class)->findBy(['active' => true], ['sequence' => 'asc']);
        $mainMenu = $this->getDoctrine()->getRepository(Menu::class)->findBy(['position' => 'HEADER', 'active' => true])[0];
        $mainLinks = $this->getDoctrine()->getRepository(Link::class)->findBy(['menu' => $mainMenu, 'active' => true], ['sequence' => 'asc']);
         
        return $this->render('public/pages/events.html.twig', [
            'config' => $config,
            'socialNetworks' => $socialNetworks,
            'mainLinks' => $mainLinks
        ]);
    }

    /**
     * @Route("/event/sample-event", name="event_detail")
     */
    public function eventDetailAction()
    {
        $config = $this->getDoctrine()->getRepository(SiteConfig::class)->findAll()[0];
        $socialNetworks = $this->getDoctrine()->getRepository(SocialNetwork::class)->findBy(['active' => true], ['sequence' => 'asc']);
        $mainMenu = $this->getDoctrine()->getRepository(Menu::class)->findBy(['position' => 'HEADER', 'active' => true])[0];
        $mainLinks = $this->getDoctrine()->getRepository(Link::class)->findBy(['menu' => $mainMenu, 'active' => true], ['sequence' => 'asc']);
         
        return $this->render('public/pages/event_detail.html.twig', [
            'config' => $config,
            'socialNetworks' => $socialNetworks,
            'mainLinks' => $mainLinks
        ]);
    }


    /**
     * @Route("/group/chat", name="group_chat")
     */
    public function groupChatAction()
    {
  // 		$client = new Client(new Version1X('http://localhost:8090'));

		// $client->initialize();
		// $client->emit('connection', ['foo' => 'bar']);
		// $client->close();

        return $this->render('front/group_chat.html.twig', [
            'maliste' => []
        ]);
    }
}
