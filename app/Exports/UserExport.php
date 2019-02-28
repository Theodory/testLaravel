<?php
namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class UserExport extends AbstractExport
{
    public function collection()
    {
        return User::all();
    }

       /**
     * @param $withdrawal
     *
     * @return array
     */
    public function map($user): array {
        return [
            $user->id,
            $user->name,
            $user->email,
        ];
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            '#',
            'Name',
            'Email',
        ];
    }

      /**
     * @return string
     */
    public function title(): string
    {
        return 'Users';
    }
}