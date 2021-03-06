<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2012 Leo Feyer
 * 
 * @package Calendarfield
 * @link    http://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	'FormDatepickerField' => 'system/modules/bootstrap-datepicker/FormDatepickerField.php',
	'DatepickerField' => 'system/modules/bootstrap-datepicker/DatepickerField.php',
));

TemplateLoader::addFiles(array
(
    'form_datepicker' => 'system/modules/bootstrap-datepicker/templates'
));