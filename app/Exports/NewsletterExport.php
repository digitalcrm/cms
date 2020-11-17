<?php

namespace App\Exports;

use App\Newsletter;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class NewsletterExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],

            // Styling a specific cell by coordinate.
            'B2' => ['font' => ['italic' => true]],

            // Styling an entire column.
            'C'  => ['font' => ['size' => 16]],
        ];
    }

    public function headings(): array
    {
        return [
            'Subscriber Id',
            'Name',
            'Email',
        ];
    }

    public function collection()
    {
        return Newsletter::isSubscribed()->get(['id','name','email']);
    }
}
