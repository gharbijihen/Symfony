<?php

<<<<<<< HEAD
namespace App\Controller;

use App\Entity\Author; // Assurez-vous d'importer la classe Author
use App\Form\AuthorType;
=======

namespace App\Controller;

use App\Entity\Author;
use App\Form\AuthorType; // Ajout de l'importation de la classe AuthorType
use App\Repository\AuthorRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
>>>>>>> ebbd357 ('s4')
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

<<<<<<< HEAD
class AuthorController extends AbstractController
{
    #[Route('/addAuthor', name: 'addAuthor')]
    public function addAuthor(Request $request)
    {
        $author = new Author(); // Créez une nouvelle instance de l'entité Author
        $form = $this->createForm(AuthorType::class, $author);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($author);
            $entityManager->flush();

            return $this->redirectToRoute('liste_des_auteurs'); // Redirigez l'utilisateur vers la liste des auteurs après l'ajout
        }

        return $this->render('author/add_author.html.twig', [
            'form' => $form->createView(),
        ]);
    }
=======

class AuthorController extends AbstractController
{
    
>>>>>>> ebbd357 ('s4')
    public $authors = array(


        array(
            'id' => 1, 'picture' => '/images/Victor-Hugo.jpg',
            'username' => ' Victor Hugo', 'email' => 'victor.hugo@gmail.com ', 'nb_books' => 100
        ),
        array(
            'id' => 2, 'picture' => '/images/william-shakespeare.jpg',
            'username' => ' William Shakespeare', 'email' => ' william.shakespeare@gmail.com', 'nb_books' => 200
        ),
        array(
            'id' => 3, 'picture' => '/images/Taha_Hussein.jpg',
            'username' => ' Taha Hussein', 'email' => 'taha.hussein@gmail.com', 'nb_books' => 300
        ),
    );

    #[Route('/author', name: 'app_author')]
    public function index(): Response
    {
        return $this->render('author/index.html.twig', [
            'controller_name' => 'AuthorController',
        ]);
    }

<<<<<<< HEAD
    #[Route('/author/{n}', name: 'app_show')]
    public function showAuthor($n)
    {
        return $this->render('author/show.html.twig', ['name' => $n]);
    }

