<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quotation</title>
    <style>
        #div_top{
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }
        #div_logo{
            width: 150px;
        }
        #img_logo{
            width: 100%;
            height: auto;
        }
        /* table packages */
        #tbl_packages{
            width: 100%;
            border-collapse: collapse;
        }
        #tbl_packages th,
        #tbl_packages td{
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <td width="20%" style="vertical-align: middle;">
                <img src="{{ public_path('images/company/akagi_logo_6.png') }}" alt="" id="img_logo">
            </td>
            <td>
                <h2 style="margin: 0 0 0 10px;">Akagi eXperience</h2>
                <h4 style="margin: 0 0 0 10px;">Quotation</h4>
            </td>
            {{-- <td width="50%" style="vertical-align: middle;">
                Thank you for choosing our services. Please find below
                the detailed quotation for your selected tour packages.
            </td> --}}
        </tr>
    </table>
    <hr>
    <table>
        <tr>
            <td width="40%" style="text-align: right;">Quotation No</td>
            <td>: {{ $quotation->quotation_no }}</td>
        </tr>
        <tr>
            <td>Customer</td>
            <td>: {{ $quotation->tourRequest->customer->first_name ." ".$quotation->tourRequest->customer->last_name }}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>: {{ $quotation->tourRequest->customer->email }}</td>
        </tr>
        <tr>
            <td>Tour Dates</td>
            <td>: From <b>{{ $quotation->tour->start_date }}</b> To: <b>{{ $quotation->tour->end_date }}</b></td>
        </tr>
        <tr>
            <td>Valid Until</td>
            <td>: {{ $quotation->valid_until }}</td>
        </tr>
        <tr>
            <td>Currency</td>
            <td>: USD</td>
        </tr>
    </table>
    <hr>
    @php
        $package_prices = json_decode($quotation->package_prices);
    @endphp
    <h5 style="margin-bottom: 0;">Package Totals</h5>
    <table id="tbl_packages">
        <tr>
            @foreach ($package_prices as $price)
               <th>{{ $price->name }}</th>        
            @endforeach
        </tr>
        <tr>
            @foreach ($package_prices as $price)
                <td style="text-align: center;">{{ $price->amount }}</td>        
            @endforeach
        </tr>
    </table>
    <hr>
    
</body>
</html>