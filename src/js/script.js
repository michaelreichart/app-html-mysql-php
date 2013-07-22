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
		load    : function (event) {
			console.log('Anchor clicked!');

			// Browserevent unterdrücken
			event.preventDefault();
			// Weiteres Eventbubbling verhindern
			event.stopPropagation();

			// Eigenes Verhalten definieren
			// href Attribut aus dem angeklcikten Anchor abfragen
			var url = $(event.target).attr('href');

			$.ajax({
				// Ajax Attribute
				url      : url,
				dataType : 'html',

				// Ajax Handler
				success  : ajax.success,
				error    : ajax.error,
			});

		},
		success : function (data) {
			console.log('AJAX Success!');

			$('#content').html(data);			
		},
		error   : function (jqxhr, status, errorThrown) {
			console.log('AJAX Error!');

			$('#content').html('Hier stimmt was nicht, der Content wurde nicht gefunden!');			
		}
	};

	// Eventlistener
	$('a[href]').on('click', ajax.load);
// - - - - - - -
})(jQuery);