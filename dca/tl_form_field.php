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
 * Config
 */
$GLOBALS['TL_DCA']['tl_form_field']['config']['onload_callback'][] = array('tl_form_field_datepicker', 'adjustFields');


/**
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_form_field']['palettes']['__selector__'][] = 'dateAssumeNearbyYear';
$GLOBALS['TL_DCA']['tl_form_field']['palettes']['__selector__'][] = 'dateMultidate';

$GLOBALS['TL_DCA']['tl_form_field']['palettes']['datepicker'] = '
{type_legend},type,name,label;
{simple_config},mandatory,dateAutoclose,dateFormat,placeholder,dateStartDate,dateEndDate,dateLanguage,dateMultidate;
{datesettings_legend:hide},dateWeekStart,dateDaysOfWeekDisabled,dateDaysOfWeekHighlighted,dateDatesDisabled,dateDefaultViewDate;
{file_config:hide},dateExcludeCSS,dateExcludeJS;
{pickerlayout_legend:hide},dateTitle,dateContainer,dateCalendarWeeks,dateClearBtn,dateTodayBtn,dateTodayHighlight,dateMaxViewMode,dateMinViewMode;
{expert_legend:hide},dateDisableTouchKeyboard,dateEnableOnReadonly,dateForceParse,dateImmediateUpdates,dateKeyboardNavigation,dateToggleActive,dateShowOnFocus,dateAssumeNearbyYear,dateInputs,dateOrientation,dateStartView,accesskey,dateZIndexOffset,class;
{viewcallback_legend:hide},dateBeforeShowDay,dateBeforeShowMonth,dateBeforeShowYear,dateBeforeShowDecade,dateBeforeShowCentury;
{submit_legend},addSubmit;{template_legend},dateTemplates,customTpl';

$GLOBALS['TL_DCA']['tl_form_field']['subpalettes']['dateAssumeNearbyYear'] = 'dateAssumeNearbyYear_number';

$GLOBALS['TL_DCA']['tl_form_field']['subpalettes']['dateMultidate'] = 'dateMultidate_count,dateMultidateSeparator';

//$GLOBALS['TL_DCA']['tl_form_field']['fields']['mandatory']['eval']['tl_class'] = 'clr w50';
//$GLOBALS['TL_DCA']['tl_form_field']['fields']['placeholder']['eval']['tl_class'] = 'clr w50';

/**
 * Options According to https://bootstrap-datepicker.readthedocs.org/en/latest/options.html
**/

/*
Boolean. Default: false
Whether or not to close the datepicker immediately when a date is selected.
*/
$GLOBALS['TL_DCA']['tl_form_field']['fields']['dateAutoclose'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_form_field']['dateAutoclose'],
    'exclude'   => true,
    'inputType' => 'checkbox',
    'eval'      => array('helpwizard'=>true, 'tl_class' => 'm12 w50'),
    'sql'       => "char(1) NOT NULL default ''"
);

/*
Function(Date). Default: $.noop
A function that takes a date as a parameter and returns one of the following values:
  • undefined to have no effect
  • A Boolean, indicating whether or not this date is selectable
  • A String representing additional CSS classes to apply to the date’s cell
  • An object with the following properties:
    • enabled: same as the Boolean value above
    • classes: same as the String value above
    • tooltip: a tooltip to apply to this date, via the title HTML attribute
*/
$GLOBALS['TL_DCA']['tl_form_field']['fields']['dateBeforeShowDay'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_form_field']['dateBeforeShowDay'],
    'exclude'   => true,
    'inputType' => 'text',
    'eval'      => array('allowHtml'=>true, 'class'=>'monospace', 'rte'=>'ace|html', 'helpwizard'=>true),
    'sql'       => "mediumtext NOT NULL"
);

/*
Function(Date). Default: $.noop
A function that takes a date as a parameter and returns a boolean indicating whether or not this month is selectable
*/
$GLOBALS['TL_DCA']['tl_form_field']['fields']['dateBeforeShowMonth'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_form_field']['dateBeforeShowMonth'],
    'exclude'   => true,
    'inputType' => 'text',
    'eval'      => array('allowHtml'=>true, 'class'=>'monospace', 'rte'=>'ace|html', 'helpwizard'=>true),
    'sql'       => "mediumtext NOT NULL"
);

