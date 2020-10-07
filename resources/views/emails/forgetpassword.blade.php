<!doctype html>
<html  xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            <title>Velocity Vehicle Group</title>
            <style>
                img + div {display:none;}
            </style>
    </head>
    <body>
        <?php
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || !empty($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $domainName = (!empty($_SERVER['HTTP_HOST']) && $_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : "";
        if ($domainName == "") {
            $protocol = rtrim(env('APP_HOST', 'https://staging.jam-app.com/'), "/");
        }
        ?>
        <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="background-color:#ffffff; border-collapse:collapse; border:1px solid #d5d6d7; min-width:600px; font-family:Arial, Helvetica, sans-serif;">
            <tr>
                <td align="left" valign="top" width="600" height="25" style="line-height: 25px; font-size: 25px; background-color:#F9F9F9;"></td>
            </tr>
            <tr>
                <td align="center" valign="top" width="600" height="41" style="background-color:#F9F9F9; min-width:600px;">
                    <a href="#"> <img src="{{ $protocol . $domainName . '/img/logo/logoNewJAM.png' }}" alt="" width="100" height="100" style="display: block; line-height: 0; border: 0; margin: 0; padding: 0;"> </a>
                </td>
            </tr>
            <tr>
                <td align="left" valign="top" width="600" height="25" style="line-height: 25px; font-size: 25px; background-color:#F9F9F9;"></td>
            </tr>
            <tr>
                <td align="left" valign="top" width="600" height="50" style="line-height: 50px; font-size: 50px;"></td>
            </tr>
            <tr> <!--internal table-->
                <td align="center" valign="top" width="600" style-="min-width:600px;">
                    <table align="center" border="0" cellpadding="0" cellspacing="0" width="520" style="border-collapse:collapse; min-width:520px;">
                        <tr>
                            <td align="left" valign="top" width="520" style="font-size: 15px; color:#333333; line-height: 20px; font-family:Arial, Helvetica, sans-serif;">
                                {{-- {{$controller_exception != ""  ? "" : ""}} --}}
                                Forget Password
                            </td>
                        </tr>
                        <tr>
                            <td align="left" valign="top" width="520" height="40" style="line-height: 40px; font-size: 40px;"></td>
                        </tr>
                        <tr>
                            <td align="left" valign="top" width="520" style="font-size: 14px; color:#333333; line-height: 20px; font-family:Arial, Helvetica, sans-serif;">
                                {{-- {{$exception}} --}}
                                Your forget password verification OTP is {{ $otp }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr> <!--internal table-->
            <tr>
                <td align="left" valign="top" width="600" height="50" style="line-height: 50px; font-size: 50px;"></td>
            </tr>
            <tr>
                <td align="left" valign="top" width="600" height="5" style="line-height: 5px; font-size: 5px; background-color:#115592;">
                    <span style="display: none;" class='apphost'>{{env("APP_HOST","app_host")}}</span>
                </td>
            </tr>
        </table>
    </body>
</html>
