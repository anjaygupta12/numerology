<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Numerology Analysis</title>
    <style>
        @page {
            margin: 25px;
        }

        body {
            font-family: "DejaVu Sans", sans-serif;
            font-size: 11px;
            line-height: 1.5;
            color: #333;
            margin: 0;
            padding: 0;
        }

        h4, h5, h6 {
            margin: 10px 0;
        }

        /* Card + layout */
        .card {
            border-radius: 4px;
            margin-bottom: 15px;
        }

        .card-header {

            padding: 8px 10px;
            font-weight: bold;
            font-size: 13px;
        }

        .card-body {
            padding: 10px 12px;
        }

        .card-title {
            margin: 0 0 10px 0;
            font-size: 16px;
            font-weight: bold;
        }

        .section-title {
            font-size: 14px;
            font-weight: bold;
            margin: 20px 0 10px;
            padding: 6px 10px;

        }

        /* Tables */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 12px;
        }

        table td,
        table th {
            border: 1px solid #000;
            padding: 6px 8px;
            vertical-align: top;
            font-size: 11px;
        }

        table th {
            background: #f5f5f5;
            font-weight: bold;
        }

        .text-center {
            text-align: center;
        }

        .text-muted {
            color: #777;
        }

        .mt-2 { margin-top: 8px; }
        .mt-4 { margin-top: 16px; }
        .mt-5 { margin-top: 20px; }
        .p-2  { padding: 8px; }

        /* Attributes table (BN, DN) */
        .attributes_tbl .attribute-col {
            width: 30%;
            background: #f5f5f5;
            font-weight: bold;
            text-align: center;
        }

        .attributes_tbl .description-col {
            width: 70%;
        }

        /* Remedies table in Lifetime Remedy */
        .remedies-table .header-cell {
            text-align: center;
            font-weight: bold;
            background: #e9e9e9;
        }

        .remedies-table .number-cell {
            width: 40px;
            text-align: center;
            font-weight: bold;
        }

        .remedies-table .birth-node {
            width: 80px;
            font-weight: bold;
        }

        /* Simple list style */
        ul {
            margin: 0 0 10px 18px;
            padding: 0;
        }

        ul li {
            margin-bottom: 4px;
        }

        hr {
            border: 0;
            border-top: 1px solid #ccc;
            margin: 15px 0;
        }
            @page {
        margin-top: 120px;   /* space for header */
        margin-bottom: 80px; /* space for footer */
    }

    .header {
        position: fixed;
        top: -100px;
        left: 0;
        right: 0;
        height: 80px;
        text-align: center;
        padding-bottom: 5px;
    }

    .header-content .logo {
        height: 45px;
        margin-bottom: 5px;
    }

    .header-title {
        font-size: 16px;
        font-weight: bold;
    }

    .header-info {
        font-size: 12px;
        margin-top: -3px;
    }

    /* FOOTER */
    .footer {
        position: fixed;
        bottom: -60px;
        left: 0;
        right: 0;
        height: 60px;
        text-align: center;
        border-top: 1px solid #ccc;
        font-size: 10px;
        padding-top: 5px;
    }

    .page-number:before {
        content: "Page " counter(page);
    }
    </style>
