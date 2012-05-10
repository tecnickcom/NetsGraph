<?php
//=============================================================================+
// File name   : netsgraph.php
// Begin       : 2012-04-18
// Last Update : 2012-05-10
// Version     : 1.0.004
//
// Website     : https://github.com/fubralimited/NetsGraph
//
// Description : NetsGraph is a PHP class to generate SVG graphs and statistics from network data.
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Fubra Limited
//               Manor Coach House
//               Church Hill
//               Aldershot
//               Hampshire
//               GU12 4RQ
//				 UK
//               http://www.rackmap.net
//               support@rackmap.net
//
// License:
//    Copyright (C) 2012-2012 Fubra Limited
//
//    This program is free software: you can redistribute it and/or modify
//    it under the terms of the GNU Affero General Public License as
//    published by the Free Software Foundation, either version 3 of the
//    License, or (at your option) any later version.
//
//    This program is distributed in the hope that it will be useful,
//    but WITHOUT ANY WARRANTY; without even the implied warranty of
//    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//    GNU Affero General Public License for more details.
//
//    You should have received a copy of the GNU Affero General Public License
//    along with this program.  If not, see <http://www.gnu.org/licenses/>.
//
//    See LICENSE.TXT file for more information.
//=============================================================================+

/**
 * @file
 * NetsGraph is a PHP class to generate SVG graphs and statistics from network data.
 * @package com.fubra.netsgraph
 * @brief Class to create graphs from network data.
 * @author Nicola Asuni
 * @since 2012-04-18
 */

/**
 * @class NetsGraph
 * NetsGraph is a PHP class to generate SVG graphs and statistics from network data.
 * @package com.fubra.netsgraph
 * @version 1.0.004
 * @author Nicola Asuni
 */
class NetsGraph {

	// --- PARAMETERS ---

	/**
	 * Graph type: 'time' or 'percentile'
	 * @protected
	 */
	protected $graph_type;

	/**
	 * Total graph width in points.
	 * @protected
	 */
	protected $graph_width;

	/**
	 * Total graph height in points.
	 * @protected
	 */
	protected $graph_height;

	/**
	 * Background color for graph.
	 * @protected
	 */
	protected $background_color;

	/**
	 * Border width for graph.
	 * @protected
	 */
	protected $border_width;

	/**
	 * Color for graph border
	 * @protected
	 */
	protected $border_color;

	/**
	 * If true print statistics on graph.
	 * @protected
	 */
	protected $print_stats;

	/**
	 * If true print statistics in the same unit used on the graph (otherwise bit/s).
	 * @protected
	 */
	protected $stats_unit_prefix;

	/**
	 * background color for statistics.
	 * @protected
	 */
	protected $stats_bgcolor;

	/**
	 * Font type for the statistics.
	 * @protected
	 */
	protected $stats_fontfamily;

	/**
	 * Font style for the statistics.
	 * @protected
	 */
	protected $stats_fontweight;

	/**
	 * Font size for the statistics.
	 * @protected
	 */
	protected $stats_fontsize;

	/**
	 * Font color for the statistics.
	 * @protected
	 */
	protected $stats_fontcolor;

	/**
	 * Font type for the grid numbers on vertical axis.
	 * @protected
	 */
	protected $gridy_fontfamily;

	/**
	 * Font style for the grid numbers on vertical axis.
	 * @protected
	 */
	protected $gridy_fontweight;

	/**
	 * Font size for the grid numbers on vertical axis.
	 * @protected
	 */
	protected $gridy_fontsize;

	/**
	 * Font color for the grid numbers on vertical axis.
	 * @protected
	 */
	protected $gridy_fontcolor;

	/**
	 * Font type for the grid numbers on horizontal axis.
	 * @protected
	 */
	protected $gridx_fontfamily;

	/**
	 * Font style for the grid numbers on horizontal axis.
	 * @protected
	 */
	protected $gridx_fontweight;

	/**
	 * Font size for the grid numbers on horizontal axis.
	 * @protected
	 */
	protected $gridx_fontsize;

	/**
	 * Font color for the grid numbers on horizontal axis.
	 * @protected
	 */
	protected $gridx_fontcolor;

	/**
	 * Line width for vertical grid lines.
	 * @protected
	 */
	protected $grid_vert_line_width;

	/**
	 * Color for vertical grid lines.
	 * @protected
	 */
	protected $grid_vert_line_color;

	/**
	 * Line width for horizontal grid lines.
	 * @protected
	 */
	protected $grid_horiz_line_width;

	/**
	 * Color for horizontal grid lines.
	 * @protected
	 */
	protected $grid_horiz_line_color;

	/**
	 * Label for x axis.
	 * @protected
	 */
	protected $label_x;

	/**
	 * Font type for the x axis label.
	 * @protected
	 */
	protected $label_x_fontfamily;

	/**
	 * Font style for the x axis label.
	 * @protected
	 */
	protected $label_x_fontweight;

	/**
	 * Font size for the x axis label.
	 * @protected
	 */
	protected $label_x_fontsize;

	/**
	 * Font color for the x axis label.
	 * @protected
	 */
	protected $label_x_fontcolor;

	/**
	 * Label for y axis.
	 * @protected
	 */
	protected $label_y;

	/**
	 * Font type for the y axis label.
	 * @protected
	 */
	protected $label_y_fontfamily;

	/**
	 * Font style for the y axis label.
	 * @protected
	 */
	protected $label_y_fontweight;

	/**
	 * Font size for the y axis label.
	 * @protected
	 */
	protected $label_y_fontsize;

	/**
	 * Font color for the y axis label.
	 * @protected
	 */
	protected $label_y_fontcolor;

	/**
	 * Line color for graph data.
	 * @protected
	 */
	protected $data_line_color;

	/**
	 * Fill color for graph data.
	 * @protected
	 */
	protected $data_fill_color;

	/**
	 * Fill color opacity for graph data.
	 * @protected
	 */
	protected $data_fill_opacity;

	/**
	 * Line width for data.
	 * @protected
	 */
	protected $data_line_width;

	/**
	 * Percentile to represent on graph.
	 * @protected
	 */
	protected $percentile_x;

	/**
	 * Line width for horizontal percentile grid line.
	 * @protected
	 */
	protected $percentile_horiz_line_width;

	/**
	 * Color for horizontal percentile grid line.
	 * @protected
	 */
	protected $percentile_horiz_line_color;

	/**
	 * Opacity for horizontal percentile grid line.
	 * @protected
	 */
	protected $percentile_horiz_line_opacity;

	/**
	 * Line width for vertical percentile grid line.
	 * @protected
	 */
	protected $percentile_vert_line_width;

	/**
	 * Color for vertical percentile grid line.
	 * @protected
	 */
	protected $percentile_vert_line_color;

	/**
	 * Opacity for vertical percentile grid line.
	 * @protected
	 */
	protected $percentile_vert_line_opacity;

	/**
	 * Font type for the grid number on percentile vertical grid line.
	 * @protected
	 */
	protected $percentile_gridy_fontfamily;

	/**
	 * Font style for the grid number on percentile vertical grid line.
	 * @protected
	 */
	protected $percentile_gridy_fontweight;

