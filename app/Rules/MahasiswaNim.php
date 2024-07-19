<?php

namespace App\Rules;

use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Validation\ValidationRule;

class MahasiswaNim implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $jurusan = DB::table('dt_mahasiswa')->where('mahasiswa_nim', $value)->first();
        if (!$jurusan) {
            $fail('The :attribute is invalid.');
        }
    }
}
