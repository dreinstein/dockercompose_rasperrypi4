
#Derived from official m"ysql image (our base image)
FROM hypriot/rpi-mysql

# Add a database
#ENV MYSQL_DATABASE aquarium
COPY ./mysqldump.sql ./home/
COPY ./sqlScripts/* ./home/
RUN ["mkdir","./home/mydir"]
COPY ./copyScript.sh ./home/mydir/
RUN ["chmod", "755", "./home/mydir/"]
RUN ["chmod", "755", "./home/mydir/copyScript.sh"]
RUN ["chmod", "755", "./home/aquaval.sql"]
RUN ["chmod", "755", "./home/mysqldump.sql"]
#ENTRYPOINT ["./home/mydir"]