</head>
<body>
<body>

    <!-- Global Header (Repeats on Every Page) -->
    <div class="header">
        <div class="header-content">
            <img src="{{ public_path('images/logo/pdflogo.jpg') }}" class="logo" alt="Company Logo">
            <div class="header-title">Name Numerology Report</div>
            <div class="header-info">BY ASTRO NUMEROLOGIST {{ Auth::user()->name }}</div>
            <div class="header-info">CREATED BY ASTRONUMERO QUEEN SADHNA GULATI</div>
        </div>
    </div>

    <!-- Global Footer (Repeats on Every Page) -->
    <div class="footer">
        <div class="footer-content">
            <div class="page-number"></div>
            <div style="font-size: 10px; margin-top: 5px;">
                Confidential Report - Generated on {{ date('d-M-Y H:i') }}
            </div>
        </div>
    </div>


    <div class="card" style="margin-top: 50px;">
        <div class="card-body">
            <h5 class="card-title">Numerology Analysis</h5>

            {{-- 1. BN, DN Predictions --}}
            <div class="section">
                <div class="card">
                    <div class="card-header">
                        BN, DN Predictions
                    </div>
                    <div class="card-body">
                        <table class="attributes_tbl">
                            <tr>
                                <td class="attribute-col">
                                    D.O.B - BN <br> ({{ $result['bn'] }})
                                </td>
                                <td class="description-col">
                                    {!! $result['attrs'][$result['bn']] ?? '' !!}
                                </td>
                            </tr>
                            <tr>
                                <td class="attribute-col">
                                    D.O.B - DN <br> ({{ $result['dn'] }})
                                </td>
                                <td class="description-col">
                                    {!! $result['attrs'][$result['dn']] ?? '' !!}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
             <div style="page-break-before: always;"></div>
            {{-- 2. DOB Yogas Predictions --}}
            <div class="section">
                <div class="card">
                    <div class="card-header">
                        DOB Yogas Predictions
                    </div>
                    <div class="card-body">

                        @php $dob_chart = $result['dob_chart'] ?? null; @endphp
                        @if($dob_chart)
                            <table class="text-center">
                                <tr>
                                    <td>{{ $dob_chart[0][0] ?? '0' }}</td>
                                    <td>{{ $dob_chart[0][1] ?? '0' }}</td>
                                    <td>{{ $dob_chart[0][2] ?? '0' }}</td>
                                </tr>
                                <tr>
                                    <td>{{ $dob_chart[1][0] ?? '0' }}</td>
                                    <td>{{ $dob_chart[1][1] ?? '0' }}</td>
                                    <td>{{ $dob_chart[1][2] ?? '0' }}</td>
                                </tr>
                                <tr>
                                    <td>{{ $dob_chart[2][0] ?? '0' }}</td>
                                    <td>{{ $dob_chart[2][1] ?? '0' }}</td>
                                    <td>{{ $dob_chart[2][2] ?? '0' }}</td>
                                </tr>
                            </table>
                        @endif

                        <h4 class="mt-5">DOB Yogas Predictions Detail</h4>

                        <div class="card">
                            <div class="card-header">
                                DOB Number {{ $result['bn_single'] ?? '' }} -
                                {{ $result['dob_yogas_prediction']['yoga'] ?? '' }}
                            </div>
                            <div class="card-body">
                                <table>
                                    <tbody>
                                        <tr>
                                            <th style="width:25%;">Yoga</th>
                                            <td>{{ $result['dob_yogas_prediction']['yoga'] ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Prediction</th>
                                            <td>{{ $result['dob_yogas_prediction']['prediction'] ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Remedy</th>
                                            <td>{{ $result['dob_yogas_prediction']['remedy'] ?? '' }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div style="page-break-before: always;"></div>
            {{-- 3. MD Yogas Predictions --}}
            <div class="section">
                <div class="card">
                    <div class="card-header">
                        MD Yogas Predictions
                    </div>
                    <div class="card-body">

                        @php
                            $md_chart = isset($result['md_chart']['data'])
                                ? explode(',', $result['md_chart']['data'])
                                : [];
                            $md_chart = array_pad($md_chart, 9, '');
                        @endphp

                        <table class="text-center">
                            <tr>
                                <td>{{ $md_chart[0] }}</td>
                                <td>{{ $md_chart[1] }}</td>
                                <td>{{ $md_chart[2] }}</td>
                            </tr>
                            <tr>
                                <td>{{ $md_chart[3] }}</td>
                                <td>{{ $md_chart[4] }}</td>
                                <td>{{ $md_chart[5] }}</td>
                            </tr>
                            <tr>
                                <td>{{ $md_chart[6] }}</td>
                                <td>{{ $md_chart[7] }}</td>
                                <td>{{ $md_chart[8] }}</td>
                            </tr>
                        </table>

                        <h4 class="mt-5">MD Yogas Interpretations</h4>
                        <ul>
                            <li>
                                <strong>1-9 Yoga:</strong> (e.g., Day = 1, Life Path = 9)
                                <ul>
                                    <li>A strong leader with universal goals.</li>
                                    <li>Often seen in visionaries, reformers, or spiritual leaders.</li>
                                    <li>However, can struggle with isolation or pressure.</li>
                                </ul>
                            </li>
                            <li>
                                <strong>2-7 Yoga:</strong> (e.g., Day = 2, Life Path = 7)
                                <ul>
                                    <li>A deeply intuitive and spiritual combination.</li>
                                    <li>Can lead to psychic sensitivity or a solitary life.</li>
                                    <li>Great for healers, artists, mystics.</li>
                                </ul>
                            </li>
                            <li>
                                <strong>3-6 Yoga:</strong> (e.g., Day = 3, Life Path = 6)
                                <ul>
                                    <li>Strong creative and family-centered energy.</li>
                                    <li>Often leads to careers in art, beauty, or teaching.</li>
                                    <li>Must balance self-expression and responsibility.</li>
                                </ul>
                            </li>
                            <li>
                                <strong>4-8 Yoga:</strong> (Karmic or Saturnian Yoga)
                                <ul>
                                    <li>A tough karma combination.</li>
                                    <li>Hardworking but may face delays or repeated tests.</li>
                                    <li>When balanced, they become masters of endurance and success through effort.</li>
                                </ul>
                            </li>
                               <div style="page-break-before: always;"></div>

                            <li style="margin-top: 100px;">
                                <strong>7-9 Yoga:</strong> (Spiritual Destiny Yoga)
                                <ul>
                                    <li>Meant for greater purpose or service to humanity.</li>
                                    <li>Often involved in spiritual leadership, writing, or global missions.</li>
                                    <li>Can be misunderstood or feel disconnected from society.</li>
                                </ul>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>


            {{-- 4. AD Yogas Predictions --}}
            <div class="section">
                <div class="card">
                    <div class="card-header">
                        AD Yogas Predictions
                    </div>
                    <div class="card-body">

                        @if(isset($result['ad_chart']))
                            <table>
                                <tr>
                                    <td width="80%">From Date</td>
                                    <td width="20%">{{ $result['ad_chart']['from_date'] ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td>To Date</td>
                                    <td>{{ $result['ad_chart']['to_date'] ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td>Dasha</td>
                                    <td>{{ $result['ad_chart']['dasha'] ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td>Antardasha</td>
                                    <td>{{ $result['ad_chart']['antardasha'] ?? '' }}</td>
                                </tr>
                            </table>

                            @php
                                $ad_chart = isset($result['ad_chart']['data'])
                                    ? explode(',', $result['ad_chart']['data'])
                                    : [];
                                $ad_chart = array_pad($ad_chart, 9, '');
                            @endphp

                            <table class="text-center">
                                <tr>
                                    <td>{{ $ad_chart[0] }}</td>
                                    <td>{{ $ad_chart[1] }}</td>
                                    <td>{{ $ad_chart[2] }}</td>
                                </tr>
                                <tr>
                                    <td>{{ $ad_chart[3] }}</td>
                                    <td>{{ $ad_chart[4] }}</td>
                                    <td>{{ $ad_chart[5] }}</td>
                                </tr>
                                <tr>
                                    <td>{{ $ad_chart[6] }}</td>
                                    <td>{{ $ad_chart[7] }}</td>
                                    <td>{{ $ad_chart[8] }}</td>
                                </tr>
                            </table>
                        @endif
                <div style="page-break-before: always;"></div>

                        <h4 class="mt-5">AD Yogas Interpretations</h4>
                        {{-- same bullet content as MD --}}
                        <ul>
                            <li>
                                <strong>1-9 Yoga:</strong> (e.g., Day = 1, Life Path = 9)
                                <ul>
                                    <li>A strong leader with universal goals.</li>
                                    <li>Often seen in visionaries, reformers, or spiritual leaders.</li>
                                    <li>However, can struggle with isolation or pressure.</li>
                                </ul>
                            </li>
                            <li>
                                <strong>2-7 Yoga:</strong> (e.g., Day = 2, Life Path = 7)
                                <ul>
                                    <li>A deeply intuitive and spiritual combination.</li>
                                    <li>Can lead to psychic sensitivity or a solitary life.</li>
                                    <li>Great for healers, artists, mystics.</li>
                                </ul>
                            </li>
                            <li>
                                <strong>3-6 Yoga:</strong> (e.g., Day = 3, Life Path = 6)
                                <ul>
                                    <li>Strong creative and family-centered energy.</li>
                                    <li>Often leads to careers in art, beauty, or teaching.</li>
                                    <li>Must balance self-expression and responsibility.</li>
                                </ul>
                            </li>
                            <li>
                                <strong>4-8 Yoga:</strong> (Karmic or Saturnian Yoga)
                                <ul>
                                    <li>A tough karma combination.</li>
                                    <li>Hardworking but may face delays or repeated tests.</li>
                                    <li>When balanced, they become masters of endurance and success through effort.</li>
                                </ul>
                            </li>
                            <li>
                                <strong>7-9 Yoga:</strong> (Spiritual Destiny Yoga)
                                <ul>
                                    <li>Meant for greater purpose or service to humanity.</li>
                                    <li>Often involved in spiritual leadership, writing, or global missions.</li>
                                    <li>Can be misunderstood or feel disconnected from society.</li>
                                </ul>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
             <div style="page-break-before: always;"></div>
            {{-- 5. PD Yogas Predictions --}}
            <div class="section">
                <div class="card">
                    <div class="card-header">
                        PD Yogas Predictions
                    </div>
                    <div class="card-body">

                        @if(isset($result['pd_chart']))
                            <table>
                                <tr>
                                    <td width="80%">From Date</td>
                                    <td width="20%">{{ $result['pd_chart']['from_date'] ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td>To Date</td>
                                    <td>{{ $result['pd_chart']['to_date'] ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td>Dasha</td>
                                    <td>{{ $result['pd_chart']['dasha'] ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td>Antardasha</td>
                                    <td>{{ $result['pd_chart']['antardasha'] ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td>Pratyantardasha</td>
                                    <td>{{ $result['pd_chart']['pratyantardasha'] ?? '' }}</td>
                                </tr>
                            </table>

                            @php
                                $pd_chart = isset($result['pd_chart']['data'])
                                    ? explode(',', $result['pd_chart']['data'])
                                    : [];
                                $pd_chart = array_pad($pd_chart, 9, '');
                            @endphp

                            <table class="text-center">
                                <tr>
                                    <td>{{ $pd_chart[0] }}</td>
                                    <td>{{ $pd_chart[1] }}</td>
                                    <td>{{ $pd_chart[2] }}</td>
                                </tr>
                                <tr>
                                    <td>{{ $pd_chart[3] }}</td>
                                    <td>{{ $pd_chart[4] }}</td>
                                    <td>{{ $pd_chart[5] }}</td>
                                </tr>
                                <tr>
                                    <td>{{ $pd_chart[6] }}</td>
                                    <td>{{ $pd_chart[7] }}</td>
                                    <td>{{ $pd_chart[8] }}</td>
                                </tr>
                            </table>
                        @endif

                        <h4 class="mt-5">PD Yogas Interpretations</h4>
                        {{-- same bullet content again --}}
                        <ul>
                            <li>
                                <strong>1-9 Yoga:</strong> (e.g., Day = 1, Life Path = 9)
                                <ul>
                                    <li>A strong leader with universal goals.</li>
                                    <li>Often seen in visionaries, reformers, or spiritual leaders.</li>
                                    <li>However, can struggle with isolation or pressure.</li>
                                </ul>
                            </li>
                            <li>
                                <strong>2-7 Yoga:</strong> (e.g., Day = 2, Life Path = 7)
                                <ul>
                                    <li>A deeply intuitive and spiritual combination.</li>
                                    <li>Can lead to psychic sensitivity or a solitary life.</li>
                                    <li>Great for healers, artists, mystics.</li>
                                </ul>
                            </li>
                            <li>
                                <strong>3-6 Yoga:</strong> (e.g., Day = 3, Life Path = 6)
                                <ul>
                                    <li>Strong creative and family-centered energy.</li>
                                    <li>Often leads to careers in art, beauty, or teaching.</li>
                                    <li>Must balance self-expression and responsibility.</li>
                                </ul>
                            </li>
                            <li>
                                <strong>4-8 Yoga:</strong> (Karmic or Saturnian Yoga)
                                <ul>
                                    <li>A tough karma combination.</li>
                                    <li>Hardworking but may face delays or repeated tests.</li>
                                    <li>When balanced, they become masters of endurance and success through effort.</li>
                                </ul>
                            </li>
                            <li>
                                <strong>7-9 Yoga:</strong> (Spiritual Destiny Yoga)
                                <ul>
                                    <li>Meant for greater purpose or service to humanity.</li>
                                    <li>Often involved in spiritual leadership, writing, or global missions.</li>
                                    <li>Can be misunderstood or feel disconnected from society.</li>
                                </ul>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
             <div style="page-break-before: always;"></div>

            {{-- 6. Lifetime Remedy --}}
            <div class="section">
                <div class="card">
                    <div class="card-header">
                        Lifetime Remedy
                    </div>
                    <div class="card-body">
                        <table class="remedies-table">
                            <tr class="header-row">
                                <td class="header-cell" colspan="6">REMEDIES</td>
                            </tr>

                            @php $counter = 1; @endphp

                            @if($result['bn_remedy'] && $result['bn_remedy']['bn'])
                                <tr class="content-row">
                                    <td class="number-cell">{{ $counter++ }}</td>
                                    <td class="birth-node">BN: {{ $result['bn_single'] }}</td>
                                    <td colspan="4">{!! nl2br(e($result['bn_remedy']['bn'])) !!}</td>
                                </tr>
                            @endif

                            @if($result['dn_remedy'] && $result['dn_remedy']['dn'])
                                <tr class="content-row">
                                    <td class="number-cell">{{ $counter++ }}</td>
                                    <td class="birth-node">DN: {{ $result['dn_single'] }}</td>
                                    <td colspan="4">{!! nl2br(e($result['dn_remedy']['dn'])) !!}</td>
                                </tr>
                            @endif

                            @if(
                                (!$result['bn_remedy'] || !$result['bn_remedy']['bn']) &&
                                (!$result['dn_remedy'] || !$result['dn_remedy']['dn']) &&
                                (!$result['nn_remedy'] || !$result['nn_remedy']->nn)
                            )
                                <tr class="content-row">
                                    <td colspan="6" style="text-align: center; padding: 30px; color: #666;">
                                        <em>
                                            No specific remedies available for your calculated numbers.
                                            Please consult with an administrator to add remedies for
                                            Birth Number {{ $result['bn_single'] }},
                                            Destiny Number {{ $result['dn_single'] }},
                                            and Name Number {{ $result['nn_single'] }}.
                                        </em>
                                    </td>
                                </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </div>

            {{-- 7. Dasha Remedy MD, AD, PD --}}
            <div class="section">
                <div class="card">
                    <div class="card-header">
                        Dasha Remedy MD, AD, PD
                    </div>
                    <div class="card-body">

                        <h4>Mahadasha (MD) - Dasha Remedy</h4>
                        <table>
                            <tbody>
                                <tr><th style="width: 20%;">Planet</th><td>{{ $result['dr_md']['planet'] ?? '' }}</td></tr>
                                <tr><th>Gemstone</th><td>{{ $result['dr_md']['gemstone'] ?? '' }}</td></tr>
                                <tr><th>Color</th><td>{{ $result['dr_md']['color'] ?? '' }}</td></tr>
                                <tr><th>Day</th><td>{{ $result['dr_md']['day'] ?? '' }}</td></tr>
                                <tr><th>Donation</th><td>{{ $result['dr_md']['donation'] ?? '' }}</td></tr>
                                <tr><th>Mantra</th><td><em>{{ $result['dr_md']['mantra'] ?? '' }}</em></td></tr>
                                <tr><th>Remedy</th><td>{{ $result['dr_md']['remedy'] ?? '' }}</td></tr>
                            </tbody>
                        </table>

                        <h4 class="mt-5">Antardasha (AD) - Dasha Remedy</h4>
                        <table>
                            <tbody>
                                <tr><th style="width: 20%;">Planet</th><td>{{ $result['dr_ad']['planet'] ?? '' }}</td></tr>
                                <tr><th>Gemstone</th><td>{{ $result['dr_ad']['gemstone'] ?? '' }}</td></tr>
                                <tr><th>Color</th><td>{{ $result['dr_ad']['color'] ?? '' }}</td></tr>
                                <tr><th>Day</th><td>{{ $result['dr_ad']['day'] ?? '' }}</td></tr>
                                <tr><th>Donation</th><td>{{ $result['dr_ad']['donation'] ?? '' }}</td></tr>
                                <tr><th>Mantra</th><td><em>{{ $result['dr_ad']['mantra'] ?? '' }}</em></td></tr>
                                <tr><th>Remedy</th><td>{{ $result['dr_ad']['remedy'] ?? '' }}</td></tr>
                            </tbody>
                        </table>

                        <h4 class="mt-5">Pratyantardasha (PD) - Dasha Remedy</h4>
                        <table>
                            <tbody>
                                <tr><th style="width: 20%;">Planet</th><td>{{ $result['dr_pd']['planet'] ?? '' }}</td></tr>
                                <tr><th>Gemstone</th><td>{{ $result['dr_pd']['gemstone'] ?? '' }}</td></tr>
                                <tr><th>Color</th><td>{{ $result['dr_pd']['color'] ?? '' }}</td></tr>
                                <tr><th>Day</th><td>{{ $result['dr_pd']['day'] ?? '' }}</td></tr>
                                <tr><th>Donation</th><td>{{ $result['dr_pd']['donation'] ?? '' }}</td></tr>
                                <tr><th>Mantra</th><td><em>{{ $result['dr_pd']['mantra'] ?? '' }}</em></td></tr>
                                <tr><th>Remedy</th><td>{{ $result['dr_pd']['remedy'] ?? '' }}</td></tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
             <div style="page-break-before: always;"></div>
            {{-- 8. Yantras BN, DN --}}
            <div class="section">
                <div class="card">
                    <div class="card-header">
                        Yantras BN, DN
                    </div>
                    <div class="card-body">

                        <h4 class="mt-2">BN Yantra</h4>
                        <div>
                            {!! $result['yantra_bn'] ?? '' !!}
                        </div>

                        <h4 class="mt-5">DN Yantra</h4>
                        <div>
                            {!! $result['yantra_dn'] ?? '' !!}
                        </div>

                    </div>
                </div>
            </div>
             <div style="page-break-before: always;"></div>
            {{-- 9. Lucky Elements --}}
            <div class="section">
                <div class="card">
                    <div class="card-header">
                        Lucky Elements
                    </div>
                    <div class="card-body">
                        <p class="text-muted">Lucky elements will be displayed here.</p>

                        <table>
                            <tr>
                                <th width="50%"><strong>Lucky Number</strong></th>
                                <th>{{ $result['chars']['lucky_number'] ?? '' }}</th>
                            </tr>
                            <tr>
                                <th><strong>Lucky Color</strong></th>
                                <th>{{ $result['chars']['colors'] ?? '' }}</th>
                            </tr>
                            <tr>
                                <th><strong>Lucky Direction</strong></th>
                                <th>{{ $result['chars']['direction'] ?? '' }}</th>
                            </tr>
                            <tr>
                                <th><strong>Supportive Number</strong></th>
                                <th>{{ $result['chars']['supportive_number'] ?? '' }}</th>
                            </tr>
                            <tr>
                                <th><strong>Missing Number</strong></th>
                                <th>{{ $result['chars']['missing_number'] ?? '' }}</th>
                            </tr>
                            <tr>
                                <th><strong>Avoidable Color</strong></th>
                                <th>Blue, Black</th>
                            </tr>
                        </table>

                        <hr>

                        <h4>Characteristics</h4>
                        <ul>
                            @if(isset($result['chars']['characterstics']))
                                @foreach($result['chars']['characterstics'] as $chr)
                                    <li class="p-2">{{ $chr }}</li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
          <div style="page-break-before: always;"></div>

            {{-- 10. Spell Jar Remedy --}}
            <div class="section" style="margin-top: 100px;">
                <div class="card">
                    <div class="card-header">
                        Spell Jar Remedy
                    </div>
                    <div class="card-body">
                        @if(isset($result['spell_jars']) && is_array($result['spell_jars']))
                            @foreach ($result['spell_jars'] as $jar)
                                <h4 class="mt-4">{{ $jar['title'] ?? '' }}</h4>
                                <table>
                                    <tbody>
                                        <tr>
                                            <th style="width: 20%;">Jar Type</th>
                                            <td>{{ $jar['jar_type'] ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Ingredients</th>
                                            <td>
                                                @if(isset($jar['ingredients']) && is_array($jar['ingredients']))
                                                    <ul style="margin: 0 0 0 16px;">
                                                        @foreach($jar['ingredients'] as $item)
                                                            <li>{{ $item }}</li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Method</th>
                                            <td>
                                                @if(isset($jar['method']) && is_array($jar['method']))
                                                    <ol style="margin: 0 0 0 16px;">
                                                        @foreach($jar['method'] as $step)
                                                            <li>{{ $step }}</li>
                                                        @endforeach
                                                    </ol>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Placement</th>
                                            <td>{{ $jar['placement'] ?? '' }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

        </div> {{-- card-body main --}}
    </div> {{-- outer card --}}

</body>
</html>
