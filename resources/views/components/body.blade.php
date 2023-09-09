@include('components/header')
@php
    $domain = Config::get('app.url');
    $email = Config::get('app.contact_email');
    $phone = Config::get('app.contact_phone');
    $app_store_link = Config::get('app.app_store_link');
    $play_store_link = Config::get('app.play_store_link');
@endphp
<body>
<table class="parent-table" width="100%" height="100%" cellspacing="0" cellpadding="0" border="0" align="center" bgcolor="D7D6FF">
    <tbody>
    <tr>
        <td height="20"></td>
    </tr>
    <tr>
        <td>
            <table width="600" cellspacing="0" cellpadding="0" align="center">
                <tbody>
                    
                    <tr class="logo-tr">
                        <td>
                            <div class="logo">
                                <img src="{{$domain}}/img/logo_mail.png" alt="Logo">
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table class="container-table" width="600" cellspacing="0" cellpadding="0" bgcolor="FFFFFF" align="center">
                <tbody>
                <tr>
                    <td>
                        
                    </td>
                </tr>
                
                {{ $content }}
                
                <tr>
                    <td>
                        <table align="center" style="margin-top: 130px;">
                            <tbody>
                                <tr>
                                    <td style="width: 60px;">
                                        <div class="market-button">
                                            <a href="{{$app_store_link}}">
                                                <img src="{{$domain}}/img/app_store.png" alt="AppStore">
                                            </a>
                                        </div>
                                    </td>
                                    <td style="width: 60px;">
                                        <div class="market-button">
                                            <a href="{{$play_store_link}}">
                                                <img src="{{$domain}}/img/google_play.png" alt="GooglePlay">
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table align="center" style="margin-top: 30px;">
                            <tbody>
                                <tr>
                                    <td class="contact-email contact">
                                        {{ $email }}
                                    </td>
                                    <td class="contact-phone contact">
                                        {{ $phone }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div style="width: 500px; margin: 30px auto 0 auto;">
                            <hr class="hr">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div style="margin-top: 40px;" class="logo-bottom">
                            <img src="{{$domain}}/img/logo.png" alt="Logo">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div style="margin-top: 40px;" class="unsubscribe">
                            <a href="#">отписаться от рассылки</a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div style="margin-top: 30px;"></div>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td height="50"></td>
    </tr>

    </tbody>
</table>

</body>
@include('components/footer')