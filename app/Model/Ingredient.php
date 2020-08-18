<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Ingredient extends AppModel
{
    public $validate = array(
        'name' => array(
            'rule' => 'notBlank'
        ),
        'origin' => array(
           'rule' => 'notBlank'
        )
    );

    public $hasMany = 'TeaConstituent';
}
