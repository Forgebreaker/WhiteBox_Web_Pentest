package com.example.javadeserialize;

import java.io.IOException;
import java.io.Serializable;

public class HTTPConnection implements Serializable {
    private String url;
    public HTTPConnection(String url) {
        this.url = url;
    }

    public void connect() throws IOException, InterruptedException {
        // TODO: connect to this.url
    }
}
