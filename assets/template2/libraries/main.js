// active link
// cara ke-1 :
jQuery(function ($) {
	var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
	$("ul a").each(function () {
		if (this.href === path) {
			$(this).addClass("active");
		}
	});
});

// cara ke-2 :
// $(document).ready(function () {
// 	$(function () {
// 		var current = location.pathname;
// 		console.log(current);
// 		$("#nav li a").each(function () {
// 			var $this = $(this);
// 			// if the current path is like this link, make it active
// 			if ($this.attr("href").indexOf(current) !== -1) {
// 				$this.addClass("active");
// 			}
// 		});
// 	});
// });
