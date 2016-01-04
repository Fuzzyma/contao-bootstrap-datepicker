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

    public function __construct($arrAttributes = null)
    {
        parent::__construct($arrAttributes);

        if ($this->rgxp != 'datim' && $this->rgxp != 'time') {
            $this->rgxp = 'date';
        }

        if (!$this->dateExcludeCSS) {
            $GLOBALS['TL_CSS'][] = 'composer/vendor/eternicode/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css';
        }

        // include jquery into backend to activate datepicker
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
            'multidate'               => $this->multiple ? $this->multiple : $this->dateMultidate,
            'multidate_count'         => $this->multiple,
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

		return '<div class="input-group date" data-provide="datepicker" '.$attributes.'>'.$this->addSubmit();

    }

    public function validator($varInput)
    {
        /*$objToday = new Date();

        $intTstamp = 0;
        $dateFormat = $this->dateFormat ?: $GLOBALS['TL_CONFIG'][$this->rgxp . 'Format'];
        $dateDirection = $this->dateDirection ?: '0';

        if ($varInput != '') {

            // Validate date format
            if ($this->dateFormat) {

                // Disable regular date validation
                $this->rgxp = '';

                if (strlen($varInput) && !preg_match('/'. $this->getRegexp($this->dateFormat) .'/i', $varInput)) {
                    $this->addError(sprintf($GLOBALS['TL_LANG']['ERR']['date'], $objToday->getInputFormat($this->dateFormat)));
                }
            }

            // Convert timestamps
            try {
                $objDate = new \Date($varInput, $dateFormat);
                $intTstamp = $objDate->tstamp;
            } catch (\Exception $e) {
                $this->addError($e->getMessage());
            }

            switch ($dateDirection) {
                case 'ltToday':
                    if ($intTstamp >= $objToday->dayBegin) {
                        $this->addError($GLOBALS['TL_LANG']['ERR']['calendarfield_direction_ltToday']);
                    }
                    break;
                case 'leToday':
                    if ($intTstamp > $objToday->dayBegin) {
                        $this->addError($GLOBALS['TL_LANG']['ERR']['calendarfield_direction_leToday']);
                    }
                    break;
                case 'geToday':
                    if ($intTstamp < $objToday->dayBegin) {
                        $this->addError($GLOBALS['TL_LANG']['ERR']['calendarfield_direction_geToday']);
                    }
                    break;
                case 'gtToday':
                    if ($intTstamp <= $objToday->dayBegin) {
                        $this->addError($GLOBALS['TL_LANG']['ERR']['calendarfield_direction_+1']);
                    }
                    break;
            }
        }*/

        return parent::validator($varInput);
    }


    /**
     * Return a regular expression that matches a particular date format
     *
     * @param bool|string $strFormat
     * @param string      $strRegexpSyntax
     *
     * @throws Exception
     * @return string
     *//*
    public function getRegexp($strFormat = false, $strRegexpSyntax = 'perl')
    {
        if (!$strFormat) {
            $strFormat = $GLOBALS['TL_CONFIG']['dateFormat'];
        }

        if (preg_match('/[BbCcDEeFfIJKkLlMNOoPpQqRrSTtUuVvWwXxZz]+/', $strFormat)) {
            throw new Exception(sprintf('Invalid date format "%s"', $strFormat));
        }

        $arrRegexp = array();
        $arrCharacters = str_split($strFormat);

        foreach ($arrCharacters as $strCharacter) {
            switch ($strCharacter) {

                // Patch day: allow 01 - 31
                case 'd':
                    $arrRegexp[$strFormat]['perl']  .= '(0[1-9]|[12][0-9]|3[01])';
                    $arrRegexp[$strFormat]['posix'] .= '(0[1-9]|[12][0-9]|3[01])';
                    break;

                // Patch month: allow 01 - 12
                case 'm':
                    $arrRegexp[$strFormat]['perl']  .= '(0[1-9]|1[012])';
                    $arrRegexp[$strFormat]['posix'] .= '(0[1-9]|1[012])';
                    break;

                // Patch year: allow 1900 - 2099
                case 'Y':
                    $arrRegexp[$strFormat]['perl']  .= '(19|20)[0-9]{2    '2' => $this->2,
}';
                    $arrRegexp[$strFormat]['posix'] .= '(19|20)[[:digit:]]{2}';
                    break;

                case 'a':
                case 'A':
                    $arrRegexp[$strFormat]['perl']  .= '[apmAPM]{2    '2' => $this->2,
}';
                    $arrRegexp[$strFormat]['posix'] .= '[apmAPM]{2}';
                    break;

                case 'y':
                case 'h':
                case 'H':
                case 'i':
                case 's':
                    $arrRegexp[$strFormat]['perl']  .= '[0-9]{2    '2' => $this->2,
}';
                    $arrRegexp[$strFormat]['posix'] .= '[[:digit:]]{2}';
                    break;

                case 'j':
                case 'n':
                case 'g':
                case 'G':
                    $arrRegexp[$strFormat]['perl']  .= '[0-9]{1    '2' => $this->2,
}';
                    $arrRegexp[$strFormat]['posix'] .= '[[:digit:]]{1    '2' => $this->2,
}';
                    break;

                default:
                    $arrRegexp[$strFormat]['perl']  .= preg_quote($strCharacter, '/');
                    $arrRegexp[$strFormat]['posix'] .= preg_quote($strCharacter, '/');
                    break;
            }
        }

        return $arrRegexp[$strFormat][$strRegexpSyntax];
    }*/
}

