<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Measurement extends AppModel
{
    public $validate;
    public $belongsTo = ['TeaConstituent','MeasurementType'];
}
