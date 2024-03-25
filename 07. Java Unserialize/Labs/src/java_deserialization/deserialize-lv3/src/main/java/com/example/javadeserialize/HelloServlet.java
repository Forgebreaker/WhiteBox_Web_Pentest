package com.example.javadeserialize;

import java.io.*;
import java.util.Arrays;
import java.util.Base64;
import java.util.Map;
import java.util.stream.Collectors;
import javax.servlet.http.*;
import javax.servlet.annotation.*;

@WebServlet(name = "helloServlet", value = "/hello-servlet")
public class HelloServlet extends HttpServlet {
    private String message;

    public String serializeToBase64(Serializable obj) throws IOException {
        ByteArrayOutputStream output = new ByteArrayOutputStream();
        ObjectOutputStream oos = new ObjectOutputStream(output);
        oos.writeObject(obj);
        oos.close();
        return Base64.getEncoder().encodeToString(output.toByteArray());
    }

    private static Object deserializeFromBase64(String s) throws IOException, ClassNotFoundException {
        byte[] data = Base64.getDecoder().decode(s);
        ObjectInputStream ois = new ObjectInputStream(new ByteArrayInputStream(data));
        Object o  = ois.readObject();
        ois.close();
        return o;
    }


    public void doGet(HttpServletRequest request, HttpServletResponse response) throws IOException {
        try {
            response.setContentType("text/html");
            PrintWriter out = response.getWriter();
            // Get list of cookie
            Map<String, String> cookieMap = Arrays.stream(request.getCookies()).collect(Collectors.toMap(Cookie::getName, Cookie::getValue));
            // Check is user cookie has already set
            User user;
            if (!cookieMap.containsKey("user")) {
                user = new User("guest");
                Cookie cookie = new Cookie("user", serializeToBase64(user));
                response.addCookie(cookie);
            } else {
                try {
                    user = (User)deserializeFromBase64(cookieMap.get("user"));
                } catch (Exception e) {
                    out.println("Please don't hack me");
                    e.printStackTrace();
                    return;
                }
            }
            this.message = "Level 3 Hello " + user.getName();
            out.println("<html><body>");
            out.println("<h1>" + message + "</h1>");
            out.println("</body></html>");
        } catch (Exception e) {
            response.setContentType("text/html");
            PrintWriter out = response.getWriter();
            out.println("Something went wrong");
            return;
        }
    }

    public void doPost(HttpServletRequest request, HttpServletResponse response) throws IOException {
        doGet(request, response);
    }

    public void destroy() {
    }
}