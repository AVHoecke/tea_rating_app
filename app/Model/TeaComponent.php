<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class TeaComponent extends AppModel
{
    // public $belongsTo = array('Tea');
    public $belongsTo = array('Tea','Ingredient');
    // public $hasMany = array('Ingredient');
    public $hasOne = array('Quantity');

    
}
