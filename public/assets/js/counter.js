document.addEventListener('DOMContentLoaded', function() {
    // Отримати всі елементи лічильників на сторінці
    const counters = document.querySelectorAll('.cart-quantity');

    counters.forEach(counter => {
        const minusButton = counter.querySelector('.minus-btn');
        const plusButton = counter.querySelector('.plus-btn');
        const quantityInput = counter.querySelector('.quantity');

    
        const minValue = 1;
        const maxValue = 50;

        // Функція перевірки та виправлення некоректних значень
        const validateQuantity = () => {
            let currentValue = parseInt(quantityInput.value);

            // Якщо значення не є числом або менше мінімуму, виправити його
            if (isNaN(currentValue) || currentValue < minValue) {
                quantityInput.value = minValue;
            } else if (currentValue > maxValue) {
                quantityInput.value = maxValue;
            }
            toggleMinusButton();
        };

        // Вимикання кнопки мінус при досягненні мінімального значення
        const toggleMinusButton = () => {
            if (parseInt(quantityInput.value) <= minValue) {
                minusButton.disabled = true;
            } else {
                minusButton.disabled = false;
            }
        };

        // Додавання обробника для кнопки мінус
        minusButton.addEventListener('click', function() {
            let currentValue = parseInt(quantityInput.value);

            if (currentValue > minValue) {
                quantityInput.value = currentValue - 1;
            }
            validateQuantity();
        });

        // Додавання обробника для кнопки плюс
        plusButton.addEventListener('click', function() {
            let currentValue = parseInt(quantityInput.value);

            if (currentValue < maxValue) {
                quantityInput.value = currentValue + 1;
            }
            validateQuantity();
        });

        // Обробка зміни значення вручну (якщо інпут не readonly)
        quantityInput.addEventListener('input', function() {
            validateQuantity();
        });

        // Ініціалізація: перевірка стану кнопки мінус після завантаження сторінки
        validateQuantity();
    });
});
