<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2011 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  Andreas Schempp 2009-2012
 * @author     Andreas Schempp <andreas@schempp.ch>
 * @license    http://opensource.org/licenses/lgpl-3.0.html
 */


/**
 * Fields
 */
$GLOBALS['TL_LANG']['tl_form_field']['dateFormat']     = array('Datumsformat', 'Der Datumsformat-String wird mit der PHP-Funktion date() geparst.');
$GLOBALS['TL_LANG']['tl_form_field']['dateStart']      = array('Startdatum', 'Wählen Sie ein Startdatum (frei lassen für keine Einschränkug)');
$GLOBALS['TL_LANG']['tl_form_field']['dateParseValue'] = array('Standard-Wert konvertieren', 'Den Standard-Wert mittels PHP <a href="http://php.net/strtotime" onclick="window.open(this.href); return false">strtotime()</a> analysieren.');
$GLOBALS['TL_LANG']['tl_form_field']['dateExcludeCSS'] = array('CSS-Datei nicht einbinden', 'Aktivieren Sie diese Option wenn Sie ein eigenes Stylesheet für das Popup einbinden wollen.');
$GLOBALS['TL_LANG']['tl_form_field']['dateImage']      = array('Kalender-Icon anzeigen', 'Klicken Sie hier um das Kalender-Icons anzuzeigen.');
$GLOBALS['TL_LANG']['tl_form_field']['dateImageSRC']   = array('Eigenes Icons', 'Wählen Sie ein Icons, welches anstelle dem Standardbild verwendet werden soll.');
$GLOBALS['TL_LANG']['tl_form_field']['dateImageOnly']  = array('Nur Datumsauswahl erlauben', 'Klicken Sie hier wenn das Datum nicht von Hand im Feld eingegeben werden darf.');