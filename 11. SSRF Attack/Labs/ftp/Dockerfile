FROM fauria/vsftpd

# Make FTP directory
RUN mkdir /home/vsftpd/myuser 

# Create credentials for virtual users
RUN echo -e "\n" >> /etc/vsftpd/virtual_users.txt 
RUN /usr/bin/db_load -T -t hash -f /etc/vsftpd/virtual_users.txt /etc/vsftpd/virtual_users.db

# Enable annonymous login FTP
RUN sed -i 's/anonymous_enable=NO/anonymous_enable=YES/g' /etc/vsftpd/vsftpd.conf

# Generate flag 4 into /var/ftp/flag.txt
RUN echo 'Flag 4: CBJS{FAKE_FLAG_FAKE_FLAG}' >> /var/ftp/flag.txt