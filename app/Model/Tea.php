<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Tea extends AppModel
{
    public $validate = [
        'name' => [
            'rule' => 'notBlank'
        ]
    ];

    public $hasMany = 'TeaConstituent';

    public $hasOne = 'Rating';
}
