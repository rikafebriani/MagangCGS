<?php

namespace App\Rules;

use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Validation\ValidationRule;

class DosenKode implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $jurusan = DB::table('dt_dosen')->where('dosen_kode', $value)->first();
        if (!$jurusan) {
            $fail('The :attribute is invalid.');
        }
    }
}
