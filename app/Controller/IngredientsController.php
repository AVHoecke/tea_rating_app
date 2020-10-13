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

    public function delete($id)
    {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Ingredient->delete($id)) {
            $this->Flash->success(
                __('The ingredient with id: %s has been deleted.', h($id))
            );
        } else {
            $this->Flash->error(
                __('The ingredient with id: %s could not be deleted.', h($id))
            );
        }

        return $this->redirect(['action' => 'index']);
    }
}