/*
Function(Date). Default: $.noop
A function that takes a date as a parameter and returns one of the following values:
  • undefined to have no effect
  • A Boolean, indicating whether or not this year is selectable
  • A String representing additional CSS classes to apply to the year’s cell
  • An object with the following properties:
    • enabled: same as the Boolean value above
    • classes: same as the String value above
    • tooltip: a tooltip to apply to this year, via the title HTML attribute
*/
$GLOBALS['TL_DCA']['tl_form_field']['fields']['dateBeforeShowYear'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_form_field']['dateBeforeShowYear'],
    'exclude'   => true,
    'inputType' => 'text',
    'eval'      => array('allowHtml'=>true, 'class'=>'monospace', 'rte'=>'ace|html', 'helpwizard'=>true),
    'sql'       => "mediumtext NOT NULL"
);

/*
Function(Date). Default: $.noop
A function that takes a date as a parameter and returns one of the following values:

  • undefined to have no effect
  • A Boolean, indicating whether or not this year is selectable
  • A String representing additional CSS classes to apply to the year’s cell
  • An object with the following properties:
    • enabled: same as the Boolean value above
    • classes: same as the String value above
    • tooltip: a tooltip to apply to this year, via the title HTML attribute
*/
$GLOBALS['TL_DCA']['tl_form_field']['fields']['dateBeforeShowDecade'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_form_field']['dateBeforeShowDecade'],
    'exclude'   => true,
    'inputType' => 'text',
    'eval'      => array('allowHtml'=>true, 'class'=>'monospace', 'rte'=>'ace|html', 'helpwizard'=>true),
    'sql'       => "mediumtext NOT NULL"
);

/*
Function(Date). Default: $.noop
A function that takes a date as a parameter and returns one of the following values:

  • undefined to have no effect
  • A Boolean, indicating whether or not this year is selectable
  • A String representing additional CSS classes to apply to the year’s cell
  • An object with the following properties:
    • enabled: same as the Boolean value above
    • classes: same as the String value above
    • tooltip: a tooltip to apply to this year, via the title HTML attribute
*/
$GLOBALS['TL_DCA']['tl_form_field']['fields']['dateBeforeShowCentury'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_form_field']['dateBeforeShowCentury'],
    'exclude'   => true,
    'inputType' => 'text',
    'eval'      => array('allowHtml'=>true, 'class'=>'monospace', 'rte'=>'ace|html', 'helpwizard'=>true),
    'sql'       => "mediumtext NOT NULL"
);

/*
Boolean. Default: false
Whether or not to show week numbers to the left of week rows.
*/
$GLOBALS['TL_DCA']['tl_form_field']['fields']['dateCalendarWeeks'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_form_field']['dateCalendarWeeks'],
    'exclude'   => true,
    'inputType' => 'checkbox',
    'eval'      => array('helpwizard'=>true, 'tl_class'=>'w50'),
    'sql'       => "char(1) NOT NULL default ''"
);

/*
Boolean. Default: false
If true, displays a “Clear” button at the bottom of the datepicker to clear the input value. If “autoclose” is also set to true, this button will also close the datepicker.
*/
$GLOBALS['TL_DCA']['tl_form_field']['fields']['dateClearBtn'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_form_field']['dateClearBtn'],
    'exclude'   => true,
    'inputType' => 'checkbox',
    'eval'      => array('helpwizard'=>true, 'tl_class'=>'w50'),
    'sql'       => "char(1) NOT NULL default ''"
);

/*
String. Default: “body”
Appends the date picker popup to a specific element; eg: container: ‘#picker-container’ (will default to “body”)
*/
$GLOBALS['TL_DCA']['tl_form_field']['fields']['dateContainer'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_form_field']['dateContainer'],
    'exclude'   => true,
    'inputType' => 'text',
    'eval'      => array('helpwizard'=>true, 'tl_class'=>'w50'),
    'sql'       => "varchar(255) NOT NULL default ''"
);

