<?php
/*
   +-------------------------------------------------------------------------+
   | Copyright (C) 2004-2017 The Cacti Group                                 |
   |                                                                         |
   | This program is free software; you can redistribute it and/or           |
   | modify it under the terms of the GNU General Public License             |
   | as published by the Free Software Foundation; either version 2          |
   | of the License, or (at your option) any later version.                  |
   |                                                                         |
   | This program is distributed in the hope that it will be useful,         |
   | but WITHOUT ANY WARRANTY; without even the implied warranty of          |
   | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the           |
   | GNU General Public License for more details.                            |
   +-------------------------------------------------------------------------+
   | Cacti: The Complete RRDTool-based Graphing Solution                     |
   +-------------------------------------------------------------------------+
   | This code is designed, written, and maintained by the Cacti Group. See  |
   | about.php and/or the AUTHORS file for specific developer information.   |
   +-------------------------------------------------------------------------+
   | http://www.cacti.net/                                                   |
   +-------------------------------------------------------------------------+
*/

$calc_functions = array(
	'f_avg'  => array(
		'description'	=> __('Returns the average value. (sum of values /number of values)', 'reportit'),
		'params'		=> __('none', 'reportit'),
		'syntax'		=> '<i>float</i> f_avg',
		'examples'		=> 'f_avg*8'
	),
	'f_max'  => array(
		'description'	=> __('Returns the highest value', 'reportit'),
		'params'		=> __('none', 'reportit'),
		'syntax'		=> '<i>float</i> f_max',
		'examples'		=> '(f_max-f_min)*8'
	),
	'f_min'  => array(
		'description'	=> __('Returns the lowest value', 'reportit'),
		'params'		=> __('none', 'reportit'),
		'syntax'		=> '<i>float</i> f_min',
		'examples'		=> 'f_min*8'
	),
	'f_sum'  => array(
		'description'	=> __('Returns the sum of all values.(1.Value + 2.Value + 3.Value + ... + n.Value)', 'reportit'),
		'params'		=> __('none', 'reportit'),
		'syntax'		=> '<i>float</i> f_sum',
		'examples'		=> 'f_sum*8'
	),
	'f_num'  => array(
		'description'	=> __('Returns the number of valid measured values. (excludes NaN\'s)', 'reportit'),
		'params'		=> __('none', 'reportit'),
		'syntax'		=> '<i>int</i> f_num',
		'examples'		=> 'f_num'
	),
	'f_grd'  => array(
		'description'	=> __('Returns the gradient of a straight line by using linear regression for trend analysis', 'reportit'),
		'params'		=> __('none', 'reportit'),
		'syntax'		=> '<i>float</i> f_grd',
		'examples'		=> 'f_grd'
	),
	'f_last'  => array(
		'description'	=> __('Returns the last valid measured value of the reporting period. (excludes NaN\'s)', 'reportit'),
		'params'		=> __('none', 'reportit'),
		'syntax'		=> '<i>float</i> f_last',
		'examples'		=> 'f_last*16/2'
	),
	'f_1st'  => array(
		'description'	=> __('Returns the first valid measured value of the reporting period. (excludes NaN\'s)', 'reportit'),
		'params'		=> __('none', 'reportit'),
		'syntax'		=> '<i>float</i> f_1st',
		'examples'		=> 'f_1st*2*(5.5-1.5)'
	)
);

$calc_fct_names = array_keys($calc_functions);

