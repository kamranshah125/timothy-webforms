<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>{{ $form_name ?? ucfirst($form_type) }}</title>
    <style>
        @page {
            margin: 16mm 12mm;
            size: letter;
        }

        html,
        body {
            height: 100%;
        }

        body {
            font-family: DejaVu Sans, Arial, Helvetica, sans-serif;
            font-size: 10pt;
            color: #111;
            margin: 0;
            padding: 0;
            line-height: 1.35;
        }

        /* --- Colors (reference) --- */
        :root {
            --primary: #3d71ce;
            /* reference blue */
            --muted: #666;
            --light-bg: #fbfbfd;
            --panel-bg: #f8f9fa;
            --accent: #eaf3ff;
            --border: #e6eef9;
        }

        .page {
            padding: 0 12px 36px 12px;
        }

        /* Header */
        .hdr {
            text-align: center;
            padding: 8px 0 10px 0;
            border-bottom: 2px solid var(--primary);
            margin-bottom: 15px;
        }

        .company {
            font-weight: 800;
            color: var(--primary);
            font-size: 16pt;
            margin: 0;
        }

        .contact {
            font-size: 9pt;
            color: var(--muted);
            margin-top: 3px;
        }

        .form-title {
            text-align: center;
            font-weight: 800;
            font-size: 13pt;
            color: var(--primary);
            margin: 12px 0 10px 0;
            text-transform: uppercase;
            letter-spacing: 0.6px;
        }

        /* Personal box (page1 summary) */
        .personal {
            background: var(--panel-bg);
            border: 1px solid var(--primary);
            padding: 10px;
            border-radius: 12px;
            margin-bottom: 12px;
            page-break-inside: avoid;
        }

        .personal h3 {
            margin: 0 0 12px 0;
            padding-bottom: 10px;
            font-size: 11pt;
            color: var(--primary);
            font-weight: 600;
            text-transform: uppercase;
            text-align: center;
            border-bottom: 1px solid #e8eef8;
        }

        .row {
            display: flex;
            gap: 10px;
            margin: 6px 0;
        }

        .col {
            flex: 1;
            font-size: 9pt;
        }

        .label {
            font-weight: 700;
            color: #222;
            display: block;
            font-size: 9pt;
            margin-bottom: 4px;
        }

        .val {
            color: #000;
            font-size: 9pt;
        }

        /* Page header (full width blue bar) */
        .page-header {
            background: var(--primary);
            color: #fff;
            padding: 8px 10px;
            font-weight: 600;
            text-transform: uppercase;
            margin-top: 16px;
            border-radius: 3px;
            font-size: 10pt;
            text-align: center;
        }

        .page-desc {
            font-size: 9pt;
            color: var(--muted);
            /* font-style: italic; */
            margin: 6px 2px 10px 2px;
            text-align: center;
        }

        /* Section title (centered, small) */
        .section-title {
            text-align: center;
            color: var(--primary);
            font-weight: 600;
            margin: 12px 0 8px 0;
            font-size: 10pt;
            text-transform: uppercase;
            border-bottom: 1px solid #494242;
            padding-bottom: 6px;
        }

        /* Question block */
        .q {
            margin: 8px 0;
            padding: 8px 10px;
            background: #fff;
            border-radius: 3px;
            page-break-inside: avoid;
        }

        .q .q-label {
            font-weight: 700;
            color: #222;
            margin-bottom: 6px;
            font-size: 10pt;
        }

        .req {
            color: #c62828;
            margin-left: 6px;
            font-weight: 700;
        }

        /* Underline text field */
        .text-line {
            border-bottom: 1px solid #615b5b;
            padding: 6px 4px;
            display: inline-block;
            min-height: 16px;
            height: auto;
            width: 100%;
            white-space: nowrap;
        }


        .text-line.empty {
            color: #777;
            font-style: italic;
        }

        .textarea {
            border-bottom: 1px solid #615b5b;
            padding: 6px;
            background: #fff;
            width: 100%;
            display: block;
            white-space: pre-wrap;
        }

        .textarea.empty {
            color: #777;
            font-style: italic;
        }

        /* Checkbox item */
        .cbg {
            display: flex;
            flex-direction: column;
            gap: 6px;
            padding-left: 6px;
        }

        .cb {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 9.5pt;
        }

        .cb .box {
            width: 14px;
            height: 14px;
            border: 2px solid #222;
            display: inline-block;
            position: relative;
            border-radius: 3px;
        }

        .cb .box.checked {
            background: var(--primary);
            border-color: var(--primary);
        }

        .cb .box.checked::after {
            content: "✓";
            color: #fff;
            font-size: 10px;
            position: absolute;
            left: 1px;
            top: -3px;
        }

        /* Radio simple */
        .radio-val {
            display: inline-block;
            padding: 6px 8px;
            border-radius: 4px;
            font-weight: 700;
            background: #fbfbfd;
            border: 1px solid #eee;
            font-size: 9pt;
        }

        /* Radio score table (6 columns) */
        .score-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 8px;
            font-size: 9pt;

        }

        .score-table th {
            background: var(--primary);
            color: #fff;
            padding: 6px;
            font-weight: 800;
            border: 1px solid rgba(0, 0, 0, 0.06);
            font-size: 9pt;
        }

        .score-table td {
            border: 1px solid #e6eef9;
            padding: 6px;
            text-align: center;
            font-size: 9pt;
        }

        .score-table td.left {
            text-align: left;
            background: var(--light-bg);
            font-weight: 600;
        }

        .score-table td.sel {
            background: var(--primary);
            color: #fff;
            font-weight: 600;
        }

        /* Repeat group table */
        .repeat {
            width: 100%;
            border-collapse: collapse;
            margin-top: 6px;
            font-size: 9pt;
        }

        .repeat th {
            background: #f1f6fb;
            padding: 6px;
            border: 1px solid #eaeff7;
            text-align: left;
            font-weight: 800;
            font-size: 9pt;
        }

        .repeat td {
            padding: 6px;
            border: 1px solid #eaeff7;
            font-size: 9pt;
        }

        /* Score summary panel */
        .summary {
            margin-top: 12px;

            background: var(--accent);
            padding: 10px;

            page-break-inside: avoid;

            border: 1px solid var(--primary);

            border-radius: 12px;
        }

        .summary table {
            width: 100%;
            border-collapse: collapse;
            font-size: 9pt;
        }

        .summary th {
            background: var(--primary);
            color: #fff;
            padding: 6px;
            text-align: left;
            font-weight: 800;
        }

        .summary td {
            padding: 6px;
            border: 1px solid #e6eef9;
        }

        /* Footer */
        .footer {
            position: fixed;
            bottom: 8px;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 8pt;
            color: var(--muted);
            border-top: 1px solid #eee;
            padding-top: 6px;
        }

        /* Page break helpers */
        .pb {
            page-break-after: always;
        }

        .avoid-break {
            page-break-inside: avoid;
        }

        /* small helpers */
        .muted {
            color: var(--muted);
            font-size: 9pt;
        }

        .mb8 {
            margin-bottom: 8px;
        }
    </style>
