(function() {
	tinymce.create('tinymce.plugins.typekit', {
		init: function(ed, url) {
			ed.onPreInit.add(function(ed) {

				// Get the DOM document object for the IFRAME
				var doc = ed.getDoc();
				
				// Create the script that loads the typekit resource
				var typekit_source = doc.createElement("script");
				typekit_source.src = "https://use.typekit.net/tzy2gqj.js";
				
				// Add the typekit id script to the header
				doc.getElementsByTagName('head')[0].appendChild(typekit_source);
				
				// Create a script element and insert the TypeKit code into it
				var typekit_load_js = "try{Typekit.load({ async: true });}catch(e){}";
				var typekit_load = doc.createElement("script");
				typekit_load.type = "text/javascript";
				typekit_load.appendChild(doc.createTextNode(typekit_load_js));
	
				// Add the async typekit loading script to the header
				doc.getElementsByTagName('head')[0].appendChild(typekit_load);
			});

		},
		getInfo: function() {
			return {
				longname: 'SHRM TypeKit For TinyMCE',
				author: 'Look Agency',
				authorurl: 'https://www.lookagency.com/',
				infourl: 'https://www.shrmsk.com',
				version: "1.0"
			};
		}
	});
	tinymce.PluginManager.add('typekit', tinymce.plugins.typekit);
})();