/*
String, Array. Default: []
Array of date strings or a single date string formatted in the given date format
*/
$GLOBALS['TL_DCA']['tl_form_field']['fields']['dateDatesDisabled'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_form_field']['dateDatesDisabled'],
    'exclude'   => true,
    'inputType' => 'datepicker',
    'eval'      => array('helpwizard'=>true, 'tl_class'=>'clr w50', 'multidate' => true),
    'sql'       => "mediumtext NOT NULL"
);

/*
String, Array. Default: []
Days of the week that should be disabled. Values are 0 (Sunday) to 6 (Saturday). Multiple values should be comma-separated. Example: disable weekends: '06' or '0,6' or [0,6].
*/
$GLOBALS['TL_DCA']['tl_form_field']['fields']['dateDaysOfWeekDisabled'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_form_field']['dateDaysOfWeekDisabled'],
    'exclude'   => true,
    'inputType' => 'text',
    'eval'      => array('helpwizard'=>true, 'tl_class'=>'clr w50'),
    'sql'       => "varchar(255) NOT NULL default ''"
);

/*
String, Array. Default: []
Days of the week that should be highlighted. Values are 0 (Sunday) to 6 (Saturday). Multiple values should be comma-separated. Example: highlight weekends: '06' or '0,6' or [0,6].
*/
$GLOBALS['TL_DCA']['tl_form_field']['fields']['dateDaysOfWeekHighlighted'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_form_field']['dateDaysOfWeekHighlighted'],
    'exclude'   => true,
    'inputType' => 'text',
    'eval'      => array('helpwizard'=>true, 'tl_class'=>'w50'),
    'sql'       => "varchar(255) NOT NULL default ''"
);

/*
String, Date. Default: current date
Date to view when initially opening the calendar. The internal value of the date remains today as default, but when the datepicker is first opened the calendar will open to defaultViewDate rather than today. If this option is not used, “today” remains the default view date. If the given object is missing any of the required keys, their defaults are:
*/
$GLOBALS['TL_DCA']['tl_form_field']['fields']['dateDefaultViewDate'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_form_field']['dateDefaultViewDate'],
    'exclude'   => true,
    'inputType' => 'datepicker',
    'eval'      => array('helpwizard'=>true, 'tl_class'=>'w50'),
    'sql'       => "varchar(255) NOT NULL default ''"
);

/*
Boolean. Default: false
If true, no keyboard will show on mobile devices
*/
$GLOBALS['TL_DCA']['tl_form_field']['fields']['dateDisableTouchKeyboard'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_form_field']['dateDisableTouchKeyboard'],
    'exclude'   => true,
    'inputType' => 'checkbox',
    'eval'      => array('helpwizard'=>true, 'tl_class'=>'clr w50'),
    'sql'       => "char(1) NOT NULL default ''"
);

/*
Boolean. Default: true
If false the datepicker will not show on a readonly datepicker field.
*/
$GLOBALS['TL_DCA']['tl_form_field']['fields']['dateEnableOnReadonly'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_form_field']['dateEnableOnReadonly'],
    'exclude'   => true,
    'inputType' => 'checkbox',
    'eval'      => array('helpwizard'=>true, 'tl_class'=>'w50'),
    'sql'       => "char(1) NOT NULL default ''"
);

/*
Date. Default: End of time
The latest date that may be selected; all later dates will be disabled.
*/
$GLOBALS['TL_DCA']['tl_form_field']['fields']['dateEndDate'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_form_field']['dateEndDate'],
    'exclude'   => true,
    'inputType' => 'datepicker',
    'eval'      => array('helpwizard'=>true, 'tl_class'=>'w50'),
    'sql'       => "varchar(255) NOT NULL default ''"
);

/*
Boolean. Default: true
Whether or not to force parsing of the input value when the picker is closed. That is, when an invalid date is left in the input field by the user, the picker will forcibly parse that value, and set the input’s value to the new, valid date, conforming to the given format.
*/
$GLOBALS['TL_DCA']['tl_form_field']['fields']['dateForceParse'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_form_field']['dateForceParse'],
    'exclude'   => true,
    'inputType' => 'checkbox',
    'eval'      => array('helpwizard'=>true, 'tl_class'=>'clr w50'),
    'sql'       => "char(1) NOT NULL default ''"
);

