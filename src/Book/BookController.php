<?php

namespace LRC\Book;

use \LRC\Form\ModelForm as Form;

/**
 * Controller for books.
 */
class BookController extends \LRC\Common\BaseController
{
    /**
     * @var \LRC\Database\Repository    Book repository.
     */
    private $books;
    
    
    /**
     * Constructor (see base class).
     */
    public function __construct($di)
    {
        parent::__construct($di);
        $this->books = $this->di->repository->books;
    }
    
    
    /**
     * View all books.
     */
    public function index()
    {
        $this->di->view->add('book/index', ['books' => $this->books->getAll()]);
        $this->di->common->renderPage('Böcker');
    }
    
    
    /**
     * View single book.
     *
     * @param int $id   Book ID.
     */
    public function get($id)
    {
        $book = $this->books->find('id', $id);
        if (!$book) {
            $this->di->session->set('err', "Kunde inte hitta boken med ID $id.");
            $this->di->common->redirect('book');
        }
        
        $this->di->view->add('book/view', ['book' => $book]);
        $this->di->common->renderPage('Visa bok', null, ['title' => 'Visa bok: ' . htmlspecialchars($book->title)]);
    }
    
    
    /**
     * Create book.
     */
    public function create()
    {
        $form = new Form('book-form', Book::class);
        if ($this->di->request->getMethod() == 'POST') {
            // handle form post
            $book = $form->populateModel(null, ['id']);
            $form->validate();
            if ($form->isValid()) {
                $this->books->save($book);
                $this->di->session->set('msg', 'Boken "' . htmlspecialchars($book->title) . '" har lagts till.');
                $this->di->common->redirect('book');
            } else {
                $this->di->session->set('err', 'Formuläret innehåller ' . count($form->getErrors()) . ' fel.');
            }
        }
        
        $this->di->view->add('book/form', [
            'form' => $form,
            'book' => $form->getModel(),
            'submit' => 'Lägg till'
        ]);
        $this->di->common->renderPage('Lägg till bok');
    }
    
    
    /**
     * Update book.
     *
     * @param int $id   Book ID.
     */
    public function update($id)
    {
        $oldBook = $this->books->find('id', $id);
        if (!$oldBook) {
            $this->di->session->set('err', "Kunde inte hitta boken med ID $id.");
            $this->di->common->redirect('book');
        }
        
        $form = new Form('book-form', $oldBook);
        if ($this->di->request->getMethod() == 'POST') {
            // handle form post
            $book = $form->populateModel(null, ['id']);
            $form->validate();
            if ($form->isValid()) {
                $this->books->save($book);
                $this->di->session->set('msg', 'Boken "' . htmlspecialchars($book->title) . '" har uppdaterats.');
                $this->di->common->redirect('book');
            } else {
                $this->di->session->set('err', 'Formuläret innehåller ' . count($form->getErrors()) . ' fel.');
            }
        } else {
            $book = $oldBook;
        }
        
        $this->di->view->add('book/form', [
            'form' => $form,
            'book' => $book,
            'submit' => 'Spara'
        ]);
        $this->di->common->renderPage('Redigera bok', null, ['title' => 'Redigera bok: ' . htmlspecialchars($book->title)]);
    }
    
    
    /**
     * Delete book.
     *
     * @param int $id   Book ID.
     */
    public function delete($id)
    {
        $book = $this->books->find('id', $id);
        if (!$book) {
            $this->di->session->set('err', "Kunde inte hitta boken med ID $id.");
            $this->di->common->redirect('book');
        }
        
        if ($this->di->request->getMethod() == 'POST') {
            // handle form post
            if ($this->di->request->getPost('action') == 'delete') {
                $this->books->delete($book);
                $this->di->session->set('msg', 'Boken "' . htmlspecialchars($book->title) . '" har tagits bort.');
                $this->di->common->redirect('book');
            }
        }
        
        $this->di->view->add('book/delete', ['book' => $book]);
        $this->di->common->renderPage('Ta bort bok', null, ['title' => 'Ta bort bok: ' . htmlspecialchars($book->title)]);
    }
}
