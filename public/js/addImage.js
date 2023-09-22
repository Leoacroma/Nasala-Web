//Image upload
var input = document.getElementById('image-upload-input');
var imageContainer = document.getElementById('uploaded-image-container');
var maxWidth = 200; // Customize the maximum width of the displayed image
var maxHeight = 250; // Customize the maximum height of the displayed image

input.addEventListener('change', function(e) {
    var file = e.target.files[0];
    // var alert = document.querySelector('.alert');
    // var fileInput = this;

    // if (!file.type.startsWith('image/')) {
    //     fileInput.value = ''; // Clear the file input field
    //     alert.style.display = 'block';
    //     setTimeout(function() {
    //         alert.style.display = 'none';
    //     }, 2000);
    // }
    var reader = new FileReader();
    reader.onload = function(event) {
        var imageUrl = event.target.result;
        var imageElement = document.createElement('img');
        imageElement.onload = function() {
            var width = imageElement.width;
            var height = imageElement.height;

            if (width > maxWidth || height > maxHeight) {
                var aspectRatio = width / height;

                if (width > height) {
                    width = maxWidth;
                    height = width / aspectRatio;
                } else {
                    height = maxHeight;
                    width = height * aspectRatio;
                }
            }

            imageElement.width = width;
            imageElement.height = height;
            var deleteIcon = document.createElement('span');
            deleteIcon.className = 'delete-icon fas fa-times';
            deleteIcon.addEventListener('click', function() {
                imageContainer.innerHTML = '';
                input.value = '';
            });
            imageContainer.innerHTML = '';
            imageContainer.appendChild(imageElement);
            imageContainer.appendChild(deleteIcon);
        };

        imageElement.src = imageUrl;
    };

    reader.readAsDataURL(file);
});