/*
Boolean or Integer. Default: false
If true, manually-entered dates with two-digit years, such as “5/1/15”, will be parsed as “2015”, not “15”. If the year is less than 10 years in advance, the picker will use the current century, otherwise, it will use the previous one. For example “5/1/15” would parse to May 1st, 2015, but “5/1/97” would be May 1st, 1997.

To configure the number of years in advance that the picker will still use the current century, use an Integer instead of the Boolean true. E.g. “assumeNearbyYear: 20”
*/
$GLOBALS['TL_DCA']['tl_form_field']['fields']['dateAssumeNearbyYear'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_form_field']['dateAssumeNearbyYear'],
    'exclude'   => true,
    'inputType' => 'checkbox',
    'eval'      => array('helpwizard'=>true, 'submitOnChange' => true, 'tl_class'=>'w50'),
    'sql'       => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_form_field']['fields']['dateAssumeNearbyYear_number'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_form_field']['dateAssumeNearbyYear_number'],
    'exclude'   => true,
    'inputType' => 'text',
    'eval'      => array('helpwizard'=>true, 'tl_class' => 'clr w50'),
    'sql'       => "varchar(2) NOT NULL default ''"
);

/*
String. Default: “mm/dd/yyyy”
The date format, combination of d, dd, D, DD, m, mm, M, MM, yy, yyyy.
  • d, dd: Numeric date, no leading zero and leading zero, respectively. Eg, 5, 05.
  • D, DD: Abbreviated and full weekday names, respectively. Eg, Mon, Monday.
  • m, mm: Numeric month, no leading zero and leading zero, respectively. Eg, 7, 07.
  • M, MM: Abbreviated and full month names, respectively. Eg, Jan, January
  • yy, yyyy: 2- and 4-digit years, respectively. Eg, 12, 2012.
*/
$GLOBALS['TL_DCA']['tl_form_field']['fields']['dateFormat'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_form_field']['dateFormat'],
    'exclude'   => true,
    'inputType' => 'text',
    'eval'      => array('helpwizard'=>true, 'tl_class' => 'clr w50'),
    'sql'       => "varchar(255) NOT NULL default ''"
);

/*
Boolean. Default: false

If true, selecting a year or month in the datepicker will update the input value immediately. Otherwise, only selecting a day of the month will update the input value immediately.
*/
$GLOBALS['TL_DCA']['tl_form_field']['fields']['dateImmediateUpdates'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_form_field']['dateImmediateUpdates'],
    'exclude'   => true,
    'inputType' => 'checkbox',
    'eval'      => array('helpwizard'=>true, 'tl_class'=>'w50'),
    'sql'       => "char(1) NOT NULL default ''"
);

/*
Array, jQuery. Default: None

A list of inputs to be used in a range picker, which will be attached to the selected element. Allows for explicitly creating a range picker on a non-standard element.

<div class="form-group form-group-filled" id="event_period">
   <input type="text" class="actual_range">
   <input type="text" class="actual_range">
</div>

$('#event_period').datepicker({
   inputs: $('.actual_range')
});

Note: Only insert the classname here
*/
$GLOBALS['TL_DCA']['tl_form_field']['fields']['dateInputs'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_form_field']['dateInputs'],
    'exclude'   => true,
    'inputType' => 'text',
    'eval'      => array('helpwizard'=>true, 'tl_class'=>'clr w50'),
    'sql'       => "varchar(255) NOT NULL default ''"
);

/*
Boolean. Default: true
Whether or not to allow date navigation by arrow keys.
*/
$GLOBALS['TL_DCA']['tl_form_field']['fields']['dateKeyboardNavigation'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_form_field']['dateKeyboardNavigation'],
    'exclude'   => true,
    'inputType' => 'checkbox',
    'eval'      => array('helpwizard'=>true, 'tl_class'=>'clr w50'),
    'sql'       => "char(1) NOT NULL default ''"
);

