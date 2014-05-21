(function() {
	var includes = [
		{
			url_patterns: [
				/^(http|https):\/\/oasis(\.dal\.|\.lon5\.|\.)omniture\.com\/drteeth\/stats\/user_info\/vista\/index\.html/,
			],
			scripts: [
				'jquery',
				'vista_manager_inactive_rule_highlighter',
				'vista_manager_row_highlighter',
				'vista_rule_mass_delete',
				'vista_rule_order',
				'vista_duplicator_links'
			]
		},
		{
			url_patterns: [
				/^(http|https):\/\/oasis(\.dal\.|\.lon5\.|\.)omniture\.com\/drteeth\/stats\/user_info\/vista\/rule_duplicator\.html/,
			],
			scripts: [
				'jquery',
				'vista_duplicator_links'
			]
		},
		{
			url_patterns: [
				/^(http|https):\/\/oasis(\.dal\.|\.lon5\.|\.)omniture\.com\/drteeth\/stats\/user_info\/vista\/edit_rule\.html.*/,
			],
			scripts: [
				'jquery',
				'ace/ace',
				'ace/mode-c_cpp',
				'ace/theme-twilight',
				'ace_ide'
			]
		},
		{
			url_patterns: [
				/^(http|https):\/\/oasis(\.dal\.|\.lon5\.|\.)omniture\.com\/drteeth\/stats\/user_info\/data_feed\/view_data_feed\.html.*/,
			],
			scripts: [
				'jquery',
				'data_feed_resubmit'
			]
		},
		{
			url_patterns: [
				/^(http|https):\/\/oasis(\.dal\.|\.lon5\.|\.)omniture\.com\/drteeth\/stats\/user_info\/vista\/test_rule\.html.*/,
			],
			scripts: [
				'jquery',
				'vista_testing_memory.user'
			]
		},
		{
			url_patterns: [
				/^(http|https):\/\/porsche\.corp\.adobe\.com\/exsellant\/apps\/clm.*/,
			],
			scripts: [
				'jquery',
				'chrome_acm_fix'
			]
		}
	];
	
	var scriptsToLoad = [];
	
	var addUnique = function(array, item) {
		for (var i = 0; i < array.length; i++) {
			if (item == array[i]) return;
		}
		array.push(item);
	};
	
	includes.forEach(function(include) {
		for(var i = 0; i < include.url_patterns.length; i++) {
			if (document.URL.match(include.url_patterns[i])) {
				include.scripts.forEach(function(script) {
					addUnique(scriptsToLoad, script);
				});
				break; // break for loop
			}
		}
	});
	
	function loadScripts(scripts) {
		if(scripts.length == 0) return;
		var s = scripts.splice(0,1);
		console.log('adding script: ' + s);
		var head = document.getElementsByTagName('head')[0];
		var script = document.createElement('script');
		var src = 'https://ark.omniture.com/rascal/javascripts/lib/' + s + '.js';
		script.setAttribute('src', src);
		script.setAttribute('type', 'text/javascript');
		script.onload = function() { loadScripts(scripts);};
		head.appendChild(script);
	}
	loadScripts(scriptsToLoad);
})();