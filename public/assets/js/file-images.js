
var uploadedPhotos = []; // Масив для зберігання завантажених фотографій
var imagesView = []; // Масив для зберігання завантажених фотографій

var fileInput = document.querySelector('.custom-file-input');
var fileLabel = document.querySelector('.custom-file-label');
var photoList = document.querySelector('.custom-file-input-list');
var userPhoto = document.querySelector('input[type="file"]');
var form = document.querySelector('form');

fileInput.addEventListener('change', function () {
    var files = fileInput.files;

    if (files.length > 0) {
        for (var i = 0; i < files.length; i++) {
            uploadedPhotos.push(files[i]);
            imagesView.push(URL.createObjectURL(files[i]));
        }

        updatePhotoList();
        updateHiddenInputValue();
    }
});

// Підрахунок кількості виведених зображень через JavaScript
var numPhotosFromDatabase = document.querySelectorAll('.custom-file-input-list li').length;

// Отримання шляхів зображень з бази даних через JavaScript
var photosFromDatabase = [];
var databasePhotos = document.querySelectorAll('.custom-file-input-list img');
for (var i = 0; i < numPhotosFromDatabase; i++) {
    photosFromDatabase.push(databasePhotos[i].getAttribute('src'));
}

// Додавання виведених зображень з бази даних до завантажених фотографій
for (var i = 0; i < numPhotosFromDatabase; i++) {
    imagesView.push(photosFromDatabase[i]);
    uploadedPhotos.push(photosFromDatabase[i]);
}

// Оновлення списку фотографій
updatePhotoList();
updateHiddenInputValue();

function updatePhotoList() {
    photoList.innerHTML = '';

    for (var i = 0; i < imagesView.length; i++) {
        var listItem = document.createElement('li');
        var image = document.createElement('img');
        image.style.width = '150px';
        image.style.height = "200px";
        image.src = imagesView[i];
        listItem.appendChild(image);

        // Додавання обробника події "click" для видалення фотографії
        listItem.addEventListener('click', createRemoveHandler(i));

        photoList.appendChild(listItem);
    }


    userPhoto.value = '';

    var files = userPhoto.files;

    var originalArray = Array.from(files);

    var array = uploadedPhotos.filter(function (element) {
        return element instanceof File;
    });

    // Додавання іншого масиву
    var combinedArray = originalArray.concat(array);

    // Очищення елементу input
    userPhoto.value = '';

    // Створення об'єкта DataTransfer
    var dataTransfer = new DataTransfer();

    console.log(combinedArray);
    // Додавання файлів до об'єкта DataTransfer
    combinedArray.forEach(function (file) {
        dataTransfer.items.add(file);
    });

    // Встановлення об'єкта DataTransfer як нового значення елементу input
    userPhoto.files = dataTransfer.files;
}

function createRemoveHandler(index) {
    return function () {
        // Видалення фотографії з масиву за індексом
        uploadedPhotos.splice(index, 1);
        //
        imagesView.splice(index, 1);
        //запис у приховане поле
        photosFromDatabase.splice(index, 1);
        userPhoto.value = '';

        var fileNames = uploadedPhotos.map(function (file) {
            return file.name;
        });


        if (uploadedPhotos.length === 0) {
            fileLabel.textContent = "Оберіть файли";
        } else {
            fileLabel.textContent = fileNames.join(', ');
        }

        // Оновлення списку фотографій на сторінці
        updatePhotoList();
        updateHiddenInputValue();
    };
}

function updateHiddenInputValue() {
    var hiddenInput = document.querySelector('.hidden-input');

    // Оновлення значення прихованого поля форми зі списком шляхів зображень
    hiddenInput.value = photosFromDatabase.join("|");
}

form.addEventListener('submit', function () {
    // Оновлення значення прихованого поля форми перед відправкою
    updateHiddenInputValue();
});
