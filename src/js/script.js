/**
 * Ajax Loader
 * aka. Hijax
 *
 * @author Michael Reichart
 * ...
 */

(function ($) {
'use strict';
// - - - - - - -
	// Eventhandler
	var ajax = {
		url     : null,
		action  : null,
		data    : null,
		target  : null,

		// Für Formulare
		submit  : 	function (event) {
						console.log('submitted!');

						event.preventDefault();

						ajax.action = $(event.target)
										.closest('form')
										.attr('action');
						ajax.data   = $(event.target)
										.closest('form')
										.serialize();	// Inhalte der Form Url-encodiert speichern
														// ?name1=value1&name2=value2
						ajax.target = $(event.data.target);

						console.log(ajax.action);

						// Asynchroner Request!
						$.ajax({
							// Ajax Attribute
							method   : 'post',
							url      : ajax.action, 	// Request für Datei
							data     : ajax.data,		// Übergabe der Daten
							dataType : 'html',			// Responseformat

							// Ajax Handler
							success  : ajax.success,	// Verarbeitung der Response
							error    : ajax.error,		// Fehlerverarbeitung
						});

					},
		
		// Für Anchor Elemente
		load    : 	function (event) {
						console.log('Anchor clicked!');

						// Browserevent unterdrücken
						event.preventDefault();
						// Weiteres Eventbubbling verhindern
						event.stopPropagation();

						// Eigenes Verhalten definieren
						// href Attribut aus dem angeklcikten Anchor abfragen
						ajax.url = 'app/' + $(event.target).attr('href');
						ajax.target = $(event.data.target);

						// Asynchroner Request!
						$.ajax({
							// Ajax Attribute
							url      : ajax.url, 	// Request für Datei
							dataType : 'html',	// Responseformat

							// Ajax Handler
							success  : ajax.success,	// Verarbeitung der Response
							error    : ajax.error,		// Fehlerverarbeitung
						});

					},
		success : 	function (data) {
						console.log('AJAX Success!');

						$(ajax.target).html(data);			
					},
		error   : 	function (jqxhr, status, errorThrown) {
						console.log('AJAX Error!');

						$('#content').html('Hier stimmt was nicht, der Content [' + ajax.url + '] wurde nicht gefunden!');			
					}
	};

	// Eventlistener
	$('a[data-ajax!=false]')
		.filter('a[href]')
		.on('click', {target : '#content'}, ajax.load);

	$('[type=submit]')
		.on('click', {target : '#content'}, ajax.submit);
// - - - - - - -
})(jQuery);