    #[Route('/list', name: 'list')]
    public function list()
    {
        $authors = array(
            array('id' => 1, 'picture' => 'images/victor-hugo.jpg', 'username' => 'Victor Hugo', 'email' =>
            'victor.hugo@gmail.com ', 'nb_books' => 100),
            array('id' => 2, 'picture' => 'images/william-shakespeare.jpg', 'username' => ' William Shakespeare', 'email' =>
            ' william.shakespeare@gmail.com', 'nb_books' => 200),
            array('id' => 3, 'picture' => 'images/Taha_Hussein.jpg', 'username' => 'Taha Hussein', 'email' =>
            'taha.hussein@gmail.com', 'nb_books' => 300),
        );
        return $this->render('author/list.html.twig', ['authors' => $authors]);
    }
    #[Route('/show/{id}', name: 'show')]
    public function auhtorDetails($id)
=======
    #[Route('/author/{id}', name: 'app_show')]
    public function showAuthor($id,AuthorRepository $repoA){
        $author=$repoA->find($id);
      return $this->render('author/show.html.twig',['author'=>$author]);
    }
    #[Route('/list',name: 'list')]
    public function list(){
        $authors = array(
            array('id' => 1, 'picture' => 'images/victor-hugo.jpg','username' => 'Victor Hugo', 'email' =>
                'victor.hugo@gmail.com ', 'nb_books' => 100),
            array('id' => 2, 'picture' => 'images/william-shakespeare.jpg','username' => ' William Shakespeare', 'email' =>
                ' william.shakespeare@gmail.com', 'nb_books' => 200 ),
            array('id' => 3, 'picture' => 'images/Taha_Hussein.jpg','username' => 'Taha Hussein', 'email' =>
                'taha.hussein@gmail.com', 'nb_books' => 300),
        );
    return $this->render('author/list.html.twig',['authors'=>$authors]);
    }
    #[Route('/show/{id}',name: 'show')]
    public function auhtorDetails ($id)
>>>>>>> ebbd357 ('s4')
    {
        $author = null;
        // Parcourez le tableau pour trouver l'auteur correspondant à l'ID
        foreach ($this->authors as $authorData) {
            if ($authorData['id'] == $id) {
                $author = $authorData;
            };
        };
<<<<<<< HEAD
        return $this->render('author/ShowAuthor.html.twig', [
=======
        return $this->render('author/showAuthor.html.twig', [
>>>>>>> ebbd357 ('s4')
            'author' => $author,
            'id' => $id
        ]);
    }
<<<<<<< HEAD

    #[Route('/listAuthor', name: 'listAuthor')]
    public function listAuthor()
    {
        $authors = array(
            array('id' => 1, 'picture' => 'images/victor-hugo.jpg', 'username' => 'Victor Hugo', 'email' =>
            'victor.hugo@gmail.com ', 'nb_books' => 100),
            array('id' => 2, 'picture' => 'images/william-shakespeare.jpg', 'username' => ' William Shakespeare', 'email' =>
            ' william.shakespeare@gmail.com', 'nb_books' => 200),
            array('id' => 3, 'picture' => 'images/Taha_Hussein.jpg', 'username' => 'Taha Hussein', 'email' =>
            'taha.hussein@gmail.com', 'nb_books' => 300),
        );
        return $this->render('author/listAuthor.html.twig', ['authors' => $authors]);
    }

    public function AddFormAuhor(Request $request)
    {
        $author = new Author();
        $form = $this->createForm(AuthorType::class, $author);
    }
}
=======
            //afficher la liste des auteurs
    #[Route('/listAuthor', name: 'app_list')]
    public function affiche(AuthorRepository $ARepo, ManagerRegistry $doctrine): Response
    {

        $em = $doctrine->getManager();
        $authors = $ARepo->findAll();

        return $this->render('author/affiche.html.twig', [

            'authors' => $authors

        ]);
    }
   
    //ajouter a partir d'un formulaire
    #[Route("/form/new", name:'form_new')]
    
   public function newUser(Request $request,ManagerRegistry $manager)
   {
       $authors = new Author(); 
       //ijecter le formualire
       $form = $this->createForm(AuthorType::class, $authors);
       $form->handleRequest($request);
       if($form->isSubmitted()){
        $em=$manager->getManager();
        $em->persist($authors);
        $em->flush();
        return $this->redirectToRoute('app_list');
    }


       return $this->render('author/form.html.twig', ['form' => $form->createView()]);  

    }
//ajouter author dans la base de maniere statique
    #[Route("/add-author", name: 'add_author')]
    public function addAuthor(ManagerRegistry $manager)
    {
        // Créez une nouvelle instance de l'auteur
        $authors = new Author();
        //je veux ajouter ses deux attribut
        $authors->setUsername('testStatic');
        $authors->setEmail('test@gmail.com');
        // recuperer le manager
        $em=$manager->getManager();
        $em->persist($authors);
        $em->flush();

            return new Response('Author added succesfully');
        }

//modifier le formulaire
    #[Route("/edit-author/{id}", name: 'edit_author')]
public function editAuthor($id, Request $request,AuthorRepository $rep,ManagerRegistry $manager)
{
   //chercher l'author
    $authors = $rep->find($id);
   //creer le formulaire
    $form = $this->createForm(AuthorType::class, $authors);
    $form->handleRequest($request);
       if($form->isSubmitted()){
        $em=$manager->getManager();
        $em->persist($authors);
        $em->flush();
        return $this->redirectToRoute('app_list');}
    return $this->render('author/edit.html.twig', ['form' => $form->createView(), ]);

}

#[Route("/delete-author/{id}", name: 'delete_author')]
public function deleteAuthor(Request $request,$id, ManagerRegistry $manager,AuthorRepository $authorRepository): Response
{
    // Récupérez l'auteur depuis la base de données en utilisant l'ID
    $authors = $authorRepository->find($id);


    //injecter
    $em =$manager->getManager();
    // Supprimez l'auteur
    $em->remove($authors);
    $em->flush();

    return $this->redirectToRoute('app_list'); 
}

}





>>>>>>> ebbd357 ('s4')
