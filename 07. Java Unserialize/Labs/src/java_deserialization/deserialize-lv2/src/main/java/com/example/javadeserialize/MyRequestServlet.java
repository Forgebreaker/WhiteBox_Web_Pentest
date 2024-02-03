package com.example.javadeserialize;

import javax.servlet.*;
import javax.servlet.http.*;
import javax.servlet.annotation.*;
import java.io.IOException;
import java.io.PrintWriter;

@WebServlet(name = "MyRequestServlet", value = "/request")
public class MyRequestServlet extends HttpServlet {
    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        // Disable this feature because security reason
        PrintWriter out = response.getWriter();
        out.println("This feature is disabled");
//        String host = request.getParameter("host");
//        MyHTTPClient httpClient = new MyHTTPClient(host, 80);
//        httpClient.sendRequest();
    }

    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        doGet(request, response);
    }
}
