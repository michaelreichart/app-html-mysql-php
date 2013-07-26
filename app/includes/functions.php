<?php
/**
 * Funktionen, die überall verwendet werden können
 */

    function validateUserInput($value) {

        // führende/anhängende Leerzeichen löschen
        // -> Tabs, Leerzeichen, evt. new line
        $value = trim($value);

        // SQL Injection unschädlich machen
        // escaped Schrägstriche und Anführungszeichen
        // / -> \/
        // " -> \"
        // ' -> \'
        $value = mysql_real_escape_string($value);

        // HTML in Ausgabezeichen konvertieren
        // <b> -> &lt;b&gt;
        $value = htmlspecialchars($value);

        // Optionen: HTML Elemente entfernen
        $value = strip_tags($value, '<b><i>');

        return $value;
    }
?>