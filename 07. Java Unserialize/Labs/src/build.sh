#!/bin/bash

while :
do
echo "Rebuild:"
echo "1. deserialize-lv1"
echo "2. deserialize-lv2"
echo "3. deserialize-lv3"
echo "4. deserialize-lv4"
echo "5. deserialize-exploit-tool"
echo "6. debug-java-web"
echo "7. exit"
echo -n "Type a number option :"
read -n 1 option
printf "\n"
case $option in
1* )     cd /home/cbjs/java_deserialization/deserialize-lv1 && rm target/ -rf && /home/cbjs/apache-maven-3.6.3/bin/mvn clean package && mv /home/cbjs/java_deserialization/deserialize-lv1/target/java-deserialize-lv1-1.0-SNAPSHOT.war /home/cbjs/;;
 
2* )     cd /home/cbjs/java_deserialization/deserialize-lv2 && rm target/ -rf && /home/cbjs/apache-maven-3.6.3/bin/mvn clean package && mv /home/cbjs/java_deserialization/deserialize-lv2/target/java-deserialize-lv2-1.0-SNAPSHOT.war /home/cbjs/;;
 
3* )     cd /home/cbjs/java_deserialization/deserialize-lv3 && rm target/ -rf && /home/cbjs/apache-maven-3.6.3/bin/mvn clean package && mv /home/cbjs/java_deserialization/deserialize-lv3/target/java-deserialize-lv3-1.0-SNAPSHOT.war /home/cbjs/;;

4* )     cd /home/cbjs/java_deserialization/deserialize-lv4 && rm target/ -rf && /home/cbjs/apache-maven-3.6.3/bin/mvn clean package && mv /home/cbjs/java_deserialization/deserialize-lv4/target/java-deserialize-lv4-1.0-SNAPSHOT.war /home/cbjs/;;

5* )     cd /home/cbjs/java_deserialization/deserialize-exploit-tool/ && rm target/ -rf && /home/cbjs/apache-maven-3.6.3/bin/mvn clean package && mv /home/cbjs/java_deserialization/deserialize-exploit-tool/target/deserialize-exploit-1.0-SNAPSHOT.war /home/cbjs/;;

6* )     cd /home/cbjs/debug-java-web/ && rm target/ -rf && /home/cbjs/apache-maven-3.6.3/bin/mvn clean package && mv /home/cbjs/debug-java-web/target/debug-java-web-1.0-SNAPSHOT.war /home/cbjs/;;
 
7* )     exit 0;;    

* )      echo "Try again.";;
esac
cp /home/cbjs/*.war /home/cbjs/apache-tomcat-8.5.35/webapps/
echo "Done building!"
done

