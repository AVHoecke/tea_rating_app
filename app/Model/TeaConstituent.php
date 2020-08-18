<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class TeaConstituent extends AppModel
{
    public $belongsTo = array('Tea','Ingredient');
    public $hasOne = array('Quantity');
}
