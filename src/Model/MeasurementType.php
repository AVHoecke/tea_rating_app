<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Model;

use App\Model\AppModel;


class MeasurementType extends AppModel
{
    public $hasMany = 'Measurement';
    public function getMeasurementTypeNAMES()
    {
        return $this->find('list', [
            'fields' => 'MeasurementType.name',
        ]);
    }
}