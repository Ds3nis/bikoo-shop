<?php

namespace App\Kernel\Validator;

class Validator implements ValidatorInterface
{
    private array $errors;
    public function validate(array $data, array $rules): bool
    {
        $this->errors = [];
//        dd($data, $rules);
        foreach ($rules as $field => $fieldRules) {
            $rules = explode('|', $fieldRules[0]);
            $value = $data[$field] ?? null;
            $fieldErrors = $this->validateRules($value, $rules);
            if (!empty($fieldErrors)) {
                $this->errors[$field] = $fieldErrors;
            }
        }
        return empty($this->errors);
    }

    public function errors(){
        return $this->errors;
    }

    private function validateRules(string $value, array $rules): array
    {
        $errors = [];
//        dd($value, $rules);
        foreach ($rules as $rule) {
            // Kontrola, zda pravidlo má další parametry (např. min:3)
            if (strpos($rule, ':') !== false) {
                list($ruleName, $ruleValue) = explode(':', $rule, 2);
            } else {
                $ruleName = $rule;
                $ruleValue = null;
            }

            switch ($ruleName) {
                case 'required':
                    if (empty($value)) {
                        $errors[] = 'Toto pole je povinné.';
                    }
                    break;

                case 'email':
                    if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                        $errors[] = 'Neplatný formát e-mailu.';
                    }
                    break;

                case 'numeric':
                    if (!is_numeric($value)) {
                        $errors[] = 'Toto pole musí být číselné.';
                    }
                    break;

                case 'string':
                    if (!is_string($value)) {
                        $errors[] = 'Toto pole musí být text.';
                    }
                    break;

                case 'min':
                    if (is_numeric($value) && $value < $ruleValue) {
                        $errors[] = "Hodnota musí být nejméně $ruleValue.";
                    } elseif (is_string($value) && strlen($value) < $ruleValue) {
                        $errors[] = "Délka textu musí být nejméně $ruleValue znaků.";
                    }
                    break;

                case 'max':
                    if (is_numeric($value) && $value > $ruleValue) {
                        $errors[] = "Hodnota musí být nejvýše $ruleValue.";
                    } elseif (is_string($value) && strlen($value) > $ruleValue) {
                        $errors[] = "Délka textu musí být nejvýše $ruleValue znaků.";
                    }
                    break;

                case 'alpha':
                    if (!ctype_alpha($value)) {
                        $errors[] = 'Toto pole může obsahovat pouze písmena.';
                    }
                    break;

                case 'boolean':
                    if (!is_bool(filter_var($value, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE))) {
                        $errors[] = 'Toto pole musí být true nebo false.';
                    }
                    break;

                case 'url':
                    if (!filter_var($value, FILTER_VALIDATE_URL)) {
                        $errors[] = 'Neplatný formát URL.';
                    }
                    break;

                case 'in':
                    $allowedValues = explode(',', $ruleValue);
                    if (!in_array($value, $allowedValues)) {
                        $errors[] = 'Hodnota musí být jedna z: ' . implode(', ', $allowedValues) . '.';
                    }
                    break;

                case 'date':
                    if (!strtotime($value)) {
                        $errors[] = 'Neplatný formát data.';
                    }
                    break;

                default:
                    $errors[] = "Neznámé pravidlo: $ruleName";
            }
        }
            return $errors;
    }
}