/*
String. Default: “en”
The IETF code (eg “en” for English, “pt-BR” for Brazilian Portuguese) of the language to use for month and day names. These will also be used as the input’s value (and subsequently sent to the server in the case of form submissions). If a full code (eg “de-DE”) is supplied the picker will first check for an “de-DE” language and if not found will fallback and check for a “de” language. If an unknown language code is given, English will be used. See I18N.
Leave empty to use language from Page tree
*/
$GLOBALS['TL_DCA']['tl_form_field']['fields']['dateLanguage'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_form_field']['dateLanguage'],
    'exclude'   => true,
    'inputType' => 'text',
    'eval'      => array('helpwizard'=>true, 'tl_class'=>'clr w50'),
    'sql'       => "varchar(255) NOT NULL default ''"
);

/*
Number, String. Default: 4, “centuries”
Set a maximum limit for the view mode. Accepts: “days” or 0, “months” or 1, “years” or 2, “decades” or 3, and “centuries” or 4. Gives the ability to pick only a day, a month, a year or a decade. The day is set to the 1st for “months”, the month is set to January for “years”, the year is set to the first year from the decade for “decades”, and the year is set to the first from the millennium for “centuries”.
*/
$GLOBALS['TL_DCA']['tl_form_field']['fields']['dateMaxViewMode'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_form_field']['dateMaxViewMode'],
    'exclude'   => true,
    'inputType' => 'select',
    'options'   => array(0 => 'days', 1 => 'month', 2 => 'years', 3 => 'decades', 4 => 'centuries'),
    'eval'      => array('helpwizard'=>true, 'tl_class'=>'clr w50'),
    'sql'       => "varchar(255) NOT NULL default 'centuries'"
);

/*
Number, String. Default: 0, “days”
Set a minimum limit for the view mode. Accepts: “days” or 0, “months” or 1, “years” or 2, “decades” or 3, and “centuries” or 4. Gives the ability to pick only a month, a year or a decade. The day is set to the 1st for “months”, and the month is set to January for “years”, the year is set to the first year from the decade for “decades”, and the year is set to the first from the millennium for “centuries”.
*/
$GLOBALS['TL_DCA']['tl_form_field']['fields']['dateMinViewMode'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_form_field']['dateMinViewMode'],
    'exclude'   => true,
    'inputType' => 'select',
    'options'   => array(0 => 'days', 1 => 'month', 2 => 'years', 3 => 'decades', 4 => 'centuries'),
    'eval'      => array('helpwizard'=>true, 'tl_class'=>'w50'),
    'sql'       => "varchar(255) NOT NULL default 'days'"
);

/*
Boolean, Number. Default: false
Enable multidate picking. Each date in month view acts as a toggle button, keeping track of which dates the user has selected in order. If a number is given, the picker will limit how many dates can be selected to that number, dropping the oldest dates from the list when the number is exceeded. true equates to no limit. The input’s value (if present) is set to a string generated by joining the dates, formatted, with multidateSeparator.
*/
$GLOBALS['TL_DCA']['tl_form_field']['fields']['dateMultidate'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_form_field']['dateMultidate'],
    'exclude'   => true,
    'inputType' => 'checkbox',
    'eval'      => array('helpwizard'=>true, 'submitOnChange' => true, 'tl_class' => 'clr'),
    'sql'       => "char(1) NOT NULL default ''"
);

/*
Leave empty for no limit
*/
$GLOBALS['TL_DCA']['tl_form_field']['fields']['dateMultidate_count'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_form_field']['dateMultidate_count'],
    'exclude'   => true,
    'inputType' => 'text',
    'eval'      => array('helpwizard'=>true, 'tl_class'=>'clr w50'),
    'sql'       => "varchar(255) NOT NULL default ''"
);

/*
String. Default: ”,”
The string that will appear between dates when generating the input’s value. When parsing the input’s value for a multidate picker, this will also be used to split the incoming string to separate multiple formatted dates; as such, it is highly recommended that you not use a string that could be a substring of a formatted date (eg, using ‘-‘ to separate dates when your format is ‘yyyy-mm-dd’).
*/
$GLOBALS['TL_DCA']['tl_form_field']['fields']['dateMultidateSeparator'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_form_field']['dateMultidateSeparator'],
    'exclude'   => true,
    'inputType' => 'text',
    'eval'      => array('helpwizard'=>true, 'tl_class'=>'w50'),
    'sql'       => "varchar(255) NOT NULL default ','"
);

