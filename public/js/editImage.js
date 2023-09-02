//Image upload
var input = document.getElementById('image-upload-input2');
var imageContainer = document.getElementById('uploaded-image-container2');
var maxWidth = 200; // Customize the maximum width of the displayed image
var maxHeight = 250; // Customize the maximum height of the displayed image

input.addEventListener('change', function(e) {
    var file = e.target.files[0];

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
            var previousImage = document.getElementById('previous-img');
            previousImage.style.display = 'none';
            imageContainer.innerHTML = '';
            imageContainer.appendChild(imageElement);
            imageContainer.appendChild(deleteIcon);
        };

        imageElement.src = imageUrl;
    };

    reader.readAsDataURL(file);
});