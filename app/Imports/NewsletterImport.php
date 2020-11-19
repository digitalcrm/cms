<?php

namespace App\Imports;

use App\Newsletter;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class NewsletterImport implements ToModel
                                , WithHeadingRow
                                , WithValidation
                                , SkipsOnError
                                , SkipsOnFailure
{
    use Importable, SkipsErrors, SkipsFailures;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Newsletter([
            'name'     => $row['name'],
            'email'    => $row['email'],
            'token'    => Str::random(60),
        ]);

    }

    public function rules(): array
    {
        return [
            '*.email' => ['email', 'unique:newsletters,email'],
        ];
    }
}
