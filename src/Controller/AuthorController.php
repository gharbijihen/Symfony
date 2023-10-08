<?php

namespace App\Controller;

use App\Entity\Author; // Assurez-vous d'importer la classe Author
use App\Form\AuthorType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
    {
        $author = null;
        // Parcourez le tableau pour trouver l'auteur correspondant à l'ID
        foreach ($this->authors as $authorData) {
            if ($authorData['id'] == $id) {
                $author = $authorData;
            };
        };
        return $this->render('author/ShowAuthor.html.twig', [
            'author' => $author,
            'id' => $id
        ]);
    }

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
