<?php

namespace App\Kernel\Validator;

class Validator
{
    public function validate(array $data, array $rules): array
    {
        $errors = [];

        foreach ($rules as $field => $fieldRules) {
            $value = $data[$field] ?? null;
            $fieldErrors = $this->validateRules($value, $fieldRules);

            if (!empty($fieldErrors)) {
                $errors[$field] = $fieldErrors;
            }
        }

        return $errors;
    }

    private function validateRules($value, array $rules): array
    {
        $errors = [];

        foreach ($rules as $rule) {
            switch ($rule) {
                case 'required':
                    if (empty($value)) {
                        $errors[] = 'Це поле є обов\'язковим.';
                    }
                    break;

                case 'email':
                    if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                        $errors[] = 'Невірний формат електронної пошти.';
                    }
                    break;

                case 'numeric':
                    if (!is_numeric($value)) {
                        $errors[] = 'Це поле має бути числовим.';
                    }
                    break;

                // Можна додати інші правила
                default:
                    $errors[] = "Невідоме правило: $rule";
            }
        }

        return $errors;
    }
}