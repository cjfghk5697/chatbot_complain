<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8"%>
<%@ page import="java.util.Date"%>
<%
	response.setContentType("text/event-stream;charset=UTF-8");
	response.setHeader("Cache-Control", "no-cache");
	response.setHeader("Connection", "keep-alive");

	System.out.println("---- 호출 ----");
	try {
		for (int i = 0; i < 3; i++) {
			Date date = new Date();
			out.write("id: " + date.getTime() + "\n");
			out.write("retry: 50\n"); //Client와 Connection 연결 실패 후 재시도까지 대기시간(ms)
			out.write("data: " + date.toLocaleString() + "\n\n"); //빈라인이 2번 포함되어야 Client의 onmessage 이벤트가 실행!
			out.flush();
			System.out.print( i + " " );
			Thread.currentThread().sleep(1000); //1초 단위로 실행시킨다.
		}
		
		System.out.println("---- 한 주기 끝 ----");
	} catch (InterruptedException e) {
		System.out.print("error");
		e.printStackTrace();
	} catch (Exception e) {
		System.out.print("error");
	}
%>