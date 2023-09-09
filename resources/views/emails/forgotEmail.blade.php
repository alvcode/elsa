@php
    $domain = Config::get('app.url');
    $numbers = str_split($forgot_email_code);
@endphp
<x-body>
    <x-slot:content>
        <style>
            .content-table{
                border-collapse: collapse;
                border-radius: 30px;
                overflow: hidden;
                padding-top: 100px;
            }
            .main-text{
                font-size: 36px;
                font-weight: 500;
                color: #ffffff;
                position: relative;
                line-height: 38px;
            }
            .white-round{
                text-align: right;
            }
            .dont-say{
                margin-top: 30px;
                font-size: 18px;
                font-weight: 500;
                color: #ffffff;
            }
            .round{
                width: 80px;
                height: 70px;
            }
            .round > div{
                font-size: 36px;
                font-weight: 700;
                color: #0029FF;
                line-height: 70px;
                width: 70px;
                height: 70px;
                background-color: #fff;
                text-align: center;
                border-radius: 78px;
                margin: 0 auto;
            }
            .signature{
                font-size: 18px;
                font-weight: 500;
                color: #ffffff;
                margin-top: 35px;
            }
        </style>
        <tr>
            <td style="padding-top: 90px;">
                <table class="content-table" width="536" align="center" cellspacing="0" cellpadding="0" bgcolor="0029FF" style="padding: 15px;">
                    <tbody>
                    <tr>
                        <td style="padding-top: 35px; padding-left: 35px;">
                            <div class="main-text">Здравствуйте!</div>
                            <div class="main-text">Ваш код</div>
                            <div class="main-text">для сброса пароля</div>
                            <div class="main-text">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td width="280">учетной записи</td>
                                            <td width="180" class="white-round">
                                            <div>
                                                <img src="{{$domain}}/img/white_round.png" alt="round">
                                            </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="dont-say">
                                Никому не сообщайте этот код!
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table align="center" style="margin-top: 30px;">
                                <tbody>
                                    <tr>
                                        @foreach ($numbers as $number)
                                            <td class="round">
                                                <div>{{ $number }}</div>
                                            </td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-left: 35px; padding-bottom: 35px;">
                            <div class="signature">
                                С уважением, <br>
                                Команда Elsa.Alert
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </x-slot:content>
</x-body>