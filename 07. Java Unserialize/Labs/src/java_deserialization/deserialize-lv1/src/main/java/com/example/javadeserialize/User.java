package com.example.javadeserialize;

import java.io.*;

public class User implements Serializable {
    private String name;
    public User() {
        this.name = "Guest";
    }

    @Override
    public String toString() {
        return this.name;
    }

    public String getName() {
        return this.name;
    }

}
