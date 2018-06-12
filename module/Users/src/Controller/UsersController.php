<?php
/**
 * Created by PhpStorm.
 * User: roche
 * Date: 11/06/2018
 * Time: 11:15
 */
namespace Users\Controller;

use Users\Form\UserForm;
use Users\Model\User;
use Users\Model\UserTable;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class UsersController extends AbstractActionController
{
    private $table;
    public function __construct(UserTable $table)
    {
        $this->table = $table;
    }
    public function indexAction()
    {
        $userTable = $this->table;
        return new ViewModel([
            'users'=> $userTable->fetchAll()
        ]);
    }
    public function addAction()
    {
        $form = new UserForm();
        $form->get('submit')->setValue('Cadastrar');
        $request = $this->getRequest();
        if(!$request->isPost()){
            return ['form'=>$form];
        }
        $form->setData($request->getPost());
        if(!$form->isValid()){
            return ['form'=>$form];
        }
        $user = new User();
        $user->exchangeArray($form->getData());
        $this->table->save($user);
        return $this->redirect()->toRoute('user');
    }
    public function editAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if(!$id){
            return $this->redirect()->toRoute('user');
        }
        try {
            $user = $this->table->find($id);
        } catch (\Exception $e) {
            return $this->redirect()->toRoute('user');
        }
        $form = new UserForm();
        $form->bind($user);
        $form->get('submit')->setAttribute('value', 'Editar');
        $request = $this->getRequest();
        if(!$request->isPost()){
            return [
                'id'=>$id,
                'form'=>$form
            ];
        }
        $form->setData($request->getPost());
        if(!$form->isValid()){
            return [
                'id'=>$id,
                'form'=>$form
            ];
        }
        $this->table->save($user);
        return $this->redirect()->toRoute('user');
    }
    public function deleteAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if(!$id){
            return $this->redirect()->toRoute('user');
        }
        $this->table->delete($id);
        return $this->redirect()->toRoute('user');
    }
}