	/**
	 * Font size for the grid number on percentile vertical grid line.
	 * @protected
	 */
	protected $percentile_gridy_fontsize;

	/**
	 * Font color for the grid number on percentile vertical grid line.
	 * @protected
	 */
	protected $percentile_gridy_fontcolor;

	/**
	 * Font type for the grid number on percentile horizontal grid line.
	 * @protected
	 */
	protected $percentile_gridx_fontfamily;

	/**
	 * Font style for the grid number on percentile horizontal grid line.
	 * @protected
	 */
	protected $percentile_gridx_fontweight;

	/**
	 * Font size for the grid number on percentile horizontal grid line.
	 * @protected
	 */
	protected $percentile_gridx_fontsize;

	/**
	 * Font color for the grid number on percentile horizontal grid line.
	 * @protected
	 */
	protected $percentile_gridx_fontcolor;

	// --- INTERNAL VARIABLES ---

	/**
	 * Maximum value for 32 bit unsigned integer.
	 * @private
	 */
	private $max32 = 4294967295; // (2^32 - 1)

	/**
	 * String containing the SVG graph.
	 * @public
	 */
	public $svg = '';

	/**
	 * Array containing time data
	 * @protected
	 */
	protected $time_data;

	/**
	 * Array containing ordered data
	 * @protected
	 */
	protected $ordered_data;

	/**
	 * Number of points in processed network data array.
	 * @protected
	 */
	protected $numpoints;

	/**
	 * Maximum value in processed network data array.
	 * @protected
	 */
	protected $maxvalue;

	/**
	 * Unit divider to represent data wit a unit multiplier.
	 * @protected
	 */
	protected $unit_divider;

	/**
	 * Unit prefix for data unit of measure [bit/s].
	 * @protected
	 */
	protected $unit_prefix = '';

	/**
	 * Maximum value for vertical axis.
	 * @protected
	 */
	protected $max_y_grid;

	/**
	 * Vertical space between two horizontal grid lines.
	 * @protected
	 */
	protected $vstep;

	/**
	 * Y value corresponding to the selected percentile.
	 * @protected
	 */
	protected $percentile_y;

	/**
	 * Space at left of the grid.
	 * @protected
	 */
	protected $space_left;

	/**
	 * Space at right of the grid.
	 * @protected
	 */
	protected $space_right;

	/**
	 * Space at top of the grid.
	 * @protected
	 */
	protected $space_top;

	/**
	 * Space at left of the grid.
	 * @protected
	 */
	protected $space_bottom;

	/**
	 * Grid width.
	 * @protected
	 */
	protected $grid_width;

	/**
	 * Grid height.
	 * @protected
	 */
	protected $grid_height;

	/**
	 * Vertical data ratio (to fit data on grid).
	 * @protected
	 */
	protected $ratio_vert;

	/**
	 * Horizontal data ratio (to fit data on grid).
	 * @protected
	 */
	protected $ratio_horiz;

	/**
	 * Data statistics.
	 * @protected
	 */
	protected $stats = array();

	/**
	 * Store total data transfer for the selected interval time.
	 * @protected
	 */
	protected $total_data_transfer = 0;

	// --- CONSTANTS ---

	/**
	 * Array of valid color names for SVG.
	 * @private
	 */
	private $svgcolors = array('none', 'aliceblue', 'antiquewhite', 'aqua', 'aquamarine', 'azure', 'beige', 'bisque', 'black', 'blanchedalmond', 'blue', 'blueviolet', 'brown', 'burlywood', 'cadetblue', 'chartreuse', 'chocolate', 'coral', 'cornflowerblue', 'cornsilk', 'crimson', 'cyan', 'darkblue', 'darkcyan', 'darkgoldenrod', 'dkgray', 'darkgray', 'darkgrey', 'darkgreen', 'darkkhaki', 'darkmagenta', 'darkolivegreen', 'darkorange', 'darkorchid', 'darkred', 'darksalmon', 'darkseagreen', 'darkslateblue', 'darkslategray', 'darkslategrey', 'darkturquoise', 'darkviolet', 'deeppink', 'deepskyblue', 'dimgray', 'dimgrey', 'dodgerblue', 'firebrick', 'floralwhite', 'forestgreen', 'fuchsia', 'gainsboro', 'ghostwhite', 'gold', 'goldenrod', 'gray', 'grey', 'green', 'greenyellow', 'honeydew', 'hotpink', 'indianred', 'indigo', 'ivory', 'khaki', 'lavender', 'lavenderblush', 'lawngreen', 'lemonchiffon', 'lightblue', 'lightcoral', 'lightcyan', 'lightgoldenrodyellow', 'ltgray', 'lightgray', 'lightgrey', 'lightgreen', 'lightpink', 'lightsalmon', 'lightseagreen', 'lightskyblue', 'lightslategray', 'lightslategrey', 'lightsteelblue', 'lightyellow', 'lime', 'limegreen', 'linen', 'magenta', 'maroon', 'mediumaquamarine', 'mediumblue', 'mediumorchid', 'mediumpurple', 'mediumseagreen', 'mediumslateblue', 'mediumspringgreen', 'mediumturquoise', 'mediumvioletred', 'midnightblue', 'mintcream', 'mistyrose', 'moccasin', 'navajowhite', 'navy', 'oldlace', 'olive', 'olivedrab', 'orange', 'orangered', 'orchid', 'palegoldenrod', 'palegreen', 'paleturquoise', 'palevioletred', 'papayawhip', 'peachpuff', 'peru', 'pink', 'plum', 'powderblue', 'purple', 'red', 'rosybrown', 'royalblue', 'saddlebrown', 'salmon', 'sandybrown', 'seagreen', 'seashell', 'sienna', 'silver', 'skyblue', 'slateblue', 'slategray', 'slategrey', 'snow', 'springgreen', 'steelblue', 'tan', 'teal', 'thistle', 'tomato', 'turquoise', 'violet', 'wheat', 'white', 'whitesmoke', 'yellow', 'yellowgreen');

	/**
	 * Valid values for font weight;
	 * @private
	 */
	private $fontweights = array('normal', 'bold', 'bolder', 'lighter', '100', '200', '300', '400', '500', '600', '700', '800', '900');

	// -------------------------------------------------------------------------

	/**
	 * This is the class constructor.
	 * @param $data (array) Array containing network data. Check the parseNetData() method for the format type.
	 * @param $params (array) Array of parameters.
	 * @see parseNetData()
	 */
	public function __construct($data, $params=array()) {
		if (isset($p['percentile_x'])) {
			$this->percentile_x = max(0, min(100, intval($p['percentile_x'])));
		} else {
			$this->percentile_x = 95;
		}
		$this->parseNetData($data);
		$this->parseParams($params);
		$this->createSVG($this->graph_type);
	}

