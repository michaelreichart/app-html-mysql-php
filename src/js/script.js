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
		submit  : 	function (event) {
						console.log('submitted!');

						event.preventDefault();

						var action = $(event.target)
										.closest('form')
										.attr('action'),
							data   = $(event.target)
										.closest('form')
										.serialize()	// Inhalte der Form Url-encodiert speichern
														// ?name1=value1&name2=value2
						;
						console.log(data);

						// Asynchroner Request!
						$.ajax({
							// Ajax Attribute
							method   : 'post',
							url      : action, 	// Request für Datei
							data     : data,	// Übergabe der Daten
							dataType : 'html',	// Responseformat

							// Ajax Handler
							success  : ajax.success,	// Verarbeitung der Response
							error    : ajax.error,		// Fehlerverarbeitung
						});

					},

		load    : 	function (event) {
						console.log('Anchor clicked!');

						// Browserevent unterdrücken
						event.preventDefault();
						// Weiteres Eventbubbling verhindern
						event.stopPropagation();

						// Eigenes Verhalten definieren
						// href Attribut aus dem angeklcikten Anchor abfragen
						var url = $(event.target).attr('href');

						// Asynchroner Request!
						$.ajax({
							// Ajax Attribute
							url      : url, 	// Request für Datei
							dataType : 'html',	// Responseformat

							// Ajax Handler
							success  : ajax.success,	// Verarbeitung der Response
							error    : ajax.error,		// Fehlerverarbeitung
						});

					},
		success : 	function (data) {
						console.log('AJAX Success!');

						$('#content').html(data);			
					},
		error   : 	function (jqxhr, status, errorThrown) {
						console.log('AJAX Error!');

						$('#content').html('Hier stimmt was nicht, der Content wurde nicht gefunden!');			
					}
	};

	// Eventlistener
	$('a[data-ajax!=false]')
		.filter('a[href]')
		.on('click', ajax.load);

	$('[type=submit]')
		.on('click', ajax.submit);
// - - - - - - -
})(jQuery);














