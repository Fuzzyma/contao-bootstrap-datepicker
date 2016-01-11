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


class FormDatepickerField extends FormTextField
{
    /**
     * Template
     *
     * @var string
     */
    protected $strTemplate = 'form_datepicker';
    public $options = array();

    public function __construct($arrAttributes = null)
    {
    
        parent::__construct($arrAttributes);

        $this->evals = $arrAttributes;

        $this->rgxp = 'date';

        if (!$this->dateExcludeCSS) {
            $GLOBALS['TL_CSS'][] = 'composer/vendor/eternicode/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css';
        }

        // include jquery into backend
        if (TL_MODE == 'BE')
        {
            if (!is_array($GLOBALS['TL_JAVASCRIPT']))
            {
                $GLOBALS['TL_JAVASCRIPT'] = array();
            }
            array_unshift($GLOBALS['TL_JAVASCRIPT'], 'system/modules/bootstrap-datepicker/assets/jquery.noconflict.js');
            $jquery_src = 'assets/jquery/core/' . reset((scandir(TL_ROOT . '/assets/jquery/core', 1))) . '/jquery.min.js';
            array_unshift($GLOBALS['TL_JAVASCRIPT'], $jquery_src);
        }
        
        if (!$this->dateExcludeJS) {
            $GLOBALS['TL_JAVASCRIPT'][] = 'composer/vendor/eternicode/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js';
            $GLOBALS['TL_JAVASCRIPT'][] = 'composer/vendor/eternicode/bootstrap-datepicker/dist/locales/bootstrap-datepicker.de.min.js';
        }

    }

    /* Generate is NEVER called. You may call it in your template to return the html markup for the field. */
    public function generate()
    {

        // callback can change all options
        if (isset($GLOBALS['TL_HOOKS']['formDatepickerField']) && is_array($GLOBALS['TL_HOOKS']['formDatepickerField'])) {
            foreach ($GLOBALS['TL_HOOKS']['formDatepickerField'] as $callback) {
                $objCallback = (method_exists($callback[0], 'getInstance') ? call_user_func(array($callback[0], 'getInstance')) : new $callback[0]());
                $arrConfig = $objCallback->$callback[1]($this);
            }
        }

        // collect all options
        $this->options = [
            'format'                  => $this->dateFormat,
            'startDate'               => $this->dateStartDate,
            'endDate'                 => $this->dateEnddate,
            'excludeCSS'              => $this->dateExcludeCSS,
            'excludeJS'               => $this->dateExcludeJS,
            'autoclose'               => $this->dateAutoclose,
            'beforeShowDay'           => $this->dateBeforeShowDay,
            'beforeShowMonth'         => $this->dateBeforeShowMonth,
            'beforeShowYear'          => $this->dateBeforeShowYear,
            'beforeShowDecade'        => $this->dateBeforeShowDecade,
            'beforeShowCentury'       => $this->dateBeforeShowCentury,
            'calendarWeeks'           => $this->dateCalendarWeeks,
            'clearBtn'                => $this->dateClearBtn,
            'container'               => $this->dateContainer,
            'datesDisabled'           => $this->dateDatesDisabled,
            'daysOfWeekDisabled'      => $this->dateDaysOfWeekDisabled,
            'daysOfWeekHighlighted'   => $this->dateDaysOfWeekHighlighted,
            'defaultViewDate'         => $this->dateDefaultViewDate,
            'disableTouchKeyboard'    => $this->dateDisableTouchKeyboard,
            'enableOnReadonly'        => $this->dateEnableOnReadonly,
            'forceParse'              => $this->dateForceParse,
            'assumeNearbyYear'        => $this->dateAssumeNearbyYear,
            'assumeNearbyYear_number' => $this->dateAssumeNearbyYear_number,
            'immediateUpdates'        => $this->dateImmediateUpdates,
            'inputs'                  => $this->dateInputs,
            'keyboardNavigation'      => $this->dateKeyboardNavigation,
            'language'                => $this->dateLanguage,
            'maxViewMode'             => $this->dateMaxViewMode == 'centuries' ? '' : $this->dateMaxViewMode,
            'minViewMode'             => $this->dateMinViewMode == 'days' ? '' : $this->dateMinViewMode,
            'multidate'               => $this->dateMultidate,
            'multidate_count'         => $this->dateMultidate_count,
            'multidateSeparator'      => $this->dateMultidate && $this->dateMultidateSeperator != ',' ? $this->dateMultidateSeperator : '',
            'orientation'             => $this->dateOrientation,
            'showOnFocus'             => $this->dateShowOnFocus,
            'startView'               => $this->dateStartView,
            'templates'               => $this->dateTemplates,
            'title'                   => $this->dateTitle,
            'todayBtn'                => $this->dateTodayBtn ? 'linked' : '',
            'todayHighlight'          => $this->dateTodayHighlight,
            'toggleActive'            => $this->dateToggleActive,
            'weekStart'               => $this->dateWeekStart == 'Sunday' ? '' : $this->dateWeekStart,
            'zIndexOffset'            => $this->dateZIndexOffset,
        ];

        $attributes = '';

        foreach($this->options as $key => $option){
            if($option != ''){
                $attributes .= 'data-date-'.ltrim(strtolower(preg_replace('/[A-Z]/', '-$0', $key)), '-').'="'.$option.'"';
            }
        }

		return '
      <div class="input-group date" data-provide="datepicker" '.$attributes.'>
        <input type="text" name="'.$this->strName.'" id="ctrl_'.$this->strId.'" class="text '.$this->class.'"'.$this->getAttributes().'> 
        <span class="input-group-addon">
          <span class="glyphicon glyphicon-th"></span>
        </span>
      </div>';

    }

}

