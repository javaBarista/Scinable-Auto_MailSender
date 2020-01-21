<?php
function sendmail($smtp_server, $smtp_user, $name, $from, $to, $subject, $message, $html_yn, $charset ) {

 if (!$smtp_sock = fsockopen("$smtp_server", 25)) {
  die ("Couldn't open mail connection to $smtp_server! \r\n");
 }

 fputs($smtp_sock, "HELO $smtp_server\r\n");
 fgets($smtp_sock,1024);
 //fputs($smtp_sock, "VRFY $stmp_user\r\n");
 fputs($smtp_sock, "MAIL FROM:$from\r\n");
 fgets($smtp_sock,1024);
 fputs($smtp_sock, "RCPT TO:$to\r\n");
 fgets($smtp_sock,1024);
 fputs($smtp_sock, "DATA\r\n");
 fputs($smtp_sock, "From: $from\r\n");
 fputs($smtp_sock, "X-Mailer: php\r\n");
 if ($html_yn) fputs($smtp_sock, "Content-Type: text/html;");
 else fputs($smtp_sock, "Content-Type: text/plain;");
 fputs($smtp_sock, "charset: $charset\r\n");
 fputs($smtp_sock, "MIME-Version: 1.0\r\n");
 fputs($smtp_sock, "Subject: $subject\r\n");
 fputs($smtp_sock, "To: $to\r\n");
 fputs($smtp_sock, "$message");
 fputs($smtp_sock, "\r\n.\r\nQUIT\r\n");
 fclose($smtp_sock);
}

// SMTP SERVER IP
$ip_list = array(
  //insert ip list
);

$food = array(
  '오징어순대',
  '마파두부',
  '모둠 초밥',
  '봉골레 파스타',
  '김치찌개',
  '삼겹살 & 목살',
  '족발',
  '곱창볶음',
  '순대 & 떡볶이',
  '양꼬치 구이',
  '텐동',
  '아이스크림',
  '햄버거',
  '시카고피자',
  '김밥 & 새우튀김',
  '만두 세트',
  '모둠 전'
);
// SMTP SERVER USER
$smtp_user = "Scinable";
// 보내는 사람 이름
$name = "scinable";
// 보내는 사람 주소
$from = "tempuser11@ec-mail.scinable.com";
// 받는 사람 주소
$to_yahoomail = array(
  'sciyh1921@yahoo.com',
  'sciyh1919@yahoo.com',
  'sciyh1917@yahoo.com',
  'hiro.koba@yahoo.com',
  'sciyh1514@yahoo.com'
);

// 메일 형식
$html_yn = false;
// 캐릭터셋
$charset = "UTF-8";

ini_set('max_execution_time', 180);

for($cnt = 0; $cnt < 10; $cnt++){
  $smtp_server = $ip_list[$cnt];

  if($cnt > 4) $from = "tempuser11@ec-mail.scinable.net";

  // 메일 제목
  $randomNum = mt_rand(5, 95);
  $subject = $randomNum." % 할인 행사 쿠폰 발송";

  // 메일 내용
  $timeString = date( 'Y-m-d H:i:s', time() );
  $message = '안녕하세요~ '."\r\n".'오늘도 좋은 하루 보내고 계신가요'."\r\n".'오늘의 세일 아이템은 바로 '.$food[mt_rand(0,16)].' 입니다.'."\r\n".'If this mail into junk mail box, Are you regist my address trust friend'."\r\n".'Thank U for watching'."\r\n".'즐거운 하루 되세요'."\r\n".$timeString;

  for($yah = 0; $yah < 10; $yah++){
      sendmail($smtp_server, $smtp_user, $name, $from, $to_yahoomail[$yah % 5], $subject, $message, $html_yn, $charset);
  }
  sleep(12);
}

?>
