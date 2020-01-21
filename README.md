# Scinable-Auto_MailSender
  
> ip와 메일을 전송할 도메인을 입력받아 자동으로 메일을 전송하는 프로그램  

Xampp를 사용하여 작성한 php를 로컬서버로 로컬서버를 요청할 배치파일을 작성, 후에 윈도우의 작업 스케줄러를 이용해 원하는 시간에 자동으로
메일을 전송하는 프로그램을 구현  

## 배치 파일 작성  

```sh
@Echo off  
start iexplore.exe http://localhost:80/sendMailServer.php  
```  

## 윈도우 작업 스케줄러 사용  

<img src="https://user-images.githubusercontent.com/48575996/72768555-1a49c280-3c3b-11ea-9d40-230f4f74a12c.png" width="80%"></img>
  
