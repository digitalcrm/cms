<?php

namespace App\Http\Controllers\Newsletter;

use Illuminate\Http\Request;
use App\Exports\NewsletterExport;
use App\Imports\NewsletterImport;
use App\Http\Controllers\Controller;
use App\Http\Requests\NewsletterImportRequest;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Throwable;

class ExportImportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['role:superadmin|admin']);
    }

    public function export()
    {
        return Excel::download(new NewsletterExport, 'newsletter_subscribers.xlsx');
    }

    public function import()
    {
        return view('newsletter.import-subscriber');
    }

    public function store(NewsletterImportRequest $request)
    {
        // dd($import->errors());
        try {

            if ($request->hasFile('import_file')) {
                $import_file = $request->file('import_file');
            }
            $import = new NewsletterImport();

            $import->import($import_file);

            if ($import->failures()->isNotEmpty()) {
                return back()->withFailures($import->failures());
            }

            return back()->withMessage('file successfully imported');

        } catch(\Throwable $e) {
            return back()->withError('Something went Wrong '. $e->getMessage());
        }
    }

}
