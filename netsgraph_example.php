<?php
//=============================================================================+
// File name   : netsgraph_example.php
// Begin       : 2012-04-20
// Last Update : 2012-04-26
// Version     : 1.0.002
//
// Website     : https://github.com/fubralimited/NetsGraph
//
// Description : Example file for netsgraph class.
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
 * Example file for netsgraph class.
 * @package com.fubra.netsgraph
 * @brief Example file for netsgraph class.
 * @author Nicola Asuni
 * @since 2012-04-20
 */

require_once('netsgraph.php');

// -----------------------------------------------------------------------------

// check input parameters

// array of raw data
//$csvdata = array('data/dataexamplehour.csv');
$csvdata = array('data/dataexampleday.csv');
//$csvdata = array('data/dataexamplemonth.csv');

// load CSV data files
$n = 0;
foreach ($csvdata as $csvfile) {
	// check if file exist
	if (file_exists($csvfile)) {
		// get CSV data into array
		$tmpdata = file($csvfile);
		if ($tmpdata[0][0] = '"') {
			// remove CSV header
			array_shift($tmpdata);
		}
		foreach ($tmpdata as $row) {
			// separate data
			$col = explode(',', $row);
			$data[$n][trim($col[0])] = $col[1];
		}
		++$n;
	}
}

// set parameters
$p = array();
$p['graph_type'] = 'percentile'; // 'time' or 'percentile'
//$p['label_x'] = 'Percentile [%]';
//$p['label_y'] = 'Network Data Rate [Mbps]';
$p['graph_width'] = 800;
//$p['graph_height'] = 450;
$p['background_color'] = 'none';
$p['border_width'] = 0;
$p['border_color'] = 'none';
$p['print_stats'] = true;
$p['stats_unit_prefix'] = true;
$p['stats_bgcolor'] = '#ffffee';
$p['stats_fontfamily'] = 'monospace';
$p['stats_fontweight'] = 'normal';
$p['stats_fontsize'] = 10;
$p['stats_fontcolor'] = '#404040';
$p['gridy_fontfamily'] = 'Arial,Verdana';
$p['gridy_fontweight'] = 'normal';
$p['gridy_fontsize'] = 12;
$p['gridy_fontcolor'] = '#808080';
$p['gridx_fontfamily'] = 'Arial,Verdana';
$p['gridx_fontweight'] = 'normal';
$p['gridx_fontsize'] = 12;
$p['gridx_fontcolor'] = '#808080';
$p['grid_vert_line_width'] = 1;
$p['grid_vert_line_color'] = '#cccccc';
$p['grid_horiz_line_width'] = 1;
$p['grid_horiz_line_color']= '#cccccc';
$p['label_x_fontfamily'] = 'Arial,Verdana';
$p['label_x_fontweight'] = 'normal';
$p['label_x_fontsize'] = 14;
$p['label_x_fontcolor'] = '#000000';
$p['label_y_fontfamily'] = 'Arial,Verdana';
$p['label_y_fontweight'] = 'normal';
$p['label_y_fontsize'] = 14;
$p['label_y_fontcolor'] = '#000000';
$p['data_line_color'] = '#0000ff';
$p['data_fill_color'] = '#00ff00';
$p['data_fill_opacity'] = 0.7;
$p['data_line_width'] = 1;
$p['percentile_x'] = 95;
$p['percentile_horiz_line_width'] = 1;
$p['percentile_horiz_line_color'] = '#ff0000';
$p['percentile_horiz_line_opacity'] = 1;
$p['percentile_vert_line_width'] = 1;
$p['percentile_vert_line_color'] = '#ff0000';
$p['percentile_vert_line_opacity'] = 1;
$p['percentile_gridy_fontfamily'] = 'Arial,Verdana';
$p['percentile_gridy_fontweight'] = 'bold';
$p['percentile_gridy_fontsize'] = 14;
$p['percentile_gridy_fontcolor'] = '#b00000';
$p['percentile_gridx_fontfamily'] = 'Arial,Verdana';
$p['percentile_gridx_fontweight'] = 'bold';
$p['percentile_gridx_fontsize'] = 12;
$p['percentile_gridx_fontcolor'] = '#ff0000';

// generate SVG
$svg = new NetsGraph($data, $p);

// output SVG file (including headers)
$svg->getSVG();

//=============================================================================+
// END OF FILE
//=============================================================================+