</head>

<body>
    <div class="page">

        {{-- Header --}}
        <div class="hdr">
            <div class="company">NeuroFiT Connections</div>
            <div class="contact">117 Edinburgh South Drive, Ste 102 | Cary, NC 27511</div>
            <div class="contact">(833) 632-5437 | info@neurofitconnections.com</div>
        </div>

        {{-- Form Title --}}
        <div class="form-title">{{ $form_name ?? ucfirst($form_type) }}</div>

        {{-- Personal (page1) summary --}}
        @php
            $page1 = $form['page1'] ?? [];
            $isChild = ($page1['is_child'] ?? '') === 'yes';
        @endphp

        <div class="personal avoid-break">
            <h3>{{ $isChild ? 'Child' : 'Personal' }} Information</h3>

            <div class="row mb8">
                <div class="col">
                    <span class="label">Full Name</span>
                    <span class="val">
                        {{ trim(($page1['first_name'] ?? '') . ' ' . ($page1['middle_name'] ?? '') . ' ' . ($page1['last_name'] ?? '')) ?: 'N/A' }}
                    </span>
                </div>
                <div class="col">
                    <span class="label">Date of Birth</span>
                    <span class="val">{{ $page1['birth_date'] ?? ($page1['dob'] ?? 'N/A') }}</span>
                </div>
            </div>

            <div class="row mb8">
                <div class="col">
                    <span class="label">Email</span>
                    <span class="val">{{ $page1['email'] ?? ($user->email ?? 'N/A') }}</span>
                </div>
                <div class="col">
                    <span class="label">Phone</span>
                    <span class="val">{{ $page1['phone'] ?? 'N/A' }}</span>
                </div>
            </div>

            @if (!empty($page1['address_line1']) || !empty($page1['city']))
                <div class="row mb8">
                    <div class="col" style="flex:1 1 100%;">
                        <span class="label">Address</span>
                        <span class="val">
                            {{ trim(($page1['address_line1'] ?? '') . ' ' . ($page1['address_line2'] ?? '')) }}
                            @if (!empty($page1['city']))
                                , {{ $page1['city'] }}
                            @endif
                            @if (!empty($page1['state']))
                                , {{ $page1['state'] }}
                            @endif
                            @if (!empty($page1['zip']))
                                , {{ $page1['zip'] }}
                            @endif
                            @if (!empty($page1['country']))
                                , {{ $page1['country'] }}
                            @endif
                        </span>
                    </div>
                </div>
            @endif

            <div class="row">
                <div class="col">
                    <span class="label">Submitted</span>
                    <span class="val">{{ $submitted_at->format('F j, Y g:i A') }}</span>
                </div>
            </div>
        </div>

        {{-- Dynamic pages/sections --}}
        @php
            $config = config("forms.{$form_type}") ?: [];
            $pages = $config['pages'] ?? [];
        @endphp

        @foreach ($pages as $pageKey => $pageCfg)
            @if ($pageKey === 'page1')
                @continue
            @endif

            @php
                $pageData = $form[$pageKey] ?? [];
                $sections = $pageCfg['sections'] ?? null;
                $pageFields = $pageCfg['fields'] ?? null;
            @endphp

            {{-- Page header --}}
            <div class="page-header">{{ $pageCfg['title'] ?? ucfirst($pageKey) }}</div>
            @if (!empty($pageCfg['description']))
                <div class="page-desc">{{ $pageCfg['description'] }}</div>
            @endif

            {{-- Page-level fields --}}
            @if (!empty($pageFields) && is_array($pageFields))
                @foreach ($pageFields as $field)
                    @php
                        $fname = $field['name'] ?? '';
                        $label = $field['label'] ?? ucfirst(str_replace('_', ' ', $fname));
                        $type = $field['type'] ?? 'text';
                        $value = $pageData[$fname] ?? null;
                        $required = !empty($field['required']);
                    @endphp

                    <div class="q avoid-break">
                        <div class="q-label">{{ $label }} @if ($required)
                                <span class="req">*</span>
                            @endif
                        </div>
                        {{-- TEXT --}}
                        @if (in_array($type, ['text', 'email', 'number', 'date']))
                            <div class="text-line {{ !$value ? 'empty' : '' }}">{{ $value ?? '' }}</div>

                            {{-- TEXTAREA --}}
                        @elseif($type === 'textarea')
                            <div class="textarea {{ !$value ? 'empty' : '' }}">{{ $value ?? '' }}</div>

                            {{-- CHECKBOX --}}
                        @elseif($type === 'checkbox-group')
                            <div class="cbg">
                                @foreach ($field['options'] ?? [] as $optKey => $optLabel)
                                    @php
                                        $checked = false;
                                        if (is_array($value)) {
                                            if (is_bool($value[$optKey] ?? null)) {
                                                $checked = $value[$optKey];
                                            } else {
                                                $checked =
                                                    array_key_exists($optKey, $value) || in_array($optKey, $value);
                                            }
                                        }
                                    @endphp
                                    <div class="cb">
                                        <span class="box {{ $checked ? 'checked' : '' }}"></span>
                                        <span>{{ $optLabel }}</span>
                                    </div>
                                @endforeach
                            </div>

                            {{-- RADIO --}}
                        @elseif(in_array($type, ['radio', 'select']))
                            <span class="radio-val">
                                {{ $field['options'][$value] ?? ($value ?: 'Not answered') }}
                            </span>

                            {{-- RADIO-SCORE (single row) --}}
                        @elseif($type === 'radio-score')
                            @php
                                $opts = $field['options'] ?? [
                                    0 => "Doesn't Apply",
                                    1 => 'Mild',
                                    2 => 'Mild to Moderate',
                                    3 => 'Moderate',
                                    4 => 'Moderate to Severe',
                                    5 => 'Severe',
                                ];
                            @endphp

                            <table class="score-table">
                                <thead>
                                    <tr>
                                        <th style="text-align:left;">Item</th>
                                        @foreach ($opts as $ol)
                                            <th>{{ $ol }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="left">{{ $label }}</td>
                                        @foreach ($opts as $ok => $ol)
                                            @php $sel = ((string)$value === (string)$ok); @endphp
                                            <td class="{{ $sel ? 'sel' : '' }}">{{ $sel ? '●' : '' }}</td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        @endif
                    </div>
                @endforeach
            @endif

            {{-- SECTION FIELDS --}}
            @if (!empty($sections))
                @foreach ($sections as $section)
                    <div class="section-title">{{ $section['title'] }}</div>

                    @php
                        $secFields = $section['fields'] ?? [];
                        $radioScoreFields = [];
                        $normalFields = [];

                        foreach ($secFields as $f) {
                            if (($f['type'] ?? '') === 'radio-score') {
                                $radioScoreFields[] = $f;
                            } else {
                                $normalFields[] = $f;
                            }
                        }
                    @endphp

                    {{-- NORMAL FIELDS --}}
                    @foreach ($normalFields as $field)
                        @php
                            $fname = $field['name'] ?? '';
                            $label = $field['label'] ?? ucfirst(str_replace('_', ' ', $fname));
                            $type = $field['type'] ?? 'text';
                            $value = $pageData[$fname] ?? null;
                            $required = !empty($field['required']);
                        @endphp

                        <div class="q avoid-break">
                            <div class="q-label">{{ $label }} @if ($required)
                                    <span class="req">*</span>
                                @endif
                            </div>

                            @if (in_array($type, ['text', 'email', 'number', 'date']))
                                <div class="text-line {{ !$value ? 'empty' : '' }}">{{ $value ?? '' }}</div>
                            @elseif($type === 'textarea')
                                <div class="textarea {{ !$value ? 'empty' : '' }}">{{ $value ?? '' }}</div>
                            @elseif($type === 'checkbox-group')
                                <div class="cbg">
                                    @foreach ($field['options'] as $optKey => $optLabel)
                                        @php
                                            $checked = false;
                                            if (is_array($value)) {
                                                if (is_bool($value[$optKey] ?? null)) {
                                                    $checked = $value[$optKey];
                                                } else {
                                                    $checked =
                                                        array_key_exists($optKey, $value) || in_array($optKey, $value);
                                                }
                                            }
                                        @endphp
                                        <div class="cb">
                                            <span class="box {{ $checked ? 'checked' : '' }}"></span>
                                            <span>{{ $optLabel }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            @elseif(in_array($type, ['radio', 'select']))
                                <span class="radio-val">{{ $field['options'][$value] ?? $value }}</span>
                            @endif
                        </div>
                    @endforeach

                    {{-- RADIO SCORE → SINGLE TABLE FOR THIS SECTION --}}
                    @if (count($radioScoreFields) > 0)
                        @php
                            $opts = [
                                0 => "Doesn't Apply",
                                1 => 'Mild',
                                2 => 'Mild to Moderate',
                                3 => 'Moderate',
                                4 => 'Moderate to Severe',
                                5 => 'Severe',
                            ];
                        @endphp

                        <table class="score-table" style="margin-top:10px;">
                            <thead>
                                <tr>
                                    <th style="text-align:left;">Item</th>
                                    @foreach ($opts as $ol)
                                        <th>{{ $ol }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($radioScoreFields as $field)
                                    @php
                                        $fname = $field['name'];
                                        $label = $field['label'] ?? $fname;
                                        $value = $pageData[$fname] ?? null;
                                    @endphp
                                    <tr>
                                        <td class="left">{{ $label }}</td>
                                        @foreach ($opts as $ok => $ol)
                                            @php $sel = ((string)$value === (string)$ok); @endphp
                                            <td class="{{ $sel ? 'sel' : '' }}">{{ $sel ? '●' : '' }}</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                @endforeach
            @endif

            <div class="pb"></div>
        @endforeach

        {{-- Scores Summary --}}
        @if (!empty($scores))
            <div class="summary avoid-break">
                <div
                    style="font-weight:600; color:var(--primary); margin-bottom:6px; text-align:center; padding:10px 0;">
                    Assessment Scores Summary
                </div>

                <table class="score-table" style="width:100%;">
                    <thead>
                        <tr>
                            <th>Section</th>
                            <th>Score</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($scores as $section => $score)
                            <tr>
                                <td>{{ str_replace('_', ' ', $section) }}</td>
                                <td style="font-weight:600; text-align:center;">{{ $score }}</td>
                            </tr>
                        @endforeach

                        <tr>
                            <td style="font-weight:800;">TOTAL SCORE</td>
                            <td style="font-weight:800; text-align:center;">{{ array_sum($scores) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endif

        {{-- Footer --}}
        <div class="footer">
            Copyright © {{ date('Y') }} –
            NeuroFit Connections, LLC |
            Generated: {{ now()->format('M d, Y') }}
        </div>

    </div>
</body>

</html>
