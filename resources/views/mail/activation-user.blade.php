<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Xác nhận đăng kí người dùng</title>
</head>
<body style="margin:0px; background: #f8f8f8; ">
<div width="100%" style="background: #f8f8f8; padding: 0px 0px; font-family:arial; line-height:28px; height:100%;  width: 100%; color: #514d6a;">
    <div style="max-width: 700px; padding:50px 0;  margin: 0px auto; font-size: 14px">
        <div style="padding: 40px; background: #fff;">
            <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                <tbody>
                <tr>
                    <td style="border-bottom:1px solid #f6f6f6;"><h1 style="font-size:14px; font-family:arial; margin:0px; font-weight:bold;">Xin chào!</h1>
                        <p style="margin-top:0px; color:#bbbbbb;">Chúc mừng! Tài khoản của bạn đã được tạo
                            <br>Bạn nhận được email này do hệ thống cần xác thực email trước khi cho phép bạn tham gia hệ thống. Vui lòng nhấn vào liên kết phía dưới để hoàn tất :)
                        </p></td>
                </tr>
                <tr>
                    <td style="padding:10px 0 30px 0;"><p>Nếu bạn không muốn tham hệ thống vui lòng bỏ qua email này. Cảm ơn đã đọc</p>
                        <center>
                            <a href="{{ $user->activation_url }}" style="display: inline-block; padding: 11px 30px; margin: 20px 0px 30px; font-size: 15px; color: #fff; background: #00c0c8; border-radius: 60px; text-decoration:none;">Xác nhận tài khoản</a>
                        </center>
                        <b>- Xin cảm ơn (Ban quản trị)</b> </td>
                </tr>
                <tr>
                    <td  style="border-top:1px solid #f6f6f6; padding-top:20px; color:#777">Nếu nút Xác nhận ở trên không hoạt động, hãy thử sao chép và dán địa chỉ vào thanh địa chỉ trên trình duyệt của bạn. Nếu vấn đề không được giải quyết vui lòng liện hệ về địa chỉ info@themedesigner.in</td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>
</body>
</html>
