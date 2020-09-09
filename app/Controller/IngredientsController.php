<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class IngredientsController extends AppController
{
    public $components = ['Flash'];
    public $helpers = ['Html', 'Form', 'Flash'];
    

    public function index()
    {
        $this->set('ingredients', $this->Ingredient->find('all'));
    }

    public function view($id)
    {
        if (!$id) {
            throw new NotFoundException(__('Invalid tea'));
        }
        
        $tea = $this->Tea->findById($id);
        if (!$tea) {
            throw new NotFoundException(__('Invalid tea'));
        }
        $this->set('tea', $tea);
    }

    public function delete($id)
    {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Tea->delete($id)) {
            $this->Flash->success(
                __('The tea with id: %s has been deleted.', h($id))
            );
        } else {
            $this->Flash->error(
                __('The tea with id: %s could not be deleted.', h($id))
            );
        }

        return $this->redirect(['action' => 'index']);
    }
}
