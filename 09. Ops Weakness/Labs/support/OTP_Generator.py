with open('OTP.txt', 'w') as file:
    for i in range(10000):
        formatted_number = '{:04d}'.format(i)
        file.write(formatted_number + '\n')