$calc_functions_aliases = array(
	'f_int' => array(
		'title'			=> __('f_int - Alias of f_floor', 'reportit'),
		'description'	=> __('Returns the next lowest integer value by rounding down value if necessary.', 'reportit'),
		'params'		=> __('$var: float', 'reportit'),
		'syntax'		=> '<i>integer</i> f_int <i>(float $var)</i>',
		'examples'		=> 'f_int(69.19) = 69'
	),
	'f_rnd' => array(
		'title'			=> __('f_rnd - Alias of f_round', 'reportit'),
		'description'	=> __('Returns the rounded integer value of any given float.', 'reportit'),
		'params'		=> __('$var: float or string value', 'reportit'),
		'syntax'		=> '<i>integer</i> f_rnd <i>(float $var)</i>',
		'examples'		=> 'f_rnd(69.50) = 70, f_rnd(69,49) = 69'
	),
	'f_eq' => array(
		'title'			=> __('f_eq - Alias of f_cmp - IS EQUAL', 'reportit'),
		'description'	=> __('Returns 1 (or C) if A == B or 0 (or D) if not. Parameters C and D are optional.', 'reportit'),
		'params'		=> '$A, $B [, $C, $D]',
		'syntax'		=> '<i>bool</i> f_eq <i>(float $A, float $B [, float $C, float $D])</i>',
		'examples'		=> 'f_eq(5,6) = 0,  f_eq(6,6) = 1, f_eq(f_min(),6) = 1 or 0, f_eq(6,6,f_min()) = f_min(), f_eq(6,5,f_min(),f_max()) = f_max()'
	),
	'f_uq' => array(
		'title'			=> __('f_uq - Alias of f_cmp - IS UNEQUAL', 'reportit'),
		'description'	=> __('Returns 1 (or C) if A != B or 0 (or D) if not. Parameters C and D are optional.', 'reportit'),
		'params'		=> '$A, $B [, $C, $D]',
		'syntax'		=> '<i>bool</i> f_uq <i>(float $A, float $B [, float $C, float $D])</i>',
		'examples'		=> 'f_uq(5,6) = 1,  f_uq(6,6) = 0, f_uq(f_min(),6) = 1 or 0, f_uq(6,6,f_min()) = 0, f_uq(6,5,f_min(),f_max()) = f_min()'
	),
	'f_gt' => array(
		'title'			=> __('f_gt - Alias of f_cmp - IS GREATER THAN', 'reportit'),
		'description'	=> __('Returns 1 (or C) if A > B or 0 (or D) if not. Parameters C and D are optional.', 'reportit'),
		'params'		=> '$A, $B [, $C, $D]',
		'syntax'		=> '<i>bool</i> f_gt <i>(float $A, float $B [, float $C, float $D])</i>',
		'examples'		=> 'f_gt(5,6) = 0,  f_gt(6,6) = 0, f_gt(f_min(),6) = 1 or 0, f_gt(6,6,f_min()) = 0, f_gt(6,5,f_min(),f_max()) = f_min()'
	),
	'f_lt' => array(
		'title'			=> __('f_lt - Alias of f_cmp - IS LOWER THAN', 'reportit'),
		'description'	=> __('Returns 1 (or C) if A < B or 0 (or D) if not. Parameters C and D are optional.', 'reportit'),
		'params'		=> '$A, $B [, $C, $D]',
		'syntax'		=> '<i>bool</i> f_lt <i>(float $A, float $B [, float $C, float $D])</i>',
		'examples'		=> 'f_lt(5,6) = 1,  f_lt(6,6) = 0, f_lt(f_min(),6) = 1 or 0, f_lt(6,6,f_min()) = 0, f_lt(6,5,f_min(),f_max()) = f_max()'
	),
	'f_ge' => array(
		'title'			=> __('f_ge - Alias of f_cmp - IS GREATER OR EQUAL', 'reportit'),
		'description'	=> __('Returns 1 (or C) if A >= B or 0 (or D) if not. Parameters C and D are optional.', 'reportit'),
		'params'		=> '$A, $B [, $C, $D]',
		'syntax'		=> '<i>bool</i> f_ge <i>(float $A, float $B [, float $C, float $D])</i>',
		'examples'		=> 'f_ge(5,6) = 0,  f_ge(6,6) = 1, f_ge(f_min(),6) = 1 or 0, f_ge(6,6,f_min()) = f_min(), f_ge(6,5,f_min(),f_max()) = f_min()'
	),
	'f_le' => array(
		'title'			=> __('f_le - Alias of f_cmp - IS LOWER OR EQUAL', 'reportit'),
		'description'	=> __('Returns 1 (or C) if A <= B or 0 (or D) if not. Parameters C and D are optional.', 'reportit'),
		'params'		=> '$A, $B [, $C, $D]',
		'syntax'		=> '<i>bool</i> f_le <i>(float $A, float $B [, float $C, float $D])</i>',
		'examples'		=> 'f_le(5,6) = 1,  f_le(6,6) = 1, f_le(f_min(),6) = 1 or 0, f_le(6,6,f_min()) = f_min(), f_le(6,5,f_min(),f_max()) = f_max()'
	)
);


