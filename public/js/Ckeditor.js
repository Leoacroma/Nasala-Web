$(document).ready(function() {
    $('#summernoteKh').summernote({
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['fontname']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['insert', ['link', 'picture', 'video']],
        ],
        tabsize: 2,
        height: 500,
        fontNames: [
            'Hanuman',
            'Dangrek',
            'Siemreap',
            'Moul',
            'Battambang',
            'Preahvihear',
            'Koulen',
            'Kantumruy Pro',
            'Roboto',
            'Open Sans',
            'Ubuntu',
            'Merriweather',
            'PT Sans'
        ],
        fontNamesIgnoreCheck: [
            'Hanuman',
            'Dangrek',
            'Siemreap',
            'Moul',
            'Battambang',
            'Preahvihear',
            'Koulen',
            'Kantumruy Pro',
            'Roboto',
            'Open Sans',
            'Ubuntu',
            'Merriweather',
            'PT Sans'
        ],
        addDefaultFonts: false,
        fontSizes: ['8', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '24', '28', '32', '36'],
        callbacks: {
            onImageDialog: function(dialog) {
                // Customize the image dialog
                var dialogBody = dialog.find('.note-modal-body');

                // Set the desired image width and height
                var imageWidth = 800;

                // Set the image size in the dialog
                var imageSizeField = dialogBody.find('.note-image-dialog .note-image-input-size');
                imageSizeField.val(imageWidth);
            }
        }
    });
});
$(document).ready(function() {
    $('#summernoteEng').summernote({
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['fontname']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['insert', ['link', 'picture', 'video']],
        ],
        tabsize: 2,
        height: 500,
        fontNames: [
            'Hanuman',
            'Dangrek',
            'Siemreap',
            'Moul',
            'Battambang',
            'Preahvihear',
            'Koulen',
            'Kantumruy Pro',
            'Roboto',
            'Open Sans',
            'Ubuntu',
            'Merriweather',
            'PT Sans'
        ],
        fontNamesIgnoreCheck: [
            'Hanuman',
            'Dangrek',
            'Siemreap',
            'Moul',
            'Battambang',
            'Preahvihear',
            'Koulen',
            'Kantumruy Pro',
            'Roboto',
            'Open Sans',
            'Ubuntu',
            'Merriweather',
            'PT Sans'
        ],
        addDefaultFonts: false,
        fontSizes: ['8', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '24', '28', '32', '36'],
        callbacks: {
            onImageDialog: function(dialog) {
                // Customize the image dialog
                var dialogBody = dialog.find('.note-modal-body');

                // Set the desired image width and height
                var imageWidth = 800;

                // Set the image size in the dialog
                var imageSizeField = dialogBody.find('.note-image-dialog .note-image-input-size');
                imageSizeField.val(imageWidth);
            }
        }
    });
});