	/**
	 * Parse network data.
	 * Always callthis method before parseParams().
	 * @data (array) Array of network data. The format can be: (a) an array of network data arrays to be merged where the key is a time string for key and the value is a 32 bit rolling counter in bytes-per-second, or (b) a simple array where the key is a UNIX EPOCH timestamp and the value is a differential value in the sampling interval expressed in bits-per-second.
 	 * @public
	 */
	public function parseNetData($data) {
		$this->total_data_transfer = 0;
		if (isset($data[0]) AND (is_array($data[0]))) {
			// format (a) - raw data
			$num_streams = count($data);
			// for each array of data
			for ($i = 0; $i < $num_streams; ++$i) {
				$precounter = 0;
				$pretimestamp = 0;
				// check how to convert time
				$time = key($data[0]);
				if (is_numeric($time)) {
					$time_string = false;
				} else {
					$time_string = true;
				}
				// parse and convert data
				foreach ($data[$i] as $time => $val) {
					// convert date-time string to an ISO format
					if ($time_string) {
						$timestamp = strtotime($time);
					} else {
						$timestamp = intval($time);
					}
					// get counter: octets in one minute
					$counter = (float)($val);
					if ($pretimestamp > 0) {
						if ($counter >= $precounter) {
							$tmpval = ($counter - $precounter);
						} else {
							$tmpval = ($counter + ($this->max32 - $precounter));
						}
						$this->total_data_transfer += $tmpval;
						// convert to bit per seconds (from bytes per minute)
						if (!isset($this->time_data[$timestamp])) {
							$this->time_data[$timestamp] = 0;
						}
						$this->time_data[$timestamp] += ($tmpval * (8 / ($timestamp - $pretimestamp)));
					}
					$precounter = $counter;
					$pretimestamp = $timestamp;
				}
			}
		} else {
			// format (b) - pre-processed data
			$this->time_data = $data;
		}
		// ordered data
		$this->ordered_data = $this->time_data;
		sort($this->ordered_data, SORT_NUMERIC);
		// count number of data items
		$this->numpoints = count($this->ordered_data);
		// calculate percentile value
		$this->calculatePercentileValue();
		// calculate statistics
		$this->calculateStatistics();
		// maximum value
		$this->maxvalue = $this->stats['maximum'];
		$unit_data = $this->getUnitValues($this->maxvalue);
		$this->unit_divider = $unit_data['unit_divider'];
		$this->unit_prefix = $unit_data['unit_prefix'];

		// calculate maximum grid value in bit/s
		$maxunit = round($this->maxvalue / $this->unit_divider);
		$divider = pow(10, (floor(log($maxunit, 10)) - 1));
		$maxgy = (ceil($maxunit / $divider) * $divider);
		// calculate space for vertical grid (horizontal lines)
		if ($maxgy <= 10) {
			$vstep = 1;
		} elseif ($maxgy <= 50) {
			$vstep = 5;
		} elseif ($maxgy <= 100) {
			$vstep = 10;
		} elseif ($maxgy <= 250) {
			$vstep = 25;
		} elseif ($maxgy <= 500) {
			$vstep = 50;
		} else {
			$vstep = 100;
		}
		$this->vstep = ($vstep * $this->unit_divider);
		// maximum value on the grid
		$this->max_y_grid = (($vstep * ceil($maxgy / $vstep)) * $this->unit_divider);
	}

	/**
	 * Get the multiplier and unit prefix for a given number
	 * @param $number (float) Number to process.
	 * @return (array) Array containing the unit divider and unit multiplier.
 	 * @protected
	 */
	protected function getUnitValues($number) {
		$unit = array('unit_divider' => 1, 'unit_prefix' => '');
		$numdigits = floor(log($number, 10));
		if ($numdigits < 3) {
			$unit['unit_divider'] = 1;
			$unit['unit_prefix'] = '';
		} elseif ($numdigits < 6) {
			// kilo 10^3
			$unit['unit_divider'] = 1000;
			$unit['unit_prefix'] = 'k';
		} elseif ($numdigits < 9) {
			// mega 10^6
			$unit['unit_divider'] = 1000000;
			$unit['unit_prefix'] = 'M';
		} elseif ($numdigits < 12) {
			// giga 10^9
			$unit['unit_divider'] = 1000000000;
			$unit['unit_prefix'] = 'G';
		} elseif ($numdigits < 15) {
			// tera 10^12
			$unit['unit_divider'] = 1000000000000;
			$unit['unit_prefix'] = 'T';
		} elseif ($numdigits < 18) {
			// peta 10^15
			$unit['unit_divider'] = 1000000000000000;
			$unit['unit_prefix'] = 'P';
		} elseif ($numdigits < 21) {
			// exa 10^18
			$unit['unit_divider'] = 1000000000000000000;
			$unit['unit_prefix'] = 'E';
		}
		return $unit;
	}

	/**
	 * Calculate the percentile value.
	 * Call this method only after parseNetData() and parseParams().
 	 * @protected
	 */
	protected function calculatePercentileValue() {
		$this->percentile_y = 0;
		if (isset($this->percentile_x) AND ($this->percentile_x >= 0)) {
			// index of k-th percentile
			$pki = (($this->numpoints * $this->percentile_x / 100) - 1);
			// get nearest indexes
			$va = $this->ordered_data[floor($pki)];
			$vb = $this->ordered_data[ceil($pki)];
			// value of the k-th percentile
			$this->percentile_y = ($va + (($vb - $va) * ($pki - floor($pki))));
		}
	}

