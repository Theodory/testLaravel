<?php
namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class UserPostExcel implements WithMultipleSheets
{
    use Exportable;

    protected $year;
    
    public function __construct()
    {
      
    }

    /**
     * @return array
     */
    public function sheets(): array
    {
         $models = [
            'User',
            'Post',
        ];

        $sheets = [];
        for ($i = 0; $i < count($models); $i++) {
            $className = '\\App\\Exports\\'.$models[$i].'Export';
            $sheets[] = new $className;
        }

        return $sheets;
    }
}