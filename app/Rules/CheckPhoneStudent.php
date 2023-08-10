<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class CheckPhoneStudent implements Rule
{
    protected $table;
    protected $column;
    protected $ignoreValue;
    protected $ignoreColumn;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($table, $column, $ignoreValue, $ignoreColumn = 'id')
    {
        $this->table = $table;
        $this->column = $column;
        $this->ignoreValue = $ignoreValue;
        $this->ignoreColumn = $ignoreColumn;

    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
//        dd($this->table, $this->column, $value, $this->ignoreValue, $this->ignoreColumn);
//        if ($value === $this->originalValue) {
//            return true;
//        }

        $result = DB::table($this->table)
            ->where($this->column, $value)
            ->where($this->ignoreColumn, '<>', $this->ignoreValue)
            ->count();

        return $result === 0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute has already been taken.';
    }
}
