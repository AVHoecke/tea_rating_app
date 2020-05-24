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
            // OMG TAST WAS STILL HERE!
            // I HOPE MY "Call to a member function find() on null" DISAPPEARS NOW
            //dam it didn't
            // The Ingredient Model was not available! (added it throug "public $uses = array('Recipe', 'User');")
            'rule' => 'notBlank'
        )
    );

    // public $hasOne = 'Quantity';

    // public $hasAndBelongsToMany = array(
    //     'Tea' =>
    //     array(
    //         'className' => 'Tea',
    //         'joinTable' => 'ingredients_teas',
    //         'associationForeignKey' => 'tea_id',
    //         'with' => 'IngredientTea',
    //         'unique' => true
    //     )
    // );

    //   public $hasAndBelongsToMany = array(
    //         'Tea' =>
    //         array(
    //             'className' => 'Tea',
    //             'joinTable' => 'tea_components',
    //             'associationForeignKey' => 'tea_id',
    //             'with' => 'TeaComponent',
    //             'unique' => true
    //         )
    //     );  

    public $hasMany = 'TeaComponent';
}
