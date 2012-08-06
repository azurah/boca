#!/usr/bin/php
<?php
////////////////////////////////////////////////////////////////////////////////
//BOCA Online Contest Administrator
//    Copyright (C) 2003-2012 by BOCA Development Team (bocasystem@gmail.com)
//
//    This program is free software: you can redistribute it and/or modify
//    it under the terms of the GNU General Public License as published by
//    the Free Software Foundation, either version 3 of the License, or
//    (at your option) any later version.
//
//    This program is distributed in the hope that it will be useful,
//    but WITHOUT ANY WARRANTY; without even the implied warranty of
//    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//    GNU General Public License for more details.
//    You should have received a copy of the GNU General Public License
//    along with this program.  If not, see <http://www.gnu.org/licenses/>.
////////////////////////////////////////////////////////////////////////////////
//Last updated 21/jul/2012 by cassio@ime.usp.br
$ds = DIRECTORY_SEPARATOR;
if($ds=="") $ds = "/";
if(is_readable(getcwd() . $ds . '..' .$ds . 'db.php')) {
	require_once(getcwd() . $ds . '..' .$ds . 'db.php');
	require_once(getcwd() . $ds . '..' .$ds . 'version.php');
} else {
  if(is_readable(getcwd() . $ds . 'db.php')) {
	require_once(getcwd() . $ds . 'db.php');
	require_once(getcwd() . $ds . 'version.php');
  } else {
	  echo "unable to find db.php";
	  exit;
  }
}
if (getIP()!="UNKNOWN" || php_sapi_name()!=="cli") exit;
ini_set('memory_limit','600M');
ini_set('output_buffering','off');
ini_set('implicit_flush','on');
@ob_end_flush();

if(system('test "`id -u`" -eq "0"',$retval)===false || $retval!=0) {
	echo "Must be run as root\n";
	exit;
}

echo "\nType the contest number to re-insert the languages: ";
$resp = strtoupper(trim(fgets(STDIN)));
if(is_numeric($resp))
	insertlanguages($resp, null);
exit;
