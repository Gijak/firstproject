<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends Controller
{

    /**
     * @Route("/product/{productId}", name="product")
     */
    public function indexAction($productId)
    {

        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository('AppBundle:Product')->findOneById($productId);

        echo '<pre>';
        print_r($product);
        exit;


        echo '<img src="' . $product->getImage() . '">';


        return $this->render("::base.html.twig");
    }

    /**
     * @Route("/Page")
     */
    public function showIndex()
    {
        return $this->render('Page/ProductPage.html.twig');


    }

    /**
     * @Route("/products", name="products")
     */
    public function showAction()
    {
        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository('AppBundle:Product')->findAll();

        echo '<pre>';
        print_r($product);
        exit;

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id' . $productId
            );
        }

    }

}

