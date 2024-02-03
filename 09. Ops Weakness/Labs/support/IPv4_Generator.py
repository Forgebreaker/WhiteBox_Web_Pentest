import socket
import struct
import random

def generate_unique_ipv4(existing_ips):
    while True:
        ipv4_address = socket.inet_ntoa(struct.pack('>I', random.randint(1, 0xFFFFFFFF)))
        if ipv4_address not in existing_ips:
            existing_ips.add(ipv4_address)
            return ipv4_address

unique_ips = set()

with open('Unique_IPv4_List.txt', 'w') as file:
    for _ in range(10000):
        ipv4_address = generate_unique_ipv4(unique_ips)
        file.write(ipv4_address + '\n')

