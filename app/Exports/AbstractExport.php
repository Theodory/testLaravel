<?php

namespace App\Exports;

use Illuminate\Database\Query\Builder;
use Maatwebsite\Excel\Concerns\{FromCollection,
    ShouldAutoSize,
    WithHeadings,
    WithMapping,
    WithStrictNullComparison,
    WithTitle};

abstract class AbstractExport implements FromCollection, WithMapping, WithStrictNullComparison, WithHeadings, ShouldAutoSize, WithTitle
{


    /**
     * @return Builder
     */
    public abstract function collection();

    /**
     * @param mixed $row
     *
     * @return array
     */
    public abstract function map($row): array;

    /**
     * @return array
     */
    public abstract function headings(): array;

    /**
     * @return string
     */
    public abstract function title(): string;
}