$calc_functions_params = array(
	'f_xth' => array(
		'title'			=> __('f_xth - Xth Percentile', 'reportit'),
		'description'	=> __('Returns the xth percentitle.', 'reportit'),
		'params'		=> __('$var: threshold in percent. Range: [0&lt; $var &le;100]', 'reportit'),
		'syntax'		=> '<i>float</i> f_xth <i>(float $var)</i>',
		'examples'		=> 'f_xth(95.7), f_xth(c1v)'
	),
	'f_dot' => array(
		'title'			=> __('f_dot - Duration Over Threshold', 'reportit'),
		'description'	=> __('Returns the duration over a defined threshold in percent.', 'reportit'),
		'params'		=> __('$var: threshold (absolute)', 'reportit'),
		'syntax'		=> '<i>float</i> f_dot <i>(float $var)</i>',
		'examples'		=> 'f_dot(10000000), f_dot(maxValue*c1v/100)'
	),
	'f_sot' => array(
		'title'			=> __('f_sot - Sum Over Threshold', 'reportit'),
		'description'	=> __('Returns the sum of values over a defined threshold.', 'reportit'),
		'params'		=> __('$var: threshold (absolute)', 'reportit'),
		'syntax'		=> '<i>float</i> f_sot <i>(float $var)</i>',
		'examples'		=> 'f_sot(75000000), f_sot(maxValue*c4v/100)'
	),
	'f_floor' => array(
		'title'			=> __('f_floor - Round Fractions Down', 'reportit'),
		'description'	=> __('Returns the next lowest integer value by rounding down value if necessary.', 'reportit'),
		'params'		=> __('$var: float', 'reportit'),
		'syntax'		=> '<i>integer</i> f_floor <i>(float $var)</i>',
		'examples'		=> 'f_floor(69.19) = 69'
	),
	'f_ceil' => array(
		'title'			=> __('f_ceil - Round Fractions Up', 'reportit'),
		'description'	=> __('Returns the next highest integer value by rounding up value if necessary.', 'reportit'),
		'params'		=> __('$var: float', 'reportit'),
		'syntax'		=> '<i>integer</i> f_ceil <i>(float $var)</i>',
		'examples'		=> 'f_ceil(69.19) = 70'
	),
	'f_round' => array(
		'title'			=> __('f_round - Round A Float', 'reportit'),
		'description'	=> __('Returns the rounded integer value of any given float.', 'reportit'),
		'params'		=> __('$var: float or string value', 'reportit'),
		'syntax'		=> '<i>integer</i> f_round <i>(float $var)</i>',
		'examples'		=> 'f_round(69.50) = 70, f_round(69,49) = 69'
	),
	'f_high' => array(
		'title'			=> __('f_high - Find Highest Value', 'reportit'),
		'description'	=> __('Returns the highest value of a given list of parameters', 'reportit'),
		'params'		=> __('$var1, $var2, $var3 ...: values to be compared', 'reportit'),
		'syntax'		=> '<i>float</i> f_high <i>(float $var1, float $var2)</i>',
		'examples'		=> 'f_high(27,70) = 70'
	),
	'f_low' => array(
		'title'			=> __('f_high - Find Lowest Value', 'reportit'),
		'description'	=> __('Returns the lowest value of a given list of parameters', 'reportit'),
		'params'		=> __('$var1, $var2, $var3 ...: values to be compared', 'reportit'),
		'syntax'		=> '<i>float</i> f_low <i>(float $var1, float $var2)</i>',
		'examples'		=> 'f_low(27,70) = 27'
	),
	'f_if' => array(
		'title'			=> __('f_if - Conditional Operation - IF-THEN-ELSE Logic', 'reportit'),
		'description'	=> __('Returns B if A is true or C if A is false', 'reportit'),
		'params'		=> '$A, $B, $C',
		'syntax'		=> '<i>bool</i> f_if <i>(float $A, float $B, float $C)</i>',
		'examples'		=> 'f_if(0,1,2) = 2, f_if(1,1,2) = 1, f_if(f_low(0,1),f_1st, f_last) = f_last'
	),
	'f_nan' => array(
		'title'			=> __('f_nan - Find whether a value is not a number', 'reportit'),
		'description'	=> __('Returns 1 (or B) if A === NaN or 0 (or C) if not. Parameters B and C are optional.', 'reportit'),
		'params'		=> '$A [, $B, $C]',
		'syntax'		=> '<i>bool</i> f_nan <i>(float $A [, float $B, float $C])</i>',
		'examples'		=> 'f_nan(5) = 0, f_nan(f_min()) = 1 or 0, f_nan(f_min(),5) = 5 or 0, f_nan(f_min(),5,10) = 5 or 10'
	),
	'f_cmp' => array(
		'title'			=> __('f_cmp - Complex Comparison', 'reportit'),
		'description'	=> __('Returns 1 (or B) if A === NaN or 0 (or C) if not. Parameters B and C are optional.', 'reportit'),
		'params'		=> '$A [, $B, $C]',
		'syntax'		=> '<i>bool</i> f_nan <i>(float $A [, float $B, float $C])</i>',
		'examples'		=> 'f_nan(5) = 0, f_nan(f_min()) = 1 or 0, f_nan(f_min(),5) = 5 or 0, f_nan(f_min(),5,10) = 5 or 10'
	)
);

