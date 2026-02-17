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
        .quot_title{
            background-color: rgb(31, 31, 208);
            color: whitesmoke;
            padding: 5px;
            width: 100%;
        }
        .total_row{
            background-color: gray;
            color: white;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <td width="20%" style="vertical-align: middle;">
                <img src="{{ public_path('images/company/logo_1.png') }}" alt="" id="img_logo">
            </td>
            <td>
                <h2 style="margin: 0 0 0 10px;">Akagi eXperience</h2>
                <h4 style="margin: 0 0 0 10px;">Quotation</h4>
                <p style="margin: 0 0 0 10px;">Somewhere in Japan, Japan</p>
                <p style="margin: 0 0 0 10px;">akagisales@akagi.com</p>
            </td>
            <td width="50%" style="vertical-align: middle; text-align:right;">
                QuotationNo: <b>{{ $quotation->quotation_no }}</b><br>
                Valid until: <b>{{ $quotation->valid_until }}</b><br>
                Currency: USD
            </td>
        </tr>
    </table>
    <hr>
    <table>
        <tr>
            <td>Customer</td>
            <td>: {{ $quotation->tourRequest->customer_name }}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>: {{ $quotation->tourRequest->customer_email }}</td>
        </tr>
        <tr>
            <td>Tour Dates</td>
            <td>: From <b>{{ $quotation->tour->start_date }}</b> To: <b>{{ $quotation->tour->end_date }}</b></td>
        </tr>
    </table>
    <hr>
    @php
        $package_prices = json_decode($quotation->package_prices);
        $essential_total = 0;
        $classic_total = 0;
        $signature_total = 0;
    @endphp
    <h5 style="margin: 5px 0;">Package Details</h5>

    <table style="width: 100%;">
        <tr>
            <td class="quot_title">Akagi Essential</td>
            <td class="quot_title">Akagi Classic</td>
            <td class="quot_title">Akagi Signature</td>
        </tr>

        <tr style="vertical-align: top;"> 
            <td>
                <table style="width: 100%;">
                    @foreach ($package_prices->essential_prices as $price)
                        @php
                            $essential_total += floatVal($price->total_price);
                        @endphp
                        <tr>
                            <td>{{ substr($price->component_type, 11) }}</td>
                            <td>{{ $price->total_price }}</td>
                        </tr>
                    @endforeach 
                    <tr class="total_row">
                        <td>Total</td>
                        <td>{{$essential_total}}</td>
                    </tr>
                </table>                
            </td>
            <td>
                <table style="width: 100%;">
                    @foreach ($package_prices->classic_prices as $price)
                        @php
                            $classic_total += floatVal($price->total_price);
                        @endphp
                        <tr>
                            <td>{{ substr($price->component_type, 11) }}</td>
                            <td>{{ $price->total_price }}</td>
                        </tr>
                    @endforeach
                    <tr class="total_row">
                        <td>Total</td>
                        <td>{{$classic_total}}</td>
                    </tr>
                </table>
            </td>
            <td>
                <table style="width: 100%;">
                    @foreach ($package_prices->classic_prices as $price)
                        @php
                            $signature_total = floatVal($price->total_price);
                        @endphp
                        <tr>
                            <td>{{ substr($price->component_type, 11) }}</td>
                            <td>{{ $price->total_price }}</td>
                        </tr>
                    @endforeach
                    <tr class="total_row">
                        <td>Total</td>
                        <td>{{$signature_total}}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <hr>
    <p>Terms & Conditions</p>
    
</body>
</html>