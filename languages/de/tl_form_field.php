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


$GLOBALS['TL_LANG']['tl_form_field']['simple_config'] = 'Grundlegende Einstellungen';
$GLOBALS['TL_LANG']['tl_form_field']['file_config'] = 'Datei Einstellungen';
$GLOBALS['TL_LANG']['tl_form_field']['pickerlayout_legend'] = 'Picker-Layout Einstellungen';
$GLOBALS['TL_LANG']['tl_form_field']['viewcallback_legend'] = 'Callbacks für Anzeige der View-Modi';
$GLOBALS['TL_LANG']['tl_form_field']['datesettings_legend'] = 'Datumseinstellungen';
 
/**
 * Fields
 */
//$GLOBALS['TL_LANG']['tl_form_field']['dateFormat']     = array('Datumsformat', 'Der Datumsformat-String wird mit der PHP-Funktion date() geparst.');
//$GLOBALS['TL_LANG']['tl_form_field']['dateParseValue'] = array('Standard-Wert konvertieren', 'Den Standard-Wert mittels PHP <a href="http://php.net/strtotime" onclick="window.open(this.href); return false">strtotime()</a> analysieren.');
$GLOBALS['TL_LANG']['tl_form_field']['dateExcludeCSS']              = array('CSS-Datei nicht einbinden', 'Aktivieren Sie diese Option wenn Sie bootstraps css nicht einbinden wollen');
$GLOBALS['TL_LANG']['tl_form_field']['dateExcludeJS']               = array('JS-Datei nicht einbinden', 'Aktivieren Sie bootstraps js nicht einbinden wollen');
$GLOBALS['TL_LANG']['tl_form_field']['dateImage']                   = array('Kalender-Icon anzeigen', 'Klicken Sie hier um das Kalender-Icons anzuzeigen.');
$GLOBALS['TL_LANG']['tl_form_field']['dateImageSRC']                = array('Eigenes Icons', 'Wählen Sie ein Icons, welches anstelle dem Standardbild verwendet werden soll.');
$GLOBALS['TL_LANG']['tl_form_field']['dateImageOnly']               = array('Nur Datumsauswahl erlauben', 'Klicken Sie hier wenn das Datum nicht von Hand im Feld eingegeben werden darf.');

