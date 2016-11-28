/**
 * @name  ASB Example Modules
 * @copyright  2011-2014 WildcardSearch
 *
 * this is an example JavaScript file illustrating the preferred method of including
 * when a module is used
 *
 * when using this method, any number of modules which use JS will still only
 * use one global variable
 *
 * this method is optional but strongly recommended
 */
var ASB = (function(a) {
	function myMethod() {
		alert('it werked');
	}

	a.modules = $.extend({
		javascript_example: {
			myMethod: myMethod,
		},
	}, a.modules || {});

	return a;
})(ASB || {});