/*
String. Default: “auto”
A space-separated string consisting of one or two of “left” or “right”, “top” or “bottom”, and “auto” (may be omitted); for example, “top left”, “bottom” (horizontal orientation will default to “auto”), “right” (vertical orientation will default to “auto”), “auto top”. Allows for fixed placement of the picker popup.

“orientation” refers to the location of the picker popup’s “anchor”; you can also think of it as the location of the trigger element (input, component, etc) relative to the picker.

“auto” triggers “smart orientation” of the picker. Horizontal orientation will default to “left” and left offset will be tweaked to keep the picker inside the browser viewport; vertical orientation will simply choose “top” or “bottom”, whichever will show more of the picker in the viewport.
*/
$GLOBALS['TL_DCA']['tl_form_field']['fields']['dateOrientation'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_form_field']['dateOrientation'],
    'exclude'   => true,
    'inputType' => 'text',
    'eval'      => array('helpwizard'=>true, 'tl_class'=>'w50'),
    'sql'       => "varchar(255) NOT NULL default ''"
);

/*
Boolean. Default: true
If false, the datepicker will be prevented from showing when the input field associated with it receives focus.
*/
$GLOBALS['TL_DCA']['tl_form_field']['fields']['dateShowOnFocus'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_form_field']['dateShowOnFocus'],
    'exclude'   => true,
    'inputType' => 'checkbox',
    'eval'      => array('helpwizard'=>true, 'tl_class'=>'w50'),
    'sql'       => "char(1) NOT NULL default ''"
);

/*
Date. Default: Beginning of time
The earliest date that may be selected; all earlier dates will be disabled.
*/
$GLOBALS['TL_DCA']['tl_form_field']['fields']['dateStartDate'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_form_field']['dateStartDate'],
    'exclude'   => true,
    'inputType' => 'datepicker',
    'eval'      => array('helpwizard'=>true, 'tl_class'=>'clr w50'),
    'sql'       => "varchar(255) NOT NULL default ''"
);

/*
Number, String. Default: 0, “month”
The view that the datepicker should show when it is opened. Accepts values of 0 or “month” for month view (the default), 1 or “year” for the 12-month overview, 2 or “decade” for the 10-year overview, 3 or “century” for the 10-decade overview, and 4 or “millennium” for the 10-century overview. Useful for date-of-birth datepickers.
*/
$GLOBALS['TL_DCA']['tl_form_field']['fields']['dateStartView'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_form_field']['dateStartView'],
    'exclude'   => true,
    'inputType' => 'select',
    'options'   => array(0 => 'month', 1 => 'years', 2 => 'decades', 3 => 'centuries', 4 => 'millennium'),
    'eval'      => array('helpwizard'=>true, 'tl_class'=>'clr w50'),
    'sql'       => "varchar(255) NOT NULL default ''"
);

/*

Object. Default:

    {
        leftArrow: ‘<span class=”glyphicon glyphicon-arrow-left”></span>’, rightArrow: ‘<span class=”glyphicon glyphicon-arrow-right”></span>’

    }

The templates used to generate some parts of the picker. Each property must be a string with only text, or valid html. You can use this property to use custom icons libs. for example :

    {
        leftArrow: ‘<i class=”fa fa-long-arrow-left”></i>’, rightArrow: ‘<i class=”fa fa-long-arrow-right”></i>’

    }
*/
$GLOBALS['TL_DCA']['tl_form_field']['fields']['dateTemplates'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_form_field']['dateTemplates'],
    'exclude'   => true,
    'inputType' => 'text',
    'eval'      => array('allowHtml'=>true, 'class'=>'monospace', 'rte'=>'ace|html', 'helpwizard'=>true),
    'sql'       => "mediumtext NOT NULL"
);

