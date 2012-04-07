<?php

error_reporting(E_ALL);

//echo '<pre>';

	print "=== ConnectLocal ===\n";
	print "Connect using QMConnectLocal():\n";
	QMConnectLocal("TEST");
	print "Connected: " . QMConnected() . ":\n";
	print "\n";

	$output = QMExecute("WHO", &$errno);
	print "Execute(WHO):" . $output . ":  errno:" . $errno . ":\n";
	print "\n";

	print "=== DisconnectAll ===\n";
	print "Disconnect\n"; QMDisconnect();
	print "Connected: " . QMConnected() . ":\n";
	print "\n";


//echo '</pre>';

?>
