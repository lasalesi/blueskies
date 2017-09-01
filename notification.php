<?php
function notify ($recipient, $title, $body)
{
	// Falls eine Zeile der Nachricht mehr als 70 Zeichen enthälten könnte,
	// sollte wordwrap() benutzt werden
	$body = wordwrap($body, 70);

	// für HTML-E-Mails muss der 'Content-type'-Header gesetzt werden
	$header  = 'MIME-Version: 1.0' . "\r\n";
	$header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

	// Send
	mail($recipient, $title, $body, $header);
}

?>
