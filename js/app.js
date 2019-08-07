/**!
 * App JS
 */

(function ($) {

	'use strict';

	$(document).ready(function() {

		// Comments

		$('.commentlist li').addClass('card');
		$('.comment-reply-link').addClass('btn btn-primary');

		// Forms
		$('select, input[type=text], input[type=email], input[type=password], textarea').addClass('form-control');
		$('input[type=submit]').addClass('btn btn-primary');

		// Pagination fix for ellipsis
		$('.pagination .dots').addClass('page-link').parent().addClass('disabled');

		// Toggle Sidebar
		$("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
        
    });

	});

}(jQuery));
