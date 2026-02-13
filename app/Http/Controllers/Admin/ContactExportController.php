<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ContactExportController extends Controller
{
    public function __invoke(Request $request): StreamedResponse
    {
        $search = (string) $request->query('search', '');
        $date = (string) $request->query('date', '');

        $query = Contact::query()
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('phone', 'like', "%{$search}%")
                        ->orWhere('country', 'like', "%{$search}%");
                });
            })
            ->when($date !== '', function ($query) use ($date) {
                $query->whereDate('created_at', $date);
            })
            ->latest();

        $fileName = 'contacts_' . now()->format('Ymd_His') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"{$fileName}\"",
        ];

        $columns = [
            'ID',
            'Name',
            'Email',
            'Phone',
            'Country',
            'Subject',
            'Message',
            'Is Read',
            'Created At',
        ];

        $callback = static function () use ($query, $columns) {
            $handle = fopen('php://output', 'w');

            // Header row
            fputcsv($handle, $columns);

            $query->chunk(200, static function ($contacts) use ($handle) {
                foreach ($contacts as $contact) {
                    fputcsv($handle, [
                        $contact->id,
                        $contact->name,
                        $contact->email,
                        $contact->phone,
                        $contact->country,
                        $contact->subject,
                        $contact->message,
                        $contact->is_read ? 'Yes' : 'No',
                        optional($contact->created_at)->toDateTimeString(),
                    ]);
                }
            });

            fclose($handle);
        };

        return response()->streamDownload($callback, $fileName, $headers);
    }
}
