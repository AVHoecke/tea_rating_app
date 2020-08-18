<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Tea extends AppModel
{
    public $validate = array();

    // public $hasAndBelongsToMany = array(
    //     'Ingredient' =>
    //     array(
    //         'className' => 'Ingredient',
    //         'joinTable' => 'components_teas',
    //         'associationForeignKey' => 'ingredient_id',
    //         'with' => 'TeaConstituent',
    //         'unique' => true
    //     )
    // );

    public $hasMany = 'TeaConstituent';

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
