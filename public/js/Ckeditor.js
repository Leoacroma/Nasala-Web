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
        // callbacks: {
        //     onImageUpload: function(files) {
        //         for (var i = 0; i < files.length; i++) {
        //             encodeImageFileAsURL(files[i], this);
        //         }
        //     }
        // }
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
        // callbacks: {
        //     onImageUpload: function(files) {
        //         for (var i = 0; i < files.length; i++) {
        //             encodeImageFileAsURL(files[i], this);
        //         }
        //     }
        // }
    });
});

// function encodeImageFileAsURL(file, summernoteInstance) {
//     var reader = new FileReader();
//     reader.onloadend = function() {
//         var base64Data = reader.result;
//         $(summernoteInstance).summernote('insertImage', base64Data);
//     };
//     reader.readAsDataURL(file);
// }