<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main")
     */
    public function index()
    {
        return $this->render('main/index.html.twig');
    }
        /**
        * @Route("/about_us", name="about_us")
        */
            public function about_us()
            {
                return $this->render('main/about_us.html.twig');
            }
        /**
        * @Route("/shop", name="shop")
        */
            public function shop()
            {
                return $this->render('main/about_us.html.twig');
            }
}
