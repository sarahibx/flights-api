<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{
    protected $users;

    public function __construct(Collection $users)
    {
        $this->users = $users;
    }

    public function collection()
    {
        return $this->users;
    }
}