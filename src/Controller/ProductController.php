<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Doctrine\Persistence\ManagerRegistry;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/product', name: 'app_product')]
    public function index(ProductRepository $productRepository): Response
    {
    //не сработал запрос из вебинара, ругается getDoctrine() и getManager()
    //   $manager = $this->getDoctrine()->getManager();
    //  $repository = $manager->getRepository(Product::class);
    //  $products=$repository->findAll();
     
       $products = $productRepository->findAll();
     //   var_dump($products);
     //   die();
        
        return $this->render('product/index.html.twig', [
            'products' => $products,
        ]);
     //   return $this->render('product/index.html.twig', [
     //       'controller_name' => 'ProductController',
     //   ]);
    }

    #[Route('/product/create', name: 'create_product')]
    public function createProduct(ManagerRegistry $managerRegistry) : RedirectResponse
    {
        $manager=$managerRegistry->getManager();

        //создание нового продукта
        $product = new Product();

        //заполнение всех столбцов БД нового продукта
        $product->setTitle('Title '.random_int(0,100));
        $product->setPrice(random_int(1,1000));
        $product->setDescription('');

        //подготовка данных для передачи
        $manager->persist($product);

        //передача данных
        $manager->flush();

        return $this->redirectToRoute('product');
    }
}