	/**
	 * Calculate descriptive statistics for the ordered input data.
	 * @protected
	 */
	protected function calculateStatistics() {
		// array to return
		$stats = array('numsamples'=>0, 'minimum'=>'', 'maximum'=>'', 'range'=>'', 'sum'=>'', 'mean'=>'', 'median'=>'', 'mode'=>'', 'variance'=>'', 'standard_deviation'=>'', 'skewness'=>'', 'kurtosis'=>'');
		// number of items
		$stats['numsamples'] = $this->numpoints;
		if ($stats['numsamples'] < 1) {
			return $stats;
		}
		// minimum value
		$stats['minimum'] = $this->ordered_data[0];
		// maximum value
		$stats['maximum'] = $this->ordered_data[($stats['numsamples'] - 1)];
		// range
		$stats['range'] = ($stats['maximum'] - $stats['minimum']);
		// sum of all samples
		$stats['sum'] = array_sum($this->ordered_data);
		// mean or average value
		$stats['mean'] = ($stats['sum'] / $stats['numsamples']);
		// median
		if (($stats['numsamples'] % 2) == 0) {
			$stats['median'] = (($this->ordered_data[($stats['numsamples'] / 2)] + $this->ordered_data[(($stats['numsamples'] / 2) - 1)]) / 2);
		} else {
			$stats['median'] = $this->ordered_data[(($stats['numsamples'] - 1) / 2)];
		}
		$datastr = array();

		if (isset($this->total_data_transfer)) {
			$stats['data_transfer'] = $this->total_data_transfer;
		} else {
			// total data transfer
			$stats['data_transfer'] = 0;
			$prevtime = 0;
			$timestamp = array_keys($this->time_data);
			foreach ($this->time_data as $time => $value) {
				if ($prevtime > 0) {
					$stats['data_transfer'] += ($value * ($time - $prevtime));
				} elseif (isset($timestamp[1])) {
					// assume that the first interval is equal to the second one
					$stats['data_transfer'] += ($value * ($timestamp[1] - $time));
				}
				$prevtime = $time;
			}
			$stats['data_transfer'] /= 8; // convert to bytes
		}

		// deviance
		$dev = 0;
		foreach ($this->ordered_data as $value) {
			$dev += pow(($value - $stats['mean']), 2);
			$datastr[] = ''.$value.''; // convert value to string
		}
		$freq = array_count_values($datastr);
		arsort($freq, SORT_NUMERIC);
		$freq = array_keys($freq);
		// mode
		$stats['mode'] = floatval($freq[0]);
		// variance
		$stats['variance'] = ($dev / $stats['numsamples']);
		// standard deviation
		$stats['standard_deviation'] = sqrt($stats['variance']);
		// skewness
		$stats['skewness'] = 0;
		// kurtosis
		$stats['kurtosis'] = 0;
		if ($stats['standard_deviation'] != 0) {
			foreach ($this->ordered_data as $value) {
				$tmpval = (($value - $stats['mean']) / $stats['standard_deviation']);
				$stats['skewness'] += pow($tmpval, 3);
				$stats['kurtosis'] += pow($tmpval, 4);
			}
			$stats['skewness'] /= $stats['numsamples'];
			$stats['kurtosis'] /= $stats['numsamples'];
		}

		// percentile stats
		if (!isset($this->percentile_y)) {
			$this->calculatePercentileValue();
		}
		$stats['percentile_x'] = $this->percentile_x;
		$stats['percentile_y'] = $this->percentile_y;
		$stats['perc_percentile_y_maximum'] = (100 * ($stats['percentile_y'] / $stats['maximum']));
		$stats['perc_mean_percentile_y'] = (100 * ($stats['mean'] / $stats['percentile_y']));
		$stats['perc_median_percentile_y'] = (100 * ($stats['median'] / $stats['percentile_y']));
		$stats['perc_mode_percentile_y'] = (100 * ($stats['mode'] / $stats['percentile_y']));

		$this->stats = $stats;
	}

	/**
	 * Return true descriptive statistics for ordered input data..
	 * @return (array) Array containing data statistics.
 	 * @public
	 */
	public function getStatistics() {
		if (empty($this->stats)) {
			$this->calculateStatistics();
		}
		return $this->stats;
	}

	/**
	 * Return true if the color is a valid SVG color, false otherwise.
	 * @parm $color (string) Color name of hex.
	 * @param (boolean) true or false.
 	 * @public
	 */
	public function isValidColor($color) {
		if (in_array($color, $this->svgcolors)) {
			return true;
		}
		if (preg_match('/^#([0-9A-Fa-f]{3,6})$/', $color) > 0) {
			return true;
		}
		return false;
	}

