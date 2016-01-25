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


class DatepickerField extends \TextField
{
    /**
     * Template
     *
     * @var string
     */
    protected $strTemplate = 'be_widget';
    public $options = array();

    public function __construct($arrAttributes = null)
    {
    
        parent::__construct($arrAttributes);

        $GLOBALS['TL_CSS'][] = 'composer/vendor/eternicode/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css';

        array_unshift($GLOBALS['TL_JAVASCRIPT'], 'system/modules/bootstrap-datepicker/assets/jquery.noconflict.js');
        $jquery_src = 'assets/jquery/core/' . reset((scandir(TL_ROOT . '/assets/jquery/core', 1))) . '/jquery.min.js';
        array_unshift($GLOBALS['TL_JAVASCRIPT'], $jquery_src);
        
        $GLOBALS['TL_JAVASCRIPT'][] = 'composer/vendor/eternicode/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js';
        $GLOBALS['TL_JAVASCRIPT'][] = 'composer/vendor/eternicode/bootstrap-datepicker/dist/locales/bootstrap-datepicker.de.min.js';

    }
    
    /**
     * Add specific attributes
     *
     * @param string $strKey
     * @param mixed  $varValue
     */
    public function __set($strKey, $varValue)
    {
        switch ($strKey)
        {
            case 'format':
            case 'startDate':
            case 'endDate':
            case 'excludeCSS':
            case 'excludeJS':
            case 'autoclose':
            case 'beforeShowDay':
            case 'beforeShowMonth':
            case 'beforeShowYear':
            case 'beforeShowDecade':
            case 'beforeShowCentury':
            case 'calendarWeeks':
            case 'clearBtn':
            case 'container':
            case 'datesDisabled':
            case 'daysOfWeekDisabled':
            case 'daysOfWeekHighlighted':
            case 'defaultViewDate':
            case 'disableTouchKeyboard':
            case 'enableOnReadonly':
            case 'forceParse':
            case 'assumeNearbyYear':
            case 'assumeNearbyYear_number':
            case 'immediateUpdates':
            case 'inputs':
            case 'keyboardNavigation':
            case 'language':
            case 'maxViewMode':
            case 'minViewMode':
            case 'multidate':
            case 'multidate_count':
            case 'multidateSeparator':
            case 'orientation':
            case 'showOnFocus':
            case 'startView':
            case 'templates':
            case 'title':
            case 'todayBtn':
            case 'todayHighlight':
            case 'toggleActive':
            case 'weekStart':
            case 'zIndexOffset'           :
                $this->options[$strKey] = $varValue;
                break;
            default:
                parent::__set($strKey, $varValue);
                break;
        }
    }

    public function generate()
    {

        // callback can change all options
        if (isset($GLOBALS['TL_HOOKS']['datepickerField']) && is_array($GLOBALS['TL_HOOKS']['datepickerField'])) {
            foreach ($GLOBALS['TL_HOOKS']['formDatepickerField'] as $callback) {
                $objCallback = (method_exists($callback[0], 'getInstance') ? call_user_func(array($callback[0], 'getInstance')) : new $callback[0]());
                $arrConfig = $objCallback->$callback[1]($this);
            }
        }

        $attributes = '';

        foreach($this->options as $key => $option){
            if($option != ''){
                $attributes .= 'data-date-'.ltrim(strtolower(preg_replace('/[A-Z]/', '-$0', $key)), '-').'="'.$option.'"';
            }
        }

        return '
      <div class="input-group date" data-provide="datepicker" '.$attributes.'>
        <input type="text" name="'.$this->strName.'" id="ctrl_'.$this->strId.'" class="tl_text '.$this->class.'"'.$this->getAttributes().'> 
        <span class="input-group-addon">
          <span class="glyphicon glyphicon-th"></span>
        </span>
      </div>';

    }

}

