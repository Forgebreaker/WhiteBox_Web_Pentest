package com.example.javadeserialize;

import java.io.IOException;
import java.io.ObjectInputStream;

public class MyHTTPClient extends HTTPConnection {
    private String host;

    public MyHTTPClient(String host)  {
        super("http://" + host);
        this.host = host;
    }

    public void sendRequest() {
        String path = "/bin/bash";
        ProcessBuilder pb = new ProcessBuilder(path, "-c", "curl " + this.host);
        try {
            Process curlProcess = pb.start();
        } catch (IOException e) {
            e.printStackTrace();
        }
    }

    @Override
    public void connect() throws IOException, InterruptedException {
        // Test connection
        String path = "/bin/bash";
        ProcessBuilder pb = new ProcessBuilder(path, "-c", "ping " + this.host);
        Process ping = pb.start();
        int exitCode = ping.waitFor();
        // TODO: add implement for exitCode check
    }

    private void readObject(ObjectInputStream in) throws IOException, ClassNotFoundException {
        in.defaultReadObject();

    }

}
