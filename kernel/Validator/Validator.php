<?php

namespace App\Kernel\Validator;

use App\Kernel\Database\DatabaseInterface;

class Validator implements ValidatorInterface
{
    private array $errors;
    private array $data;

    public function __construct(private DatabaseInterface $db){

    }
    public function validate(array $data, array $rules): bool
    {
        $this->errors = [];
        $this->data = $data;


        foreach ($rules as $field => $fieldRules) {
            $rules = explode('|', $fieldRules);
            $value = $data[$field] ?? null;

            $fieldErrors = $this->validateRules($field, $value, $rules);
            if (!empty($fieldErrors)) {
                $this->errors[$field] = $fieldErrors;
            }
        }
        return empty($this->errors);
    }

    public function errors(){
        return $this->errors;
    }

    private function validateRules(string $field, ?string $value, array $rules): array
    {

        $errors = [];
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

                case 'maxNumeric':
                    if (is_numeric($value) && strlen((string)$value) > $ruleValue) {
                        $errors[] = "Počet cifr nemuže byt větši než $ruleValue.";
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

                case 'unique':
                    if (!$this->db->isUnique('zakaznik', $field, $value)) {
                        $errors[] = 'Hodnota musí být unikátní.';
                    }
                    break;

                case 'regex':
                    if (!preg_match("/$ruleValue/", $value)) {
                        $errors[] = 'Hodnota neodpovídá požadovanému formátu.';
                    }
                    break;

                case 'password_confirm':
                    if ($value !== ($this->data[$ruleValue] ?? null)) {
                        $errors[] = 'Hesla se neshodují.';
                    }
                    break;

                default:
                    $errors[] = "Neznámé pravidlo: $ruleName";
                    break;
            }
        }
            return $errors;
    }
}