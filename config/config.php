<?php
/**
 * Core Configurations.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       Cake.Config
 * @since         CakePHP(tm) v 1.1.11.4062
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
namespace config;


$versionFile = file(CAKE . 'VERSION.txt');
$config['Cake.version'] = trim(array_pop($versionFile));
return $config;