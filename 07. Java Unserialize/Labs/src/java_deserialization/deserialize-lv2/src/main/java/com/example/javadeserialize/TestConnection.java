package com.example.javadeserialize;

import java.io.IOException;
import java.io.ObjectInputStream;
import java.io.Serializable;

public class TestConnection implements Serializable {
    public HTTPConnection connection;
    public TestConnection(HTTPConnection connection) {
        this.connection = connection;
    }

    private void readObject(ObjectInputStream in) throws IOException, ClassNotFoundException, InterruptedException {
        in.defaultReadObject();
        // Re-create the connection
        this.connection.connect();
    }

}
