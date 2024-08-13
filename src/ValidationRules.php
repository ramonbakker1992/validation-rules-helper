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
        foreach ($keys as $fieldOrKey => $fieldOrRule) {
            if (is_int($fieldOrKey) && isset($this->rules[$fieldOrRule])) {
                array_unshift($this->rules[$fieldOrRule], 'required');
            } else if (isset($this->rules[$fieldOrKey])) {
                array_unshift($this->rules[$fieldOrKey], $fieldOrRule);
            }
        }

        return $this;
    }
}