	/**
	 * Parse input parameters and set default values.
	 * Call this method after parseNetData().
	 * @parm $p (array) Array of parameters.
 	 * @public
	 */
	public function parseParams($p=array()) {
		if (isset($p['graph_type']) AND in_array($p['graph_type'], array('time', 'percentile'))) {
			$this->graph_type = $p['graph_type'];
		} else {
			$this->graph_type = 'percentile';
		}
		if (isset($p['background_color']) AND ($this->isValidColor($p['background_color']))) {
			$this->background_color = strtolower($p['background_color']);
		} else {
			$this->background_color = '#ffffff';
		}
		if (isset($p['border_width'])) {
			$this->border_width = abs(floatval($p['border_width']));
		} else {
			$this->border_width = 1;
		}
		if (isset($p['border_color'])) {
			$this->border_color = strtolower($p['border_color']);
		} else {
			$this->border_color = '#000000';
		}
		if (isset($p['print_stats'])) {
			$this->print_stats = $p['print_stats']?true:false;
		} else {
			$this->print_stats = true;
		}
		if (isset($p['stats_unit_prefix'])) {
			$this->stats_unit_prefix = $p['stats_unit_prefix']?true:false;
		} else {
			$this->stats_unit_prefix = true;
		}
		if (isset($p['stats_bgcolor']) AND ($this->isValidColor($p['stats_bgcolor']))) {
			$this->stats_bgcolor = strtolower($p['stats_bgcolor']);
		} else {
			$this->stats_bgcolor = '#ffffee';
		}
		if (isset($p['stats_fontfamily'])) {
			$this->stats_fontfamily = preg_replace('/[^A-Za-z0-9\,]/', '', $p['stats_fontfamily']);
		} else {
			$this->stats_fontfamily = 'monospace';
		}
		if (isset($p['stats_fontweight']) AND in_array($p['stats_fontweight'], $this->fontweights)) {
			$this->stats_fontweight = $p['stats_fontweight'];
		} else {
			$this->stats_fontweight = 'normal';
		}
		if (isset($p['stats_fontsize'])) {
			$this->stats_fontsize = abs(floatval($p['stats_fontsize']));
		} else {
			$this->stats_fontsize = 10;
		}
		if (isset($p['stats_fontcolor'])) {
			$this->stats_fontcolor = strtolower($p['stats_fontcolor']);
		} else {
			$this->stats_fontcolor = '#404040';
		}
		if (isset($p['gridy_fontfamily'])) {
			$this->gridy_fontfamily = preg_replace('/[^A-Za-z0-9\,]/', '', $p['gridy_fontfamily']);
		} else {
			$this->gridy_fontfamily = 'Arial,Verdana';
		}
		if (isset($p['gridy_fontweight']) AND in_array($p['gridy_fontweight'], $this->fontweights)) {
			$this->gridy_fontweight = $p['gridy_fontweight'];
		} else {
			$this->gridy_fontweight = 'normal';
		}
		if (isset($p['gridy_fontsize'])) {
			$this->gridy_fontsize = abs(floatval($p['gridy_fontsize']));
		} else {
			$this->gridy_fontsize = 12;
		}
		if (isset($p['gridy_fontcolor'])) {
			$this->gridy_fontcolor = strtolower($p['gridy_fontcolor']);
		} else {
			$this->gridy_fontcolor = '#808080';
		}
		if (isset($p['gridx_fontfamily'])) {
			$this->gridx_fontfamily = preg_replace('/[^A-Za-z0-9\,]/', '', $p['gridx_fontfamily']);
		} else {
			$this->gridx_fontfamily = 'Arial,Verdana';
		}
		if (isset($p['gridx_fontweight']) AND in_array($p['gridx_fontweight'], $this->fontweights)) {
			$this->gridx_fontweight = $p['gridx_fontweight'];
		} else {
			$this->gridx_fontweight = 'normal';
		}
		if (isset($p['gridx_fontsize'])) {
			$this->gridx_fontsize = abs(floatval($p['gridx_fontsize']));
		} else {
			$this->gridx_fontsize = 12;
		}
		if (isset($p['gridx_fontcolor'])) {
			$this->gridx_fontcolor = strtolower($p['gridx_fontcolor']);
		} else {
			$this->gridx_fontcolor = '#808080';
		}
		if (isset($p['grid_vert_line_width'])) {
			$this->grid_vert_line_width = abs(floatval($p['grid_vert_line_width']));
		} else {
			$this->grid_vert_line_width = 1;
		}
		if (isset($p['grid_vert_line_color'])) {
			$this->grid_vert_line_color = strtolower($p['grid_vert_line_color']);
		} else {
			$this->grid_vert_line_color = '#cccccc';
		}
		if (isset($p['grid_horiz_line_width'])) {
			$this->grid_horiz_line_width = abs(floatval($p['grid_horiz_line_width']));
		} else {
			$this->grid_horiz_line_width = 1;
		}
		if (isset($p['grid_horiz_line_color'])) {
			$this->grid_horiz_line_color = strtolower($p['grid_horiz_line_color']);
		} else {
			$this->grid_horiz_line_color = '#cccccc';
		}
		if (isset($p['label_x'])) {
			$this->label_x = strtr($p['label_x'], array('"', '&quot;'));
		} else {
			if ($this->graph_type == 'percentile') {
				$this->label_x = 'Percentile [%]';
			} elseif ($this->graph_type == 'time') {
				$this->label_x = 'Time';
			} else {
				$this->label_x = '';
			}
		}
		if (isset($p['label_x_fontfamily'])) {
			$this->label_x_fontfamily = preg_replace('/[^A-Za-z0-9\,]/', '', $p['label_x_fontfamily']);
		} else {
			$this->label_x_fontfamily = 'Arial,Verdana';
		}
		if (isset($p['label_x_fontweight']) AND in_array($p['label_x_fontweight'], $this->fontweights)) {
			$this->label_x_fontweight = $p['label_x_fontweight'];
		} else {
			$this->label_x_fontweight = 'normal';
		}
		if (isset($p['label_x_fontsize'])) {
			$this->label_x_fontsize = abs(floatval($p['label_x_fontsize']));
		} else {
			$this->label_x_fontsize = 14;
		}
		if (isset($p['label_x_fontcolor'])) {
			$this->label_x_fontcolor = strtolower($p['label_x_fontcolor']);
		} else {
			$this->label_x_fontcolor = '#000000';
		}
		if (isset($p['label_y'])) {
			$this->label_y = strtr($p['label_y'], array('"', '&quot;'));
		} else {
			$this->label_y = 'Network Data Rate ['.$this->unit_prefix.'bit/s]';
		}
		if (isset($p['label_y_fontfamily'])) {
			$this->label_y_fontfamily = preg_replace('/[^A-Za-z0-9\,]/', '', $p['label_y_fontfamily']);
		} else {
			$this->label_y_fontfamily = 'Arial,Verdana';
		}
		if (isset($p['label_y_fontweight']) AND in_array($p['label_y_fontweight'], $this->fontweights)) {
			$this->label_y_fontweight = $p['label_y_fontweight'];
		} else {
			$this->label_y_fontweight = 'normal';
		}
		if (isset($p['label_y_fontsize'])) {
			$this->label_y_fontsize = abs(floatval($p['label_y_fontsize']));
		} else {
			$this->label_y_fontsize = 14;
		}
		if (isset($p['label_y_fontcolor'])) {
			$this->label_y_fontcolor = strtolower($p['label_y_fontcolor']);
		} else {
			$this->label_y_fontcolor = '#000000';
		}
		if (isset($p['data_line_color'])) {
			$this->data_line_color = strtolower($p['data_line_color']);
		} else {
			$this->data_line_color = '#0000ff';
		}
		if (isset($p['data_fill_color'])) {
			$this->data_fill_color = strtolower($p['data_fill_color']);
		} else {
			$this->data_fill_color = '#00ff00';
		}
		if (isset($p['data_fill_opacity'])) {
			$this->data_fill_opacity = abs(floatval($p['data_fill_opacity']));
		} else {
			$this->data_fill_opacity = 0.7;
		}
		if (isset($p['data_line_width'])) {
			$this->data_line_width = abs(floatval($p['data_line_width']));
		} else {
			$this->data_line_width = 1;
		}
		if (isset($p['percentile_x'])) {
			$this->percentile_x = max(0, min(100, intval($p['percentile_x'])));
		} else {
			$this->percentile_x = 95;
		}
		if (isset($p['percentile_horiz_line_width'])) {
			$this->percentile_horiz_line_width = abs(floatval($p['percentile_horiz_line_width']));
		} else {
			$this->percentile_horiz_line_width = 1;
		}
		if (isset($p['percentile_horiz_line_color'])) {
			$this->percentile_horiz_line_color = strtolower($p['percentile_horiz_line_color']);
		} else {
			$this->percentile_horiz_line_color = '#ff0000';
		}
		if (isset($p['percentile_horiz_line_opacity'])) {
			$this->percentile_horiz_line_opacity = abs(floatval($p['percentile_horiz_line_opacity']));
		} else {
			$this->percentile_horiz_line_opacity = 1;
		}
		if (isset($p['percentile_vert_line_width'])) {
			$this->percentile_vert_line_width = abs(floatval($p['percentile_vert_line_width']));
		} else {
			$this->percentile_vert_line_width = 1;
		}
		if (isset($p['percentile_vert_line_color'])) {
			$this->percentile_vert_line_color = strtolower($p['percentile_vert_line_color']);
		} else {
			$this->percentile_vert_line_color = '#ff0000';
		}
		if (isset($p['percentile_vert_line_opacity'])) {
			$this->percentile_vert_line_opacity = abs(floatval($p['percentile_vert_line_opacity']));
		} else {
			$this->percentile_vert_line_opacity = 1;
		}
		if (isset($p['percentile_gridy_fontfamily'])) {
			$this->percentile_gridy_fontfamily = preg_replace('/[^A-Za-z0-9\,]/', '', $p['percentile_gridy_fontfamily']);
		} else {
			$this->percentile_gridy_fontfamily = 'Arial,Verdana';
		}
		if (isset($p['percentile_gridy_fontweight']) AND in_array($p['percentile_gridy_fontweight'], $this->fontweights)) {
			$this->percentile_gridy_fontweight = $p['percentile_gridy_fontweight'];
		} else {
			$this->percentile_gridy_fontweight = 'bold';
		}
		if (isset($p['percentile_gridy_fontsize'])) {
			$this->percentile_gridy_fontsize = abs(floatval($p['percentile_gridy_fontsize']));
		} else {
			$this->percentile_gridy_fontsize = 14;
		}
		if (isset($p['percentile_gridy_fontcolor'])) {
			$this->percentile_gridy_fontcolor = strtolower($p['percentile_gridy_fontcolor']);
		} else {
			$this->percentile_gridy_fontcolor = '#b00000';
		}
		if (isset($p['percentile_gridx_fontfamily'])) {
			$this->percentile_gridx_fontfamily = preg_replace('/[^A-Za-z0-9\,]/', '', $p['percentile_gridx_fontfamily']);
		} else {
			$this->percentile_gridx_fontfamily = 'Arial,Verdana';
		}
		if (isset($p['percentile_gridx_fontweight']) AND in_array($p['percentile_gridx_fontweight'], $this->fontweights)) {
			$this->percentile_gridx_fontweight = $p['percentile_gridx_fontweight'];
		} else {
			$this->percentile_gridx_fontweight = 'bold';
		}
		if (isset($p['percentile_gridx_fontsize'])) {
			$this->percentile_gridx_fontsize = abs(floatval($p['percentile_gridx_fontsize']));
		} else {
			$this->percentile_gridx_fontsize = 12;
		}
		if (isset($p['percentile_gridx_fontcolor'])) {
			$this->percentile_gridx_fontcolor = strtolower($p['percentile_gridx_fontcolor']);
		} else {
			$this->percentile_gridx_fontcolor = '#ff0000';
		}
		// space around grid area
		$this->space_left = round((2 * $this->label_y_fontsize) + (5 * $this->gridy_fontsize));
		$this->space_right = round(2 * $this->gridx_fontsize);
		$this->space_top = round($this->gridy_fontsize);
		$this->space_bottom = round((2 * $this->label_x_fontsize) + (3 * $this->gridx_fontsize));
		if (isset($p['graph_width'])) {
			$this->graph_width = max(($this->space_left + $this->space_right + (21 * $this->stats_fontsize)), abs(intval($p['graph_width'])));
		} else {
			$this->graph_width = ($this->space_left + $this->space_right + $this->numpoints);
		}
		$this->grid_width = ($this->graph_width - $this->space_left - $this->space_right);
		$this->ratio_horiz = ($this->grid_width / ($this->numpoints - 1));
		if (isset($p['graph_height'])) {
			$this->graph_height = max(($this->space_top + $this->space_bottom + (19 * $this->stats_fontsize * 1.1)), abs(intval($p['graph_height'])));
		} else {
			$this->graph_height = ($this->space_top + $this->space_bottom + round($this->grid_width * (9 / 16)));
		}
		$this->grid_height = ($this->graph_height - $this->space_top - $this->space_bottom);
		$this->ratio_vert = ($this->grid_height / $this->max_y_grid);
	}

