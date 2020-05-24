<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Tea extends AppModel
{
    public $validate = array();

    public $hasAndBelongsToMany = array(
        'Ingredient' =>
        array(
            'className' => 'Ingredient',
            'joinTable' => 'tea_components',
            'associationForeignKey' => 'ingredient_id',
            'with' => 'TeaComponent',
            'unique' => true
        )
    );

    public $hasMany = 'TeaComponent';

    public $hasOne = 'Rating';

    // public $hasAndBelongsToMany = array(
    //     'Ingredient' =>
    //         array(
    //             'className' => 'Ingredient',
    //             'joinTable' => 'ingredients_teas_quantities',
    //             'foreignKey' => 'tea_id',
    //             'associationForeignKey' => 'ingredient_id'
    //         )
    //         );
}
