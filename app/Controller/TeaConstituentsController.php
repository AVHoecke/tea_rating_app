<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class TeaConstituentsController extends AppController
{
    public $helpers = array('Html');
    public function htmlElement($constituentNumber)
    {
        $this->layout = 'ajax';
        $this->set('constituentNumber', $constituentNumber);
        $this->render('/Elements/TeaConstituents/singleTeaConstituent');
    }
}
