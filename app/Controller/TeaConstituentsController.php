<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class TeaConstituentsController extends AppController
{
    public $helpers = ['Html'];
    public $uses = ['Tea','MeasurementType','TeaConstituent'];
    
    public function getConstituentHtmlElement($constituentNumber)
    {
        $this->layout = 'ajax';
        $this->set('constituentNumber', $constituentNumber);
        $this->set('measurementTypeNames', $this->MeasurementType->getMeasurementTypeNAMES());
        $this->render('/Elements/TeaConstituents/teaConstituent');
    }

    public function delete($id)
    {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        $this->TeaConstituent->delete($id);
        $this->autoRender = false;
    }
}
