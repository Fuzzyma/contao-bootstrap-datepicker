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
	'FormDatePickerField' => 'system/modules/calendarfield/FormDatePickerField.php',
));

TemplateLoader::addFiles(array
(
    'form_datepicker' => 'system/modules/datepicker/templates/form_datepicker'
));