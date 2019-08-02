$(document).ready(function() {
	function require(file,callback){
	    var head=document.getElementsByTagName("head")[0];
	    var script=document.createElement('script');
	    script.src=file;
	    script.type='text/javascript';
	    script.onload=callback;
	    script.onreadystatechange = function() {
	        if (this.readyState == 'complete') {
	            callback();
	        }
	    }
	    head.appendChild(script);
	}

	require(base_url+'assets/plugins/tinymce/MathJax/MathJax.js?config=TeX-MML-AM_CHTML');
	if ($('textarea[class*="tinymce"]').length) {
		require(base_url+'assets/plugins/tinymce/plugins/asciimath/js/ASCIIMathMLwFallback.js');
		require(base_url+'assets/plugins/tinymce/plugins/tiny_mce_wiris/integration/WIRISplugins.js?viewer=image');
		var AMTcgiloc = "//www.imathas.com/cgi-bin/mimetex.cgi";
		try {
			$('textarea[class*="tinymce"]').each(function(i, v) {
				var is_menubar = '';
				if ($('#'+v.id).hasClass('tinymce-lg')) {
					is_menubar = true;
				} else {
					is_menubar = false;
				}
				tinymce.init({
			        selector: 'textarea#'+v.id,
			        menubar: is_menubar,
			        skin: "lightgray",
			        plugins: [
						"advlist autolink lists link image charmap print preview hr anchor pagebreak",
						"searchreplace wordcount visualblocks visualchars code fullscreen",
						"insertdatetime nonbreaking save table contextmenu directionality",
						"emoticons template paste textcolor colorpicker textpattern",
						"tiny_mce_wiris"
			        ],
			        auto_focus:true,
			        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image responsivefilemanager  tiny_mce_wiris_formulaEditor tiny_mce_wiris_formulaEditorChemistry tiny_mce_wiris_CAS",
			        external_plugins: {
				        asciimath: base_url+'assets/plugins/tinymce/plugins/asciimath/plugin.min.js',
						asciisvg: base_url+'assets/plugins/tinymce/plugins/asciisvg/plugin.min.js',
						code: base_url+'assets/plugins/tinymce/plugins/code/plugin.min.js'
				    },
			        automatic_uploads: true,
			        image_advtab: true,
			        images_upload_url: base_url+"welcome/tinymce_upload",
			        images_upload_credentials: true,
			        file_picker_types: 'image', 
			        paste_data_images:true,
			        paste_as_text: true,
			        relative_urls: false,
			        branding: false,
			        remove_script_host: false,
			        file_picker_callback: function(cb, value, meta) {
						var input = document.createElement('input');
						input.setAttribute('type', 'file');
						input.setAttribute('accept', 'image/*');
						input.onchange = function() {
							var file = this.files[0];
							var reader = new FileReader();
							reader.readAsDataURL(file);
							reader.onload = function () {
								var id = 'post-image-' + (new Date()).getTime();
								var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
								var blobInfo = blobCache.create(id, file, reader.result);
								blobCache.add(blobInfo);
								cb(blobInfo.blobUri(), { title: file.name });
			                };
						};
						input.click();
					},
					table_default_attributes: {'border': '1'},
				    table_default_styles: {'border-collapsed': 'collapse','width': '100%'},
				    table_default_attributes: {'class': 'table table-striped table-bordered table-hover'},
				    table_responsive_width: true,
				    AScgiloc: base_url+'assets/plugins/tinymce/php/svgimg.php',
					ASdloc: base_url+'assets/plugins/tinymce/plugins/asciisvg/js/d.svg',
					content_css: base_url+"assets/plugins/tinymce/css/content.css",
					wiriscleancachegui: true,
					width: "100%",
					image_title: true,
					document_base_url: base_url,
					setup : function(editor) {
						editor.on('KeyDown', function (e) {
							if ((e.keyCode == 8 || e.keyCode == 46) && tinymce.activeEditor.selection) { // delete & backspace keys
								var selectedNode = editor.selection.getNode();
								var isImg = (selectedNode.tagName === 'IMG');
								if (isImg) {
					    			if(confirm("Anda yakin ingin menghapus gambar ini?")) {
						    			var formData = new FormData();
							            formData.append('images', editor.dom.getAttrib(selectedNode, 'src'));
							            $.ajax({
							                type: 'POST',
							                url: base_url+'welcome/tinymce_delete',
							                data: formData,
							                dataType: 'json',
							                contentType: false,
							                processData: false,    
							                cache: false,
							                success: function(result, textStatusStr, jqXHR) {

							                }
							            });
							        } else {
							        	return false;
							        }
					    		}
						    }
						});
					}
			   	});
			});
		} catch(e) {}
	}
});