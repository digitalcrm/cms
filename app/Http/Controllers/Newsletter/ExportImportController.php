<?php

namespace App\Http\Controllers\Newsletter;

use App\Exports\NewsletterExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportImportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function export()
    {
        return Excel::download(new NewsletterExport, 'newsletter_subscribers.xlsx');
    }

}
