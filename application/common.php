<?php

// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

//将 PHPMailer类导入全局命名空间
//这些必须位于脚本的顶部，而不是在函数内
/**
 * 发送邮箱
 * @param type $data 邮箱队列数据 包含邮箱地址 内容
 */
function sendEmail($data = []) {
    Vendor('phpmailer.phpmailer');
    $mail = new \phpmailer\PHPMailer(); //实例化

    $mail->IsSMTP(); // 启用SMTP
    $mail->Host = 'smtp.126.com'; //SMTP服务器 以126邮箱为例子
    $mail->Port = 465;  //邮件发送端口
    $mail->SMTPAuth = true;  //启用SMTP认证
    $mail->SMTPSecure = "ssl";   // 设置安全验证方式为ssl

    $mail->CharSet = "UTF-8"; //字符集
    $mail->Encoding = "base64"; //编码方式

    $mail->Username = 'changchunsinger@126.com';  //你的邮箱
    $mail->Password = 'ycc15082730141';  //你的密码
    $mail->Subject = "注册管理员账户成功!"; //邮件标题

    $mail->From = 'changchunsinger@126.com';  //发件人地址（也就是你的邮箱）
    $mail->FromName = '长春个人博客-注册账号';  //发件人姓名

    if($data && is_array($data)){
        foreach ($data as $k=>$v){
            $mail->AddAddress($v['user_email']); //添加收件人（地址，昵称）
            $mail->IsHTML(true); //支持html格式内容
            $mail->Body = $v['content']; //邮件主体内容

            //发送成功就删除
            if ($mail->Send()) {
                return 1;
            }else{
                echo "Mailer Error: ".$mail->ErrorInfo;// 输出错误信息
            }
        }
    }
}

//  前台注册验证发送
 function mel($toemail,  $desc_url){
         Vendor('phpmailer.phpmailer');
         $mail = new \phpmailer\PHPMailer(); //实例化
         $mail->isSMTP();// 使用SMTP服务
         $mail->CharSet = "utf8";// 编码格式为utf8，不设置编码的话，中文会出现乱码
         $mail->Host = "smtp.163.com";// 发送方的SMTP服务器地址
         $mail->SMTPAuth = true;// 是否使用身份验证
         $mail->Username = "chunchunsinger@163.com";// 发送方的163邮箱用户名，就是你申请163的SMTP服务使用的163邮箱</span><span style="color:#333333;">
         $mail->Password = 'NPCSQEFRJRDMOTBA';// 发送方的邮箱密码，注意用163邮箱这里填写的是“客户端授权密码”而不是邮箱的登录密码！</span><span style="color:#333333;">
         $mail->SMTPSecure = "ssl";// 使用ssl协议方式</span><span style="color:#333333;">
         $mail->Port = 994;// 163邮箱的ssl协议方式端口号是465/994
         $mail->setFrom("chunchunsinger@163.com","作者");// 设置发件人信息，如邮件格式说明中的发件人，这里会显示为Mailer(xxxx@163.com），Mailer是当做名字显示
         $mail->addAddress($toemail,'博客回复消息');// 设置收件人信息，如邮件格式说明中的收件人，这里会显示为Liang(yyyy@163.com)
         $mail->addReplyTo("chunchunsinger@163.com","春春春");// 设置回复人信息，指的是收件人收到邮件后，如果要回复，回复邮件将发送到的邮箱地址
         //$mail->addCC("xxx@163.com");// 设置邮件抄送人，可以只写地址，上述的设置也可以只写地址(这个人也能收到邮件)
         //$mail->addBCC("xxx@163.com");// 设置秘密抄送人(这个人也能收到邮件)
         //$mail->addAttachment("bug0.jpg");// 添加附件
         $mail->Subject = "阅读-激活邮箱";// 邮件标题
         $mail->Body = "点击链接激活邮箱:".$desc_url;// 邮件正文
         //$mail->AltBody = "This is the plain text纯文本";// 这个是设置纯文本方式显示的正文内容，如果不支持Html方式，就会用到这个，基本无用

         if(!$mail->send()){// 发送邮件
//             echo 22;
             return $mail->ErrorInfo;
         // echo "Message could not be sent.";
         // echo "Mailer Error: ".$mail->ErrorInfo;// 输出错误信息
         }else{
             return 1;
         }
 }

//把span字符串替换成a标签
function replace($data) {
    return str_replace('span', 'a', $data);
}

//  base64加密本项目中没有用到
function urlsafe_b64encode($string, $str) {
    $data = base64_encode($string).base64_encode($str);
//  不加这个
//  $data = str_replace(array('+','/','='),array('-','_',''),$data);
  return $data;
}

//把字符串转换为数组
function strToArray($data) {
    return explode('|', $data);
}









//function VerifyController()
//{
//    /*
//     * 生成验证码方法
//     */
//    return Captcha(
//        $config = array(
//        'fontSize'  =>  14,              // 验证码字体大小(px)
//        'useCurve'  =>  true,            // 是否画混淆曲线
//        'useNoise'  =>  true,            // 是否添加杂点
//        'imageH'    =>  0,               // 验证码图片高度
//        'imageW'    =>  0,               // 验证码图片宽度
//        'length'    =>  5,               // 验证码位数
//    ));
//}