<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quotation</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
        }

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

        #tbl_customer_details td{
            font-size: 13px;
        }
        
        #div_tour_details p{
            margin: 2px 0;
            font-size: 12px;
        }

        #div_terms_conditions p{
            font-size: 14px;
            margin: 5px 0;
        }
        #div_terms_conditions li{
            font-size: 13px;
        }

        #p_signature{
            font-family: 'Courier New', Courier, monospace;
            font-size: 12px;
        }

        #div_qr_code p{
            margin-top: 5px;
            font-size: 12px;
        }

        #div_footer{
            position: absolute;
            bottom: 10px;
            left: 5px;
        }
        #div_footer p{
            font-size: 12px;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <td width="20%" style="vertical-align: middle;">
                <img src="{{ public_path('images/company/logo_1.png') }}" alt="" id="img_logo">
            </td>
            <td width="40%">
                <h2 style="margin: 0 0 0 10px;">Akagi eXperiences</h2>
                <h4 style="margin: 0 0 0 10px;">Quotation</h4>
                <p style="margin: 0 0 0 10px;">Somewhere in Japan, Japan</p>
                <p style="margin: 0 0 0 10px;">akagisales@akagi.com</p>
            </td>
            <td width="40%" style="vertical-align: middle; text-align:right;">
                QuotationNo: <b>{{ $quotation->quotation_no }}</b><br>
                Valid until: <b>{{ $quotation->valid_until }}</b><br>
                Currency: USD
            </td>
        </tr>
    </table>
    <hr>
    <table id="tbl_customer_details">
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

    {{-- show destinations --}}
    <hr>
    <div id="div_tour_details">
        <p>
            <b>Destinations:</b>
            @foreach ($destinations as $destination)
                {{ $destination->item->name }} | 
            @endforeach
            <br>
            <b>Hotels:</b> 
            @foreach ($hotels as $hotel)
                {{ $hotel->item->name }}
            @endforeach
            <br>
            <b>Activities:</b> 
            @foreach ($activities as $activity)
                {{ $activity->item->name }}
            @endforeach
        </p>
    </div>

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
            <td class="quot_title"><b>Akagi Essential</b></td>
            <td class="quot_title"><b>Akagi Classic</b></td>
            <td class="quot_title"><b>Akagi Signature</b></td>
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
                    @foreach ($package_prices->signature_prices as $price)
                        @php
                            $signature_total += floatVal($price->total_price);
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
    <div id="div_terms_conditions">
        <p>Terms & Conditions</p>
        <ol>
            <li>Rates are quoted in USD and subject to availability at the time of confirmation.</li>
            <li>Hotels and services are subject to availability until booking is confirmed.</li>
            <li>Peak season surcharges may apply during public holidays.</li>
            <li>Any increase in government taxes or entrance fees will be charged accordingly.</li>
            <li>Cancellation charges apply as per hotel and service provider policies.</li>
            <li>This quotation is valid until {{ $quotation->valid_until }}.</li>
        </ol>
    </div>    

    <table width="100%">
        <tr>
            <td width="40%">
                {{-- payment QR code --}}
                <div id="div_qr_code">
                    <p>Scan to proceed for payment</p>

                    <img src="data:image/png;base64,{{ $qr_code }}" width="120">
                </div>
            </td>
            <td>
                {{-- signature --}}
                <p id="p_signature">
                    Digitally generated by Akagi Experiences. <br>
                    No physical signature required.
                </p>
            </td>
        </tr>
    </table>

    <div id="div_footer">
        <p>
            Thank you for choosing <b>Akagi eXperiences</b>. <br>
            We look forward to making your journey unforgettable.
        </p>
        <p>
            Akagi eXperiences | +81 70 6647 1777 | sales@akagiexp.com | akagiexp.com <br>
            License No | Registration No
        </p>
    </div>
</body>
</html>