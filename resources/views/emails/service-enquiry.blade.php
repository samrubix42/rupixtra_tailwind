<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body style="margin:0;padding:0;background-color:#f3f4f6;font-family:system-ui,-apple-system,'Segoe UI',Roboto,'Helvetica Neue',Arial;color:#0f172a;">
    <table role="presentation" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td align="center" style="padding:28px 16px;">
                <table role="presentation" cellpadding="0" cellspacing="0" width="680" style="max-width:680px;background:#ffffff;border-radius:12px;overflow:hidden;box-shadow:0 6px 18px rgba(15,23,42,0.08);">

                    <!-- Header -->
                    <tr>
                        <td style="background:#062c35;padding:20px 28px;">
                            <div style="display:flex;align-items:center;gap:12px;">
                                <div style="min-width:0;">
                                    <div style="color:#ffffff;font-weight:700;font-size:20px;letter-spacing:0.2px;line-height:1;overflow:hidden;white-space:nowrap;text-overflow:ellipsis;">{{ setting('app_name', config('app.name')) }}</div>
                                    <div style="color:#bde8e8;font-size:12px;margin-top:4px;">Platform Notification</div>
                                </div>
                
                            </div>
                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td style="padding:26px 28px;">
                            <h1 style="margin:0 0 8px;font-size:20px;color:#062c35;">New Service Enquiry</h1>
                            <p style="margin:0 0 18px;color:#334155;font-size:14px;line-height:1.5;">A user has submitted an enquiry from the website. Details are below.</p>

                            <table role="presentation" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse;margin-top:8px;">
                                <tr>
                                    <td style="padding:10px 12px;background:#f8fafc;border-radius:8px;">
                                        <strong style="display:block;color:#0b5257;">Service</strong>
                                        <div style="color:#0f172a;font-weight:600;">{{ $contact->service->title ?? 'N/A' }}</div>
                                        <div style="color:#64748b;font-size:13px;">Slug: {{ $contact->service->slug ?? '' }}</div>
                                    </td>
                                </tr>
                            </table>

                            <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:12px;margin-top:14px;">
                                <div style="background:#fff;border:1px solid #eef2f7;border-radius:8px;padding:12px;">
                                    <div style="font-size:12px;color:#64748b;">Name</div>
                                    <div style="font-weight:600;color:#0f172a;">{{ $contact->name }}</div>
                                </div>
                                <div style="background:#fff;border:1px solid #eef2f7;border-radius:8px;padding:12px;">
                                    <div style="font-size:12px;color:#64748b;">Email</div>
                                    <div style="font-weight:600;color:#0f172a;">{{ $contact->email ?? 'N/A' }}</div>
                                </div>
                                <div style="background:#fff;border:1px solid #eef2f7;border-radius:8px;padding:12px;">
                                    <div style="font-size:12px;color:#64748b;">Phone</div>
                                    <div style="font-weight:600;color:#0f172a;">{{ $contact->phone ?? 'N/A' }}</div>
                                </div>
                            </div>

                            @if(!empty($contact->message))
                            <div style="margin-top:16px;background:#f8fafc;border:1px solid #e6eef0;border-radius:8px;padding:14px;">
                                <div style="font-size:13px;color:#334155;font-weight:600;margin-bottom:6px;">Message</div>
                                <div style="color:#334155;font-size:14px;line-height:1.6;">{!! nl2br(e($contact->message)) !!}</div>
                            </div>
                            @endif

                            <p style="margin:18px 0 0;color:#94a3b8;font-size:13px;">Received: {{ now()->toDayDateTimeString() }}</p>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background:#f8fafc;padding:18px 28px;border-top:1px solid #eef2f7;">
                            <div style="font-size:13px;color:#475569;">This message was generated automatically. Reply to the enquiry via your admin panel.</div>
                            <div style="margin-top:8px;font-size:12px;color:#94a3b8;">&copy; {{ date('Y') }} {{ setting('app_name', config('app.name')) }}. All rights reserved.</div>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</body>
</html>
