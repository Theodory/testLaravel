<?php
namespace App\Exports;

use App\Post;
use Maatwebsite\Excel\Concerns\FromCollection;

class PostExport extends AbstractExport
{
    public function collection()
    {
        return Post::all();
    }

       /**
     * @param $withdrawal
     *
     * @return array
     */
    public function map($post): array {
        return [
            $post->id,
            $post->title,
            $post->body,
        ];
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            '#',
            'Title',
            'Message',
        ];
    }

      /**
     * @return string
     */
    public function title(): string
    {
        return 'Posts';
    }
}