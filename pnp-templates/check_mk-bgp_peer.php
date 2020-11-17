<?php


################################################################################
# $Id: check_mk-bgp_peer.php 276 2012-01-18 10:59:28Z twollner $
# Descr: BGP Peer check_mk check - PNP Template
# $Author: twollner $
# $Date: 2012-01-18 11:59:28 +0100 (Mi, 18 Jan 2012) $
# $Rev: 276 $
################################################################################


# Datensatze:
# 1 - a - peerinupdates=6
# 2 - b - peeroutupdates=0



$ds_name[1] = "BGP Update Messages";
$opt[1] = "--vertical-label 'Messages' --title \"$hostname / $servicedesc\" ";


$def[1] = rrd::def("a", $RRDFILE[1], $DS[1], "AVERAGE");
$def[1] .= rrd::area("a", "#00CF00FF", "BGP In Updates  ");
$def[1] .= rrd::gprint("a", array("LAST", "MAX", "AVERAGE"), "%6.0lf");

$def[1] .= rrd::def("b", $RRDFILE[1], $DS[2], "AVERAGE");
$def[1] .= rrd::cdef("b_neg", "b,-1,*");
$def[1] .= rrd::area("b_neg", "#002A97FF", "BGP Out Updates ");
$def[1] .= rrd::gprint("b", array("LAST", "MAX", "AVERAGE"), "%6.0lf");

?>

