<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Quantity extends AppModel {
    public $validate = array(
        'type' => array(
            'rule' => 'notBlank'
        )
    );

    public $belongsTo = 'TeaConstituent';
}