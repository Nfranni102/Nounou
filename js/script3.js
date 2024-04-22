function loadImage(event) {
    var image = document.getElementById('imagePreview');
    image.src = URL.createObjectURL(event.target.files[0]);
    image.onload = function() {
      URL.revokeObjectURL(image.src) // Free up memory
    }
  }