$GLOBALS['TL_LANG']['tl_form_field']['dateAutoclose']               = array('Automatisch Schließen', 'Schließt den Picker wenn ein Datum ausgewählt wird');
$GLOBALS['TL_LANG']['tl_form_field']['dateBeforeShowDay']           = array('Vor-Tagesanzeige', 'Funktion, die aufgerufen wird, bevor zur Tagesansicht gewechselt wird');
$GLOBALS['TL_LANG']['tl_form_field']['dateBeforeShowMonth']         = array('Vor-Monatsanzeige', 'Funktion, die aufgerufen wird, bevor zur Monatsansicht gewechselt wird');
$GLOBALS['TL_LANG']['tl_form_field']['dateBeforeShowYear']          = array('Vor-Jahresanzeige', 'Funktion, die aufgerufen wird, bevor zur Jahresansicht gewechselt wird');
$GLOBALS['TL_LANG']['tl_form_field']['dateBeforeShowDecade']        = array('Vor-Dekadenanzeige', 'Funktion, die aufgerufen wird, bevor zur Dekadensansicht gewechselt wird');
$GLOBALS['TL_LANG']['tl_form_field']['dateBeforeShowCentury']       = array('Vor-Jahrhundertsanzeige', 'Funktion, die aufgerufen wird, bevor zur Jahrhundertsansicht gewechselt wird');
$GLOBALS['TL_LANG']['tl_form_field']['dateCalendarWeeks']           = array('Kalenderwochen anzeigen');
$GLOBALS['TL_LANG']['tl_form_field']['dateClearBtn']                = array('Zurücksetzen Button');
$GLOBALS['TL_LANG']['tl_form_field']['dateContainer']               = array('Html-Container', 'Css-Selektor; in diesen wird der Datepicker eingefügt');
$GLOBALS['TL_LANG']['tl_form_field']['dateDatesDisabled']           = array('Deaktivierte Daten', 'Leerzeichen als Trennzeichen');
$GLOBALS['TL_LANG']['tl_form_field']['dateDaysOfWeekDisabled']      = array('Deaktivierte Wochentage', '06 oder 0,6 oder [0,6]');
$GLOBALS['TL_LANG']['tl_form_field']['dateDaysOfWeekHighlighted']   = array('Hervorgehobene Wochentage', '06 oder 0,6 oder [0,6]');
$GLOBALS['TL_LANG']['tl_form_field']['dateDefaultViewDate']         = array('Datum beim Öffnen', 'Setzt dieses Datum als Startdatum');
$GLOBALS['TL_LANG']['tl_form_field']['dateDisableTouchKeyboard']    = array('Softtastatur deaktivieren', 'Das öffnen der Tastatur auf Mobilen Geräten deaktivieren');
$GLOBALS['TL_LANG']['tl_form_field']['dateEnableOnReadonly']        = array('Aktiviere Readonly', 'Aktiviert den Datepicker auch auf readonly feldern');
$GLOBALS['TL_LANG']['tl_form_field']['dateEndDate']                 = array('Enddatum', 'alle späteren Daten werden deaktviert');
$GLOBALS['TL_LANG']['tl_form_field']['dateForceParse']              = array('Parsen forcieren', 'versucht auch invalide Daten zu parsen');
$GLOBALS['TL_LANG']['tl_form_field']['dateAssumeNearbyYear']        = array('Nahes Jahr annehmen', 'Aktiviert das konvertieren von z.B. 15 zu 2015');
$GLOBALS['TL_LANG']['tl_form_field']['dateAssumeNearbyYear_number'] = array('Jahresgrenze', 'Gibt an, ab welchem Jahr das ältere Jahrzent genutzt wird (z.B. 20)');
$GLOBALS['TL_LANG']['tl_form_field']['dateFormat']                  = array('Datumsformat', 'd, dd, D, DD, m, mm, M, MM, yy, yyyy');
$GLOBALS['TL_LANG']['tl_form_field']['dateImmediateUpdates']        = array('Sofortige Aktualisierung', 'Aktualisiert das Datum, wenn ein Monat oder Jahr ausgewählt wird');
$GLOBALS['TL_LANG']['tl_form_field']['dateInputs']                  = array('Range-Inputs', 'Css-Selektoren von Elementen, die zum Picker hinzugefügt werden sollen');
$GLOBALS['TL_LANG']['tl_form_field']['dateKeyboardNavigation']      = array('Pfeiltastennavigation', 'Navigation mit Pfeiltasten aktivieren');
$GLOBALS['TL_LANG']['tl_form_field']['dateLanguage']                = array('Sprache', 'IETF code für die Sprache');
$GLOBALS['TL_LANG']['tl_form_field']['dateMaxViewMode']             = array('Maximaler Anzeigemodus');
$GLOBALS['TL_LANG']['tl_form_field']['dateMinViewMode']             = array('Minimaler Anzeigemodus');
$GLOBALS['TL_LANG']['tl_form_field']['dateMultidate']               = array('Mehrfachauswahl', '');
$GLOBALS['TL_LANG']['tl_form_field']['dateMultidate_count']         = array('Maximale Anzahl gewählter Daten', 'frei lassen für unendlich viele');
$GLOBALS['TL_LANG']['tl_form_field']['dateMultidateSeparator']      = array('Seperator für mehrere Daten', 'Default ist Komma');
$GLOBALS['TL_LANG']['tl_form_field']['dateOrientation']             = array('Ausrichtung', 'left” oder “right”, “top” oder “bottom”, Kombination dieser und “auto”');
$GLOBALS['TL_LANG']['tl_form_field']['dateShowOnFocus']             = array('Anzeige bei Focus');
$GLOBALS['TL_LANG']['tl_form_field']['dateStartDate']               = array('Startdatum', 'alle früheren Daten werden deaktiviert');
$GLOBALS['TL_LANG']['tl_form_field']['dateStartView']               = array('Startansicht', 'Ansicht, die beim Start angezeigt wird');
$GLOBALS['TL_LANG']['tl_form_field']['dateTemplates']               = array('Popup-Templates', 'Als Objekt anzugeben wie in der Dokumentation beschrieben');
$GLOBALS['TL_LANG']['tl_form_field']['dateTitle']                   = array('Titel des Picker', '');
$GLOBALS['TL_LANG']['tl_form_field']['dateTodayBtn']                = array('Heute Button', '');
$GLOBALS['TL_LANG']['tl_form_field']['dateTodayHighlight']          = array('Heute hervorheben', '');
$GLOBALS['TL_LANG']['tl_form_field']['dateToggleActive']            = array('An- und Abwählen', 'Wenn aktiviert, wird das gewählte Datum bei wiederholtem Klick deaktiviert');
$GLOBALS['TL_LANG']['tl_form_field']['dateWeekStart']               = array('Starttag der Woche');
$GLOBALS['TL_LANG']['tl_form_field']['dateZIndexOffset']            = array('Z-Index Offset', 'Höchster z-index aller Vorfahren + offset');


$GLOBALS['TL_LANG']['MSC']['tl_form_field']['dateContainer'] = 'asdasdasdasdasdssdadasd';