	/**
	 * Create the SVG graph.
	 * @param $type (string) Type of graph ('percentile' or 'time')
 	 * @public
	 */
	public function createSVG($type='percentile') {
		// create SVG graph
		$svg = '<'.'?'.'xml version="1.0" standalone="no"'.'?'.'>'."\n";
		$svg .= '<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">'."\n";
		$svg .= '<svg width="'.$this->graph_width.'" height="'.$this->graph_height.'" version="1.1" xmlns="http://www.w3.org/2000/svg">'."\n";
		$svg .= '<desc>netsgraph - network SVG graph</desc>'."\n";

		// background
		if (($this->background_color != 'none') OR ($this->border_width > 0)) {
			$svg .= '<rect x="0" y="0" width="'.$this->graph_width.'" height="'.$this->graph_height.'" stroke-width="'.$this->border_width.'" stroke="'.$this->border_color.'" fill="'.$this->background_color.'" />'."\n";
		}

		// graph coordinates
		$coords = '';

		if ($type == 'percentile') { // percentile graph

			// vertical lines grid
			$svg .= '<g stroke-width="'.$this->grid_vert_line_width.'" stroke="'.$this->grid_vert_line_color.'" text-anchor="middle" font-family="'.$this->gridx_fontfamily.'" font-weight="'.$this->gridx_fontweight.'" font-size="'.$this->gridx_fontsize.'" fill="'.$this->gridx_fontcolor.'">'."\n";
			for ($i = 0; $i <=100; $i += 5) {
				if ($i != $this->percentile_x) {
					$x = sprintf('%.6F', ($this->space_left + ($i * $this->grid_width / 100)));
					// line
					$svg .= "\t".'<line x1="'.$x.'" y1="'.$this->space_top.'" x2="'.$x.'" y2="'.($this->space_top + $this->grid_height + ($this->gridx_fontsize / 3)).'" />'."\n";
					// label
					$svg .= "\t".'<text x="'.$x.'" y="'.($this->space_top + $this->grid_height + (2 * $this->gridx_fontsize)).'" stroke-width="0">'.$i.'</text>'."\n";
				}
			}
			$svg .= '</g>'."\n";

			// calculate graph coordinates
			$xp = -1;
			$yp = -1;
			foreach ($this->ordered_data as $key => $val) {
				$x = sprintf('%.6F', (($key * $this->ratio_horiz) + $this->space_left));
				$y = sprintf('%.6F', ((($this->max_y_grid - $val) * $this->ratio_vert) + $this->space_top));
				// exclude points that are too close
				if ((abs($x - $xp) >= 0.5) OR (abs($y - $yp) >= 0.5)) {
					$coords .= ' '.$x.','.$y.'';
					$xp = $x;
					$yp = $y;
				}
			}

		} else { // time graph

			// timestamps
			$timestamps = array_keys($this->time_data);

			// vertical lines grid
			$svg .= '<g stroke-width="'.$this->grid_vert_line_width.'" stroke="'.$this->grid_vert_line_color.'" font-family="'.$this->gridx_fontfamily.'" font-weight="'.$this->gridx_fontweight.'" font-size="'.$this->gridx_fontsize.'" fill="'.$this->gridx_fontcolor.'">'."\n";

			// print starting date-time
			$start_time = $timestamps[0];
			$start_time_str = date('Y-m-d H:i:s', $start_time);
			$x = sprintf('%.6F', $this->space_left);
			$svg .= "\t".'<line x1="'.$x.'" y1="'.$this->space_top.'" x2="'.$x.'" y2="'.($this->space_top + $this->grid_height + ($this->gridx_fontsize / 3)).'" />'."\n";
			$svg .= "\t".'<text x="'.$x.'" y="'.($this->space_top + $this->grid_height + (2 * $this->gridx_fontsize)).'" stroke-width="0" text-anchor="start">'.$start_time_str.'</text>'."\n";

			// print ending date-time
			$end_time = $timestamps[($this->numpoints - 1)];
			$end_time_str = date('Y-m-d H:i:s', $end_time);
			$x = sprintf('%.6F', ($this->space_left + $this->grid_width));
			$svg .= "\t".'<line x1="'.$x.'" y1="'.$this->space_top.'" x2="'.$x.'" y2="'.($this->space_top + $this->grid_height + ($this->gridx_fontsize / 3)).'" />'."\n";
			$svg .= "\t".'<text x="'.$x.'" y="'.($this->space_top + $this->grid_height + (2 * $this->gridx_fontsize)).'" stroke-width="0" text-anchor="end" >'.$end_time_str.'</text>'."\n";

			//find first grid point
			$time_diff = ($end_time - $start_time);
			$xratio = ($this->grid_width / $time_diff);

			if ($time_diff <= 3600) {
				// one minute interval grid
				$xstep = 60;
				$start_point = strtotime(substr($start_time_str, 0, 14).sprintf('%02d', (intval(substr($start_time_str, 14, 2)) + 1)).':00');
				$end_point = strtotime(substr($end_time_str, 0, 17).'00');
			} elseif ($time_diff <= 86400) {
				// one hour interval grid
				$xstep = 3600;
				$start_point = strtotime(substr($start_time_str, 0, 11).sprintf('%02d', (intval(substr($start_time_str, 11, 2)) + 1)).':00:00');
				$end_point = strtotime(substr($end_time_str, 0, 14).'00:00');
			} else {
				// one day interval grid
				$xstep = 86400;
				$start_point = strtotime(substr($start_time_str, 0, 8).sprintf('%02d', (intval(substr($start_time_str, 8, 2)) + 1)).' 00:00:00');
				$end_point = strtotime(substr($end_time_str, 0, 11).'00:00:00');
			}

			for ($i = $start_point; $i <= $end_point; $i += $xstep) {
				$x = sprintf('%.6F', ($this->space_left + (($i - $start_time) * $xratio)));
				// line
				$svg .= "\t".'<line x1="'.$x.'" y1="'.$this->space_top.'" x2="'.$x.'" y2="'.($this->space_top + $this->grid_height + ($this->gridx_fontsize / 3)).'" />'."\n";
			}

			$svg .= '</g>'."\n";

			// calculate graph coordinates
			$xp = -1;
			$yp = -1;
			foreach ($this->time_data as $time => $val) {
				$x = sprintf('%.6F', ($this->space_left + (($time - $start_time) * $xratio)));
				$y = sprintf('%.6F', ((($this->max_y_grid - $val) * $this->ratio_vert) + $this->space_top));
				// exclude points that are too close
				if ((abs($x - $xp) >= 0.5) OR (abs($y - $yp) >= 0.5)) {
					$coords .= ' '.$x.','.$y.'';
					$xp = $x;
					$yp = $y;
				}
			}

		}

		// draw horizontal lines grid
		$svg .= '<g stroke-width="'.$this->grid_horiz_line_width.'" stroke="'.$this->grid_horiz_line_color.'" text-anchor="middle" font-family="'.$this->gridy_fontfamily.'" font-weight="'.$this->gridy_fontweight.'" font-size="'.$this->gridy_fontsize.'" fill="'.$this->gridy_fontcolor.'">'."\n";

		//for ($i = 0; $i <= $this->max_y_grid; $i += $this->vstep) {
		$xa = ($this->space_left - ($this->gridy_fontsize / 3));
		$xb = ($this->space_left + $this->grid_width);
		$xt = ($this->space_left - (1.5 * $this->gridy_fontsize));

		for ($i = $this->max_y_grid; $i >= 0; $i -= $this->vstep) {
			$y = sprintf('%.6F', ($this->space_top + ($i * $this->ratio_vert)));
			// line
			$svg .= "\t".'<line x1="'.$xa.'" y1="'.$y.'" x2="'.$xb.'" y2="'.$y.'" />'."\n";
			// label
			$svg .= "\t".'<text x="'.$xt.'" y="'.($y + ($this->gridy_fontsize / 3)).'" stroke-width="0">'.round(($this->max_y_grid - $i) / $this->unit_divider).'</text>'."\n";
		}

		$svg .= '</g>'."\n";

		// draw line
		$svg .= '<polyline fill="none" stroke="'.$this->data_line_color.'" stroke-width="'.$this->data_line_width.'" points="'.$coords.'" />'."\n";

		// draw fill
		$startx = $this->space_left;
		$starty = ($this->space_top + $this->grid_height);
		$svg .= '<path fill="'.$this->data_fill_color.'" opacity="'.$this->data_fill_opacity.'" stroke-width="0" d="M '.$this->space_left.','.($this->space_top + $this->grid_height).' L '.$coords.' '.($this->space_left + $this->grid_width).','.($this->space_top + $this->grid_height).' Z" />'."\n";

		if ($type == 'percentile') {

			// draw vertical percentile line grid
			$svg .= '<g stroke-width="'.$this->percentile_vert_line_width.'" stroke="'.$this->percentile_vert_line_color.'" text-anchor="middle" font-family="'.$this->percentile_gridx_fontfamily.'" font-weight="'.$this->percentile_gridx_fontweight.'" font-size="'.$this->percentile_gridx_fontsize.'" fill="'.$this->percentile_gridx_fontcolor.'">'."\n";
			$x = sprintf('%.6F', ($this->space_left + ($this->percentile_x * $this->grid_width / 100)));
			// line
			$svg .= "\t".'<line x1="'.$x.'" y1="'.$this->space_top.'" x2="'.$x.'" y2="'.($this->space_top + $this->grid_height + ($this->gridx_fontsize / 3)).'" />'."\n";
			// label
			$svg .= "\t".'<text x="'.$x.'" y="'.($this->space_top + $this->grid_height + (2 * $this->gridx_fontsize)).'" stroke-width="0">'.$this->percentile_x.'</text>'."\n";
			$svg .= '</g>'."\n";

			// draw horizontal percentile line grid
			$svg .= '<g stroke-width="'.$this->percentile_horiz_line_width.'" stroke="'.$this->percentile_horiz_line_color.'" text-anchor="middle" font-family="'.$this->percentile_gridy_fontfamily.'" font-weight="'.$this->percentile_gridy_fontweight.'" font-size="'.$this->percentile_gridy_fontsize.'" fill="'.$this->percentile_gridy_fontcolor.'">'."\n";
			$y = sprintf('%.6F', ($this->space_top + (($this->max_y_grid - $this->percentile_y) * $this->ratio_vert)));
			// line
			$svg .= "\t".'<line x1="'.($this->space_left - ($this->gridy_fontsize / 3)).'" y1="'.$y.'" x2="'.($this->space_left + $this->grid_width).'" y2="'.$y.'" />'."\n";
			$svg .= '</g>'."\n";

			// percentile value
			$x = sprintf('%.6F', ($this->space_left + ($this->percentile_x * $this->grid_width / 100)) - $this->percentile_gridy_fontsize);
			$svg .= "\t".'<text font-family="'.$this->percentile_gridy_fontfamily.'" font-weight="'.$this->percentile_gridy_fontweight.'" font-size="'.$this->percentile_gridy_fontsize.'" fill="'.$this->percentile_gridy_fontcolor.'" text-anchor="end" x="'.$x.'" y="'.($y - $this->percentile_gridy_fontsize).'" stroke-width="0">~ '.round($this->percentile_y / $this->unit_divider).' '.$this->unit_prefix.'bit/s</text>'."\n";

		}

		// x axis label
		if (!empty($this->label_x)) {
			$svg .= "\t".'<text font-family="'.$this->label_x_fontfamily.'" font-weight="'.$this->label_x_fontweight.'" font-size="'.$this->label_x_fontsize.'" fill="'.$this->label_x_fontcolor.'" text-anchor="middle" x="'.($this->space_left + ($this->grid_width / 2)).'" y="'.($this->graph_height - $this->label_x_fontsize).'" stroke-width="0">'.$this->label_x.'</text>'."\n";
		}

		// y axis label
		if (!empty($this->label_y)) {
			$svg .= "\t".'<text font-family="'.$this->label_y_fontfamily.'" font-weight="'.$this->label_y_fontweight.'" font-size="'.$this->label_y_fontsize.'" fill="'.$this->label_y_fontcolor.'" text-anchor="middle" y="'.(1.5 * $this->label_y_fontsize).'" x="-'.($this->space_top + ($this->grid_height / 2)).'" transform="matrix(0,-1,1,0,0,0)" stroke-width="0" >'.$this->label_y.'</text>'."\n";
		}

		// print stats
		if ($this->print_stats) {
			$svg .= "\t".'<g xml:space="preserve" stroke-width="0" font-family="'.$this->stats_fontfamily.'" font-weight="'.$this->stats_fontweight.'" font-size="'.$this->stats_fontsize.'" fill="'.$this->stats_fontcolor.'">'."\n";

			$ystep = ($this->stats_fontsize * 1.1);

			$x = $this->space_left + $this->stats_fontsize;
			$y = $this->space_top + $this->stats_fontsize;

			// array of stats to print
			$statdata = array(
				'  samples' => $this->formatStatNumber($this->stats['numsamples'], 0, '', (5 + intval($this->stats_unit_prefix)), false),
				' tot data' => $this->formatStatNumber($this->stats['data_transfer'], 3, 'B', 4, $this->stats_unit_prefix),
				'      sum' => $this->formatStatNumber($this->stats['sum'], 3, 'bit/s', 0, $this->stats_unit_prefix),
				'      min' => $this->formatStatNumber($this->stats['minimum'], 3, 'bit/s', 0, $this->stats_unit_prefix),
				'      max' => $this->formatStatNumber($this->stats['maximum'], 3, 'bit/s', 0, $this->stats_unit_prefix),
				'    range' => $this->formatStatNumber($this->stats['range'], 3, 'bit/s', 0, $this->stats_unit_prefix),
				'     mean' => $this->formatStatNumber($this->stats['mean'], 3, 'bit/s', 0, $this->stats_unit_prefix),
				'   median' => $this->formatStatNumber($this->stats['median'], 3, 'bit/s', 0, $this->stats_unit_prefix),
				'     mode' => $this->formatStatNumber($this->stats['mode'], 3, 'bit/s', 0, $this->stats_unit_prefix),
				'   stddev' => $this->formatStatNumber($this->stats['standard_deviation'], 3, 'bit/s', 0, $this->stats_unit_prefix),
				' skewness' => $this->formatStatNumber($this->stats['skewness'], 3, '', (5 + intval($this->stats_unit_prefix)), true),
				' kurtosis' => $this->formatStatNumber($this->stats['kurtosis'], 3, '', (5 + intval($this->stats_unit_prefix)), true));
			$h = (14 * $ystep);
			if ($type == 'percentile') {
				$statdata[sprintf(' % 2d', $this->percentile_x).'th prc'] = $this->formatStatNumber($this->percentile_y, 3, 'bit/s', 0, $this->stats_unit_prefix);
				$statdata['  prc/max'] = $this->formatStatNumber($this->stats['perc_percentile_y_maximum'], 3, '%', (4 + intval($this->stats_unit_prefix)), true);
				$statdata[' mean/prc'] = $this->formatStatNumber($this->stats['perc_mean_percentile_y'], 3, '%', (4 + intval($this->stats_unit_prefix)), true);
				$statdata['  med/prc'] = $this->formatStatNumber($this->stats['perc_median_percentile_y'], 3, '%', (4 + intval($this->stats_unit_prefix)), true);
				$statdata[' mode/prc'] = $this->formatStatNumber($this->stats['perc_mode_percentile_y'], 3, '%', (4 + intval($this->stats_unit_prefix)), true);
				$h +=  (5 * $ystep);
			}

			// get the maximum length for value
			$maxlen = 0;
			foreach ($statdata as $value) {
				$len = strlen($value);
				if ($len > $maxlen) {
					$maxlen = $len;
				}
			}

			$swidth = (((13 + $maxlen) / 1.5) * $this->stats_fontsize);
			$vx = ($x + $swidth - $this->stats_fontsize);

			$svg .= '<rect x="'.$x.'" y="'.$y.'" width="'.$swidth.'" height="'.$h.'" stroke-width="0" fill="'.$this->stats_bgcolor.'" opacity="0.75"/>'."\n";

			$x += $this->stats_fontsize;
			$y += $this->stats_fontsize;

			foreach ($statdata as $label => $value) {
				$y += $ystep;
				$svg .= "\t\t".'<text x="'.$x.'" y="'.$y.'" text-anchor="start">'.$label.':</text>'."\n";
				$svg .= "\t\t".'<text x="'.$vx.'" y="'.$y.'" text-anchor="end">'.$value.'</text>'."\n";
			}

			$svg .= "\t".'</g>'."\n";
		}

		// close SVG graph
		$svg .= '</svg>'."\n";
		$this->svg = $svg;
	}

