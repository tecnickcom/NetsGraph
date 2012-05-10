NetsGraph - README
====================

+ Name: NetsGraph

+ Version: 1.0.004

+ Release date: 2012-05-10

+ Author: Nicola Asuni

+ Copyright (2012-2012):

> > Fubra Limited 
> > Manor Coach House 
> > Church Hill 
> > Aldershot 
> > Hampshire 
> > GU12 4RQ 
> > <http://www.fubra.com> 
> > <support@fubra.com> 


SOFTWARE LICENSE:
-----------------

This program is free software: you can redistribute it and/or modify it under the terms of the GNU Affero General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more details.

You should have received a copy of the GNU Affero General Public License along with this program.  If not, see <http://www.gnu.org/licenses/>.

See LICENSE.TXT file for more information.


DESCRIPTION:
------------

NetsGraph is a PHP class to generate graphs (SVG and PNG format) and statistics from network data.

The class constructor accepts an array of network data and an array of options.
The data format can be: 
+ a) an array of network data arrays to be merged where the key is a time string for key and the value is a 32 bit rolling counter in bytes-per-second, or 
+ b) a simple array where the key is a UNIX EPOCH timestamp and the value is a differential value in the sampling interval expressed in bits-per-second.

The class can export data as SVG vector graph, PNG image or simple array of statistics.
Numerous options are available to change and tune the graphic output.

Two main graphs are available:
+ time: represent the Network Data Rate in a time scale.
+ percentile: represent the data ordered and calculate the specified percentile (by default 95th percentile).

The calculated statistics are:

+ samples: total number of data samples.
+ tot data: total amount of data transfer (the integral of the curve).
+ sum: sum of all samples.
+ min: minimum sample value.
+ max: maximum sample value.
+ range: difference between the maximum and minimum value on data samples.
+ mean: the arithmetic mean of the data samples values.
+ median: the numerical value separating the higher half of samples.
+ mode: the value that occurs most frequently in data samples.
+ stddev: standard deviation - shows how much variation or "dispersion" exists from the mean value.
+ skewness: measure the symmetry or asymmetry of the curve.
+ kurtosis: measure whether the data are peaked or flat relative to a normal distribution.
+ 95th prc: the value of data sample below which a certain percent (95%) of observations fall.
+ prc/max: ratio between 95th percentile and maximum value.
+ mean/prc: ratio between mean and 95th percentile.
+ med/prc: ratio between median and 95th percentile.
+ mode/prc: ratio between mode and 95th percentile.

Check the example and source code for further information.
