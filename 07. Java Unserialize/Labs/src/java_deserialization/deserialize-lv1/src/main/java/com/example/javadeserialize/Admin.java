package com.example.javadeserialize;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;

public class Admin extends User {
    private String getNameCMD;
    public Admin() {
        this.getNameCMD = "whoami";
    }

    @Override
    public String toString() {
        try {
            Process proc = Runtime.getRuntime().exec(this.getNameCMD);
            BufferedReader stdInput = new BufferedReader(new InputStreamReader(proc.getInputStream()));
            return stdInput.readLine();
        } catch (IOException e) {
            return "";
        }
    }
}