	/**
	 * Format a number for statistic box.
	 * @param $num (float) Number to format
	 * @param $dec (int) Number of decimals when using unit multiplier.
	 * @param $baseunit (string) Basic unit of measure.
	 * @param $rspace (int) NUmber of spaces to print on the right side (for vertical alignment).
	 * @param $umult (boolean) If true prints unit multiple prefix.
	 * @return (string) formatted string
 	 * @protected
	 */
	protected function formatStatNumber($num, $dec=0, $baseunit='', $rspace='', $umult=false) {
		if ($umult AND $this->stats_unit_prefix) {
			$unitdata = $this->getUnitValues($num);
		} else {
			$unitdata = array();
			$unitdata['unit_divider'] = 1;
			$unitdata['unit_prefix'] = '';
			if (!$umult) {
				$dec=0;
			}
		}
		return number_format(($num / $unitdata['unit_divider']), $dec, '.', ',').' '.$unitdata['unit_prefix'].$baseunit.str_repeat(' ', $rspace);
	}

	/**
	 * Return the SVG code as string.
	 * @return (string) SVG code.
 	 * @public
	 */
	public function getSVGstring() {
		return $this->svg;
	}

	/**
	 * Send the SVG object to the standard output.
 	 * @public
	 */
	public function getSVG() {
		// send headers
		header('Content-Description: SVG Data');
		header('Cache-Control: public, must-revalidate, max-age=0'); // HTTP/1.1
		header('Pragma: public');
		header('Expires: Sat, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
		header('Content-Type: image/svg+xml');
		header('Content-Disposition: inline; filename="'.md5($this->svg).'.svg";');
		// Turn on output buffering with the gzhandler
		ob_start('ob_gzhandler');
		// output SVG code
		echo $this->svg;
	}

	/**
	 * Convert the SVG object to PNG and sent it to the output
 	 * @public
	 */
	public function getPNG() {
		// send headers
		header('Content-Description: PNG Data');
		header('Cache-Control: public, must-revalidate, max-age=0'); // HTTP/1.1
		header('Pragma: public');
		header('Expires: Sat, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
		header('Content-Type: image/png');
		header('Content-Disposition: inline; filename="'.md5($this->svg).'.png";');
		// Turn on output buffering with the gzhandler
		ob_start('ob_gzhandler');
		$img = new Imagick();
		$img->readImageBlob($this->svg);
		$img->setImageFormat('png24');
		// output PNG code
		echo $img;
	}

} // END OF CLASS

//=============================================================================+
// END OF FILE
//=============================================================================+
