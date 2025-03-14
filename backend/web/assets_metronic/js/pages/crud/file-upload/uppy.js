"use strict";

// Class definition
var KTUppy = function () {
	const Tus = Uppy.Tus;
     	const ProgressBar = Uppy.ProgressBar;
	const StatusBar = Uppy.StatusBar;
	const FileInput = Uppy.FileInput;
	const Informer = Uppy.Informer;
	var initUppy3 = function(){
		var id = '#kt_uppy_3';

		var uppyDrag = Uppy.Core({
			autoProceed: true,
			restrictions: {
				maxFileSize: 10000000, // 1mb
				maxNumberOfFiles: 50,
				minNumberOfFiles: 1,
				allowedFileTypes: ['image/*']
			}
		});

		uppyDrag.use(Uppy.DragDrop, { target: id + ' .uppy-drag' });
		uppyDrag.use(ProgressBar, {
			target: id + ' .uppy-progress',
			hideUploadButton: false,
			hideAfterFinish: false
		});
		uppyDrag.use(Informer, { target: id + ' .uppy-informer'  });
	

		uppyDrag.on('complete', function(file) {
			var imagePreview = "";
			$.each(file.successful, function(index, value){
				var imageType = /image/;
				var thumbnail = "";
				if (imageType.test(value.type)){
					thumbnail = '<div class="uppy-thumbnail"><img src="'+value.uploadURL+'"/></div>';
				}
				var sizeLabel = "bytes";
				var filesize = value.size;
				if (filesize > 1024){
					filesize = filesize / 1024;
					sizeLabel = "kb";
					if(filesize > 1024){
						filesize = filesize / 1024;
						sizeLabel = "MB";
					}
				}
				imagePreview += '<div class="uppy-thumbnail-container" data-id="'+value.id+'">'+thumbnail+' <span class="uppy-thumbnail-label">'+value.name+' ('+ Math.round(filesize, 2) +' '+sizeLabel+')</span><span data-id="'+value.id+'" class="uppy-remove-thumbnail"><i class="flaticon2-cancel-music"></i></span></div>';
			});

			$(id + ' .uppy-thumbnails').append(imagePreview);
		});

		$(document).on('click', id + ' .uppy-thumbnails .uppy-remove-thumbnail', function(){
			var imageId = $(this).attr('data-id');
			uppyDrag.removeFile(imageId);
			$(id + ' .uppy-thumbnail-container[data-id="'+imageId+'"').remove();
		});
	}
       
    var initUppy4 = function(){
		var id = '#kt_uppy_4';

		var uppyDrag = Uppy.Core({
			autoProceed: true,
			restrictions: {
				maxFileSize: 10000000, // 1mb
				maxNumberOfFiles: 50,
				minNumberOfFiles: 1,
				
			}
		});

		uppyDrag.use(Uppy.DragDrop, { target: id + ' .uppy-drag' });
		
		uppyDrag.use(Informer, { target: id + ' .uppy-informer'  });
               
		uppyDrag.on('complete', function(file) {
			var imagePreview = "";
			$.each(file.successful, function(index, value){
				var imageType = /image/;
				var thumbnail = "";
				if (imageType.test(value.type)){
					thumbnail = '<div class="uppy-thumbnail"><img src="'+value.uploadURL+'"/></div>';
				}
				var sizeLabel = "bytes";
				var filesize = value.size;
				if (filesize > 1024){
					filesize = filesize / 1024;
					sizeLabel = "kb";
					if(filesize > 1024){
						filesize = filesize / 1024;
						sizeLabel = "MB";
					}
				}
				imagePreview += '<div class="uppy-thumbnail-container" data-id="'+value.id+'">'+thumbnail+' <span class="uppy-thumbnail-label">'+value.name+' ('+ Math.round(filesize, 2) +' '+sizeLabel+')</span><span data-id="'+value.id+'" class="uppy-remove-thumbnail"><i class="flaticon2-cancel-music"></i></span></div>';
			});

			$(id + ' .uppy-thumbnails').append(imagePreview);
		});
		$(document).on('click', id + ' .uppy-thumbnails .uppy-remove-thumbnail', function(){
			var imageId = $(this).attr('data-id');
			uppyDrag.removeFile(imageId);
			$(id + ' .uppy-thumbnail-container[data-id="'+imageId+'"').remove();
		});
	}

	return {
		// public functions
		init: function() {		
			initUppy3();
                       
                	},
                init2: function() {		
			
                        initUppy4();
                	},
        
        
	};
}();


