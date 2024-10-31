var uploadedPhotos = [];
var imagesView = [];
var fileInput = document.querySelector('.custom-file-input');
var fileLabel = document.querySelector('.custom-file-label');
var photoList = document.querySelector('.custom-file-input-list');
var hiddenInput = document.querySelector('.hidden-input');

fileInput.addEventListener('change', function () {
    var files = Array.from(fileInput.files);
    files.forEach(file => {
        uploadedPhotos.push(file);
        imagesView.push(URL.createObjectURL(file));
    });
    updatePhotoList();
});

function updatePhotoList() {
    photoList.innerHTML = '';
    imagesView.forEach((src, index) => {
        var listItem = document.createElement('li');
        var image = document.createElement('img');
        image.src = src;
        // image.style.width = '50px'; // Розмір для прев'ю
        listItem.appendChild(image);

        listItem.addEventListener('click', () => removePhoto(index));
        photoList.appendChild(listItem);
    });
    updateFileLabel();
    updateHiddenInputValue();
}

function removePhoto(index) {
    uploadedPhotos.splice(index, 1);
    imagesView.splice(index, 1);
    updatePhotoList();
}

function updateFileLabel() {
    var fileNames = uploadedPhotos.map(file => file.name);
    fileLabel.textContent = fileNames.length ? fileNames.join(', ') : "Vyberte obrázky";
}

function updateHiddenInputValue() {
    hiddenInput.value = imagesView.join("|"); // Зберігання шляхів
}