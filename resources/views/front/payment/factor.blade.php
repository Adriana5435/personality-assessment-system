<!doctype html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.12.0/css/all.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>title changed</title>
</head>
<body>
<section>
    @if (session('error'))
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-error alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <i class="icon fa fa-ban"></i>
                        {{ session('error') }}
                    </div>
                </div>
            </div>
        </div>
    @endif

        <div class="container the-factor">
        <div id="factor_container">

            <div id="factor_header">
                <div id="header_right">
                    <div id="header_boxr">{{ __('Invoice') }}
                        <span>
                            @if(auth()->user()->gender == 1)
                                {{ __('Ms.') }}
                            @else
                                {{ __('Mr.') }}
                            @endif
                         </span>
                        :<span> {{ auth()->user()->name }}</span>
                    </div>
                </div>
                <div id="header_center">
                    <div id="center_top"><h3>{{ __('Sales Invoice') }}</h3></div>
                </div>
                <div id="header_left">
                    <div id="header_boxl">{{ __('Date') }}:<input id="input3" type="text" value=""></div>
                    <div id="header_boxl">{{ __('Invoice Number') }}<input id="input4" type="text"></div>
                </div>
            </div>

            <div id="factor_body">
                <table class="table1">
                    <tbody><tr>
                        <td width="5%">
                            {{ __('Row') }}
                        </td>
                        <td width="35%">
                            {{ __('Test Name') }}
                        </td>
                        <td width="10%">
                            {{ __('Quantity') }}
                        </td>
                        <td width="25%">
                            {{ __('Unit Price (Toman)') }}
                        </td>
                        <td width="25%">
                            {{ __('Total Amount (Toman)') }}
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td style="background-color: rgb(255, 255, 255);">
                            {{ $questionnaire->title }}
                        </td>
                        <td style="background-color: rgb(255, 255, 255);">
                            1
                        </td>
                        <td>
                            {{ number_format($questionnaire->price) }}
                        </td>
                        <td class="trsum" style="background-color: rgb(255, 255, 255);">
                            {{ number_format($questionnaire->price) }}
                        </td>
                    </tr>
                    </tbody></table>
                <table class="table2">
                    <tbody><tr>
                        <td width="150">
                            {{ __('Total Invoice Amount') }}
                        </td>
                        <td class="total">
                            {{ number_format($questionnaire->price) }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            {{ __('Value Added Tax') }}
                        </td>
                        <td class="maliat">
                            -
                        </td>
                    </tr>
                    <tr>
                        <td>
                            {{ __('Discount') }}
                        </td>
                        <td class="takhfif">
                            -
                        </td>
                    </tr>
                    <tr>
                        <td>
                            {{ __('Amount Payable') }}
                        </td>
                        <td class="alltotal">
                            {{ number_format($questionnaire->price) }}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div id="factor_footer">
                <div id="footer_top">{{ __('Description') }}:
                    {{ $questionnaire->description }}
                </div>
            </div>
            <center style="-webkit-print-color-adjust: exact;color-adjust: exact !important; height: 20px;overflow: hidden;margin-bottom: 10px;"><div style="font-size:0;position:relative;width:708px;height:30px;">
                    <div style="background-color:black;width:4px;height:30px;position:absolute;left:0px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:2px;height:30px;position:absolute;left:6px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:6px;height:30px;position:absolute;left:12px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:2px;height:30px;position:absolute;left:22px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:4px;height:30px;position:absolute;left:28px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:6px;height:30px;position:absolute;left:34px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:8px;height:30px;position:absolute;left:44px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:2px;height:30px;position:absolute;left:54px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:2px;height:30px;position:absolute;left:62px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:4px;height:30px;position:absolute;left:66px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:2px;height:30px;position:absolute;left:76px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:2px;height:30px;position:absolute;left:82px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:2px;height:30px;position:absolute;left:88px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:6px;height:30px;position:absolute;left:94px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:4px;height:30px;position:absolute;left:102px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:2px;height:30px;position:absolute;left:110px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:8px;height:30px;position:absolute;left:114px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:6px;height:30px;position:absolute;left:124px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:2px;height:30px;position:absolute;left:132px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:2px;height:30px;position:absolute;left:136px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:4px;height:30px;position:absolute;left:142px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:2px;height:30px;position:absolute;left:154px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:6px;height:30px;position:absolute;left:158px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:8px;height:30px;position:absolute;left:166px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:4px;height:30px;position:absolute;left:176px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:2px;height:30px;position:absolute;left:186px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:2px;height:30px;position:absolute;left:192px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:4px;height:30px;position:absolute;left:198px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:2px;height:30px;position:absolute;left:206px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:2px;height:30px;position:absolute;left:214px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:6px;height:30px;position:absolute;left:220px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:2px;height:30px;position:absolute;left:228px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:4px;height:30px;position:absolute;left:236px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:2px;height:30px;position:absolute;left:242px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:8px;height:30px;position:absolute;left:246px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:6px;height:30px;position:absolute;left:256px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:2px;height:30px;position:absolute;left:264px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:2px;height:30px;position:absolute;left:268px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:4px;height:30px;position:absolute;left:274px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:6px;height:30px;position:absolute;left:286px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:2px;height:30px;position:absolute;left:294px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:4px;height:30px;position:absolute;left:300px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:6px;height:30px;position:absolute;left:308px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:2px;height:30px;position:absolute;left:316px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:4px;height:30px;position:absolute;left:322px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:2px;height:30px;position:absolute;left:330px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:4px;height:30px;position:absolute;left:336px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:6px;height:30px;position:absolute;left:344px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:6px;height:30px;position:absolute;left:352px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:2px;height:30px;position:absolute;left:362px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:4px;height:30px;position:absolute;left:366px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:6px;height:30px;position:absolute;left:374px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:2px;height:30px;position:absolute;left:384px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:4px;height:30px;position:absolute;left:388px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:2px;height:30px;position:absolute;left:396px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:4px;height:30px;position:absolute;left:402px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:6px;height:30px;position:absolute;left:410px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:4px;height:30px;position:absolute;left:418px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:2px;height:30px;position:absolute;left:426px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:6px;height:30px;position:absolute;left:432px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:4px;height:30px;position:absolute;left:440px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:2px;height:30px;position:absolute;left:448px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:6px;height:30px;position:absolute;left:452px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:2px;height:30px;position:absolute;left:462px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:4px;height:30px;position:absolute;left:468px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:6px;height:30px;position:absolute;left:476px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:4px;height:30px;position:absolute;left:484px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:6px;height:30px;position:absolute;left:492px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:2px;height:30px;position:absolute;left:502px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:4px;height:30px;position:absolute;left:506px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:6px;height:30px;position:absolute;left:512px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:2px;height:30px;position:absolute;left:522px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:2px;height:30px;position:absolute;left:528px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:6px;height:30px;position:absolute;left:534px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:4px;height:30px;position:absolute;left:542px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:2px;height:30px;position:absolute;left:550px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:2px;height:30px;position:absolute;left:554px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:4px;height:30px;position:absolute;left:560px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:2px;height:30px;position:absolute;left:572px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:6px;height:30px;position:absolute;left:576px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:8px;height:30px;position:absolute;left:584px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:2px;height:30px;position:absolute;left:594px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:2px;height:30px;position:absolute;left:600px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:4px;height:30px;position:absolute;left:610px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:8px;height:30px;position:absolute;left:616px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:2px;height:30px;position:absolute;left:626px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:2px;height:30px;position:absolute;left:634px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:6px;height:30px;position:absolute;left:638px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:2px;height:30px;position:absolute;left:650px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:4px;height:30px;position:absolute;left:654px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:8px;height:30px;position:absolute;left:660px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:2px;height:30px;position:absolute;left:674px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:2px;height:30px;position:absolute;left:678px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:4px;height:30px;position:absolute;left:682px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:6px;height:30px;position:absolute;left:692px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:2px;height:30px;position:absolute;left:700px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:4px;height:30px;position:absolute;left:704px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:0px;height:30px;position:absolute;left:708px;top:0px;">&nbsp;</div>
                    <div style="background-color:black;width:0px;height:30px;position:absolute;left:708px;top:0px;">&nbsp;</div>
                </div>
            </center>
        </div>

    </div>
    <div class="container" style="text-align: center">
        <form action="{{ route('front.payment.redirect', $questionnaire->id) }}" method="post">
            @csrf
            <input type="submit" value="{{ __('Payment') }}">
        </form>
    </div>
</section>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>


