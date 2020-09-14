<?php
class TeasController extends AppController
{
    public $components = ['Flash'];
    public $helpers = ['Html', 'Form', 'Flash'];
    public $uses = ['Tea', 'Ingredient'];

    public function index()
    {
        $this->set('teas', $this->Tea->find('all'));
    }

    public function view($id)
    {
        if (!$id) {
            throw new NotFoundException(__('Invalid tea'));
        }

        $tea = $this->Tea->find('threaded', [
                'conditions' => ['tea_id' => $id],
                'recursive' => 3,
            ]);
        if (!$tea[0]) {
            throw new NotFoundException(__('Invalid tea'));
        }
        $this->set('tea', $tea[0]);
    }

    public function add()
    {
        $this->set('ingredients', $this->Ingredient->find('list'));
        
        $this->set('ratingScores', $this->Tea->Rating->RatingScore->find('list', [
            'fields' => 'RatingScore.score',
        ]));
        
        if ($this->request->is('post')) {
            if (!$this->Tea->saveAssociated($this->request->data, ['deep' => true,])) {
                $this->Flash->error(__('Unable to add your tea and its properties.'));
            } else {
                $this->Flash->success(__('Your tea and its properties been saved.'));
            };
            return $this->redirect(['action' => 'index']);
        }
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
