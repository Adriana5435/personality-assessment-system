<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class UserController extends Controller
{
    /**
     * Export users data to an Excel file.
     *
     * @return BinaryFileResponse
     */
    public function export(): BinaryFileResponse
    {
        // Use the UsersExport class to generate and download the Excel file.
        return Excel::download(new UsersExport(), 'users.xlsx');
    }
}