$calc_fct_names_params	= array_keys($calc_functions_params);

$calc_operators = array(
	'+' => __('Addition', 'reportit'),
	'-' => array(
		'title' 		=> __('Subtraction', 'reportit'),
		'description'	=> __('Mathematical Operation to return the difference of minuend and subtrahend'),
		'params'		=> 'none',
		'syntax'		=> '$A - $B',
		'examples'		=> '10-2 = 8, f_max()-f_min() = range'
	),
	'*' => __('Multiplication', 'reportit'),
	'/' => __('Division', 'reportit')
);

$calc_variables = array(
	'maxValue'    => __('Contains the maximum bandwidth if \'ifspeed\' is available.', 'reportit'),
	'maxRRDValue' => __('Contains the maximum value that has been defined for the specific data source item under \"Data Sources\".', 'reportit'),
	'step'        => __('Contains the number of seconds between two measured values.', 'reportit'),
	'nan'         => __('Contains the number of NAN\'s during the reporting period.', 'reportit')
);

$calc_var_names = array_keys($calc_variables);


$rubrics = array(
	__('Functions w/o parameters')	=> $calc_functions,
	__('Functions with parameters') => $calc_functions_params,
	__('Aliases')					=> $calc_functions_aliases,
	__('Operators')                 => $calc_operators,
	__('Variables')                 => $calc_variables,
	__('Data Query Variables')      => '',
	__('Interim Results')           => ''
);

$rounding = array(
	__('off', 'reportit'),
	__('Binary SI-Prefixes (Base 1024)', 'reportit'),
	__('Decimal SI-Prefixes (Base 1000)', 'reportit')
);

$type_specifier = array(
	__('Binary'),
	__('Floating point'),
	__('Integer'),
	__('Integer (unsigned)'),
	__('Hexadecimal (lower-case)'),
	__('Hexadecimal (upper-case)'),
	__('Octal'),
	__('Scientific Notation')
);

$precision = array(
	0  => __('None'),
	1  => 1,
	2  => 2,
	3  => 3,
	4  => 4,
	5  => 5,
	6  => 6,
	7  => 7,
	8  => 8,
	9  => 9,
	-1 => __('Unchanged')
);

