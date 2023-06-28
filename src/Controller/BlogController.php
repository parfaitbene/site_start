<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;
use App\Entity\Module\ModuleArticle;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog/article/{slug}", name="blog_article")
     */
    public function articleAction(): Response
    {
        $article = $this->getDoctrine()->getRepository(Article::class)->findOneBy(['slug' => $slug]);
        
        if(!$article){
            throw $this->createNotFoundException("Contenu introuvable");
        }
        
        return $this->render('blog/index.html.twig', [
            'article' => $article,
        ]);
    }
    
    public function moduleArticle(ModuleArticle $module) {
        $lastArticles = $this->getDoctrine()->getRepository(Article::class)->findBy(
                    ['isPublished' => true], 
                    ['id' => 'desc'], 
                    $module->getArticleNbr() ? $module->getArticleNbr() : 3
                );
        
        return $this->render('public/fragments/modules_templates/t_module_article.html.twig', [
            'module' => $module,
            'lastArticles' => $lastArticles
        ]);
    }
}
