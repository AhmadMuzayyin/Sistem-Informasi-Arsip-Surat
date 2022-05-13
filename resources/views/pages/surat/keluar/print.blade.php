<html>

<head>
    <title>{{ $surat->tujuan }}</title>
    <style>
        body {
            width: 230mm;
            height: 100%;
            margin: 0 auto;
            padding: 0;
            font-size: 12pt;
            background: rgb(204, 204, 204);
        }

        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }

        .main-page {
            width: 210mm;
            min-height: 330mm;
            margin: 10mm auto;
            background: white;
            box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
        }

        .sub-page {
            padding: 0.1cm;
            height: 330mm;
        }

        @page {
            size: F4;
            margin: 0;
        }

        @media print {

            html,
            body {
                width: 210mm;
                height: 330mm;
            }

            .main-page {
                margin: 0;
                border: initial;
                border-radius: initial;
                width: initial;
                min-height: initial;
                box-shadow: initial;
                background: initial;
                page-break-after: always;
            }
        }

    </style>
</head>

<body>
    <div class="main-page">
        <div class="sub-page">
            <h3 align='center'>
                {{ strtoupper($surat->institution->nama) }}
            </h3>
            <strong>
                <p align="center" style="font-size: 11px; margin-top: -2%">Badan Hukum Yayasan Annuqayah:</p>
                <p align="center" style="font-size: 11px; margin-top: -1%">{{ $surat->institution->no_badan_hukum }}
                </p>
                <p align="center" style="font-size: 11px; margin-top: -1%">Alamat:
                    {{ $surat->institution->alamat . ' ' . $surat->institution->kode_pos }} Telp:
                    {{ $surat->institution->telepon }}
                </p>
                <p align="center" style="font-size: 11px; margin-top: -1%"">Email: <a href="
                    mailto:{{ $surat->institution->email }}">{{ $surat->institution->email }}</a>
                </p>
            </strong>
            <hr size=" 4" color="black">
            <div align="left">
                <p style="margin-bottom: -2%">Nomor<span style="margin-left: 5%">: {{ $surat->nomor_surat }}</span>
                </p>
                <p style="margin-bottom: -2%">Hal<span style="margin-left: 8.5%;">: {{ $surat->perihal }}</span> </p>
                <p>Lampiran<span style="margin-left: 2.5%;">:
                        {{ $surat->lampiran ?? '-' }}</span>
                </p>
            </div>
            <div align="right" style="margin-top: -11%">
                <strong>
                    {{ $surat->institution->alamat }}
                </strong>
            </div>
            <p style="margin-left: 12%; margin-top: 10%">
                Kepada Yth,<br />
                <strong>
                    {{ $surat->tujuan }} <br />
                    di Lingkungan Pondok Pesantren Annuqayah Guluk-Guluk
                </strong>
            </p>
        </div>
    </div>
</body>

</html>
