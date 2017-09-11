#include <sys/types.h>
#include <sys/wait.h>
#include <sys/stat.h>
#include <fcntl.h>
#include <iostream>
#include <stdio.h>
#include <string>
#include <string.h>
#include <unistd.h>
#include <stdlib.h>
#include <errno.h>
#include </usr/include/mysql55/mysql.h>
#include <fstream>
using namespace std;

#define HOST "localhost"
#define USER "root"
#define PASS "kkiinngg31"
#define DATABASE "problem"

int grader()
{
	int pid;
	pid = fork();
	if(pid == 0)
	{	
		execl("./tgrader", "sudo ./tgrader", (char *)NULL);
		exit(10);
	}
	else
	{
		int status = 0;
		waitpid(pid, &status, 0);

		if(status == 0)
			return 0;
		else if(status == 256)
			return 1;
		else if(status == 768)
			return 3;
		else if(status == 1024)
			return 4;
		else
			return 5;			
	}

}

int main(int argc, char *argv[])
{
	MYSQL *db = NULL, con;
        MYSQL_RES *result;
        MYSQL_ROW row;
        int stat;
        char query[255];

        mysql_init(&con);
	mysql_options(&con, MYSQL_SET_CHARSET_NAME, "utf8");
	mysql_options(&con, MYSQL_INIT_COMMAND, "SET NAMES utf8");
        db = mysql_real_connect(&con, HOST, USER, PASS, DATABASE, 3306, (char *)NULL, 0);

        if(db == NULL)
                fprintf(stderr, "Mysql connection error : %s", mysql_error(&con));


	//
	char str[100] = "select * from no_";
	strcat(str, argv[1]);
	//


        stat = mysql_query(db, str);
        if(stat != 0)
                fprintf(stderr, "Mysql query error : %s", mysql_error(&con));

	result = mysql_store_result(db);

        while((row = mysql_fetch_row(result)) != NULL)
        {
		ofstream input;
		input.open("input.txt");
		input << row[1];
		input.close();
		
		ofstream correct;
		correct.open("correct.txt");
		correct << row[2];
		correct.close();

		int result = grader();
		if(result != 0)
		{
			if(result == 1)
				cout<<"Incorrect";
			else if(result == 3)
				cout<<"Time Out";
			else if(result == 4)
				cout<<"Compile Error";
			else
				cout<<"Runtime Error";

			mysql_close(db);
			return 0;
		}
        }

	cout<<"Correct";
        mysql_close(db);

	return 0;
}