/*
String. Default: “”
The string that will appear on top of the datepicker. If empty the title will be hidden.
*/
$GLOBALS['TL_DCA']['tl_form_field']['fields']['dateTitle'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_form_field']['dateTitle'],
    'exclude'   => true,
    'inputType' => 'text',
    'eval'      => array('helpwizard'=>true, 'tl_class'=>'clr w50'),
    'sql'       => "varchar(255) NOT NULL default ''"
);

/*
Boolean, “linked”. Default: false
If true or “linked”, displays a “Today” button at the bottom of the datepicker to select the current date. If true, the “Today” button will only move the current date into view; if “linked”, the current date will also be selected.
*/
$GLOBALS['TL_DCA']['tl_form_field']['fields']['dateTodayBtn'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_form_field']['dateTodayBtn'],
    'exclude'   => true,
    'inputType' => 'checkbox',
    'eval'      => array('helpwizard'=>true, 'tl_class'=>'w50'),
    'sql'       => "char(1) NOT NULL default ''"
);

/*
Boolean. Default: false
If true, highlights the current date.
*/
$GLOBALS['TL_DCA']['tl_form_field']['fields']['dateTodayHighlight'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_form_field']['dateTodayHighlight'],
    'exclude'   => true,
    'inputType' => 'checkbox',
    'eval'      => array('helpwizard'=>true, 'tl_class'=>'w50'),
    'sql'       => "char(1) NOT NULL default ''"
);

/*
Boolean. Default: false
If true, selecting the currently active date in the datepicker will unset the respective date. This option is always true when the multidate option is being used.
*/
$GLOBALS['TL_DCA']['tl_form_field']['fields']['dateToggleActive'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_form_field']['dateToggleActive'],
    'exclude'   => true,
    'inputType' => 'checkbox',
    'eval'      => array('helpwizard'=>true, 'tl_class'=>'w50'),
    'sql'       => "char(1) NOT NULL default ''"
);

/*
Integer. Default: 0
Day of the week start. 0 (Sunday) to 6 (Saturday)
*/
$GLOBALS['TL_DCA']['tl_form_field']['fields']['dateWeekStart'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_form_field']['dateWeekStart'],
    'exclude'   => true,
    'inputType' => 'select',
    'options'   => array(0 => 'Sunday', 1 => 'Monday', 2 => 'Tuesday', 3 => 'Wednesday', 4 => 'Thursday', 5 => 'Friday', 6 => 'Saturday'),
    'eval'      => array('helpwizard'=>true),
    'sql'       => "varchar(255) NOT NULL default ''"
);

/*
Integer. Default: 10
The CSS z-index of the open datepicker is the maximum z-index of the input and all of its DOM ancestors plus the zIndexOffset.
*/
$GLOBALS['TL_DCA']['tl_form_field']['fields']['dateZIndexOffset'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_form_field']['dateZIndexOffset'],
    'exclude'   => true,
    'inputType' => 'text',
    'eval'      => array('helpwizard'=>true, 'tl_class'=>'clr w50'),
    'sql'       => "varchar(255) NOT NULL default ''"
);

/**
 * Other Fields
 */
 
/*
If checked, contao doesnt insert bootstrap datepicker css into the page (take care of it it yourself)
*/
$GLOBALS['TL_DCA']['tl_form_field']['fields']['dateExcludeCSS'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['dateExcludeCSS'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "char(1) NOT NULL default ''"
);

/*
See above
*/
$GLOBALS['TL_DCA']['tl_form_field']['fields']['dateExcludeJS'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['dateExcludeJS'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "char(1) NOT NULL default ''"
);


class tl_form_field_datepicker extends Backend
{

	public function adjustFields($dc)
	{
		if ($this->Input->get('act') == 'edit')
		{
			$objField = $this->Database->execute("SELECT * FROM tl_form_field WHERE id=".$dc->id);

			if ($objField->type == 'datepicker')
			{
				$GLOBALS['TL_DCA']['tl_form_field']['fields']['mandatory']['eval']['tl_class'] = 'w50 m12';
				$GLOBALS['TL_DCA']['tl_form_field']['fields']['value']['eval']['tl_class'] = 'w50';
			}
		}
	}
}

