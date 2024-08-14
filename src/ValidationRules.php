<?php

namespace Proman\ValidationRules;

class ValidationRules 
{
    protected $rules = [];

    public function validation(): array
    {
        return [];
    }

    public static function rules(array $rules = []): self
    {
        return (new static)->setRules($rules);
    }

    public function setRules(array $rules): self
    {
        $this->rules = $rules + $this->validation();

        foreach ($this->rules as $field => $rules) {
            // Make sure the first key always a value of 'nullable'
            if ($this->rules[$field][0] !== 'nullable') {
                array_unshift($this->rules[$field], 'nullable');
            }
        }

        return $this;
    }

    public function all(): array
    {
        return $this->rules;
    }

    public function only(array $keys): array
    {
        return collect($this->rules)
            ->pluck($keys)
            ->toArray();
    }

    public function required(array $keys): self
    {
        $normalizedKeys = [];

        foreach ($keys as $key => $value) {
            if (is_int($key)) {
                $normalizedKeys[$value] = 'required';
            } else {
                $normalizedKeys[$key] = $value;
            }
        }

        foreach ($normalizedKeys as $field => $rule) {
            $this->rules[$field][0] = $rule;
        }

        return $this;
    }
}
