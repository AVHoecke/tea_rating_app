<?php
class TeasController extends AppController
{

    public $components = array('Flash');
    public $helpers = array('Html', 'Form', 'Flash');
    public $uses = array('Tea', 'Ingredient', 'TeaComponent');

    public function index()
    {
        $this->set('teas', $this->Tea->find('all'));
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

    public function add()
    {
        //Add function 1.2.2 multiple TeaComponents save (W)
        $this->set('ingredients', $this->Ingredient->find('list'));
        if ($this->request->is('post')) {
            if ($this->Tea->save($this->request->data)) {
                $currentTeaId = $this->Tea->id;
                // pseudo: if data[teaComponents] has at least one valid teaComponent (do the teacomonenty loop)
                foreach ($this->request->data['TeaComponent'] as $teacomponenty) {
                    $this->TeaComponent->create();
                    $teacomponenty['tea_id'] = $currentTeaId;
                    $this->TeaComponent->set($teacomponenty);
                    if (!$this->TeaComponent->saveAssociated($teacomponenty)) {
                        $this->Flash->error(__('Unable to add your tea/ingredient.'));
                    } else {
                        $this->Flash->success(__('Your tea component: "' . $teacomponenty['Ingredient']['name'] . '" has been saved.'));
                    };
                }
            } else {
                $this->Flash->error(__('Unable to add your Tea.'));
            }
            $this->Flash->success(__('Your tea and its properties been saved.'));
            return $this->redirect(array('action' => 'index'));

            // // Add function 1.1 single TeaComponent save (W)
            // $this->set('ingredients', $this->Ingredient->find('list'));
            // if ($this->request->is('post')) {
            //     // function 1.1.1 (working)
            //     $this->request->data['TeaComponent']['ingredient_id'] = $this->request->data['TeaComponent']['ingredients'];
            //     if ($this->TeaComponent->saveAssociated($this->request->data, array('deep'
            //     /* and now go 'deep'! becaus otherwise you do not get your Quantity saved for free! */
            //     => true))) {
            //         $this->Flash->success(__('Your tea and its properties been saved.'));
            //         return $this->redirect(array('action' => 'index'));
            //     };
            //     $this->Flash->error(__('Unable to add your tea/ingredient.'));
            // }

        }
    }

    // public function edit($id = null)
    // {
    //     if (!$id) {
    //         throw new NotFoundException(__('Invalid tea'));
    //     }

    //     $tea = $this->Tea->findById($id);
    //     if (!$tea) {
    //         throw new NotFoundException(__('Invalid tea'));
    //     }
    //     if ($this->request->is(array('post', 'put'))) {
    //         $this->Tea->id = $id;
    //         Debugger::dump($tea);
    //         $this->set('ingredients', 'test');
    //     }
    // }

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

        return $this->redirect(array('action' => 'index'));
    }
}
