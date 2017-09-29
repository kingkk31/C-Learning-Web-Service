#include <stdio.h>
#include <iostream>
#include <unistd.h>
#include <stdlib.h>
#include <sys/types.h>
#include <sys/wait.h>
#include <sys/stat.h>
#include <fcntl.h>
#include <sys/resource.h>
#include <sys/time.h>
#include <errno.h>
#include <fstream>
#include <string>
#include <string.h>
using namespace std;

int compile(void)
{
        int pid;
        pid = fork();

        if(pid == 0)
        {
		int re;
		re = system("sudo gcc -o main main.c");
		if(re != 0)
			exit(4);


                //time limit : 2
                struct rlimit rl;
                getrlimit(RLIMIT_NOFILE, &rl);
                rl.rlim_cur = 2;
                if(-1 == setrlimit(RLIMIT_CPU, &rl)){
                        cout<<"setrlimit : "<<errno<<endl;
                }


		//child(main.c) < input.txt
                int fd;
		fd = open("input.txt", O_RDONLY);
		dup2(fd, 0);
		close(fd);


                //child(main.c)'s output > output.txt
                fd = open("output.txt", O_WRONLY | O_CREAT | O_TRUNC, 0644);
                dup2(fd, 1);
                close(fd);


                fd = open("error.txt", O_WRONLY | O_CREAT | O_TRUNC, 0644);
                dup2(fd, 2);
                close(fd);

		execl("./main", "./main", (char *)NULL);
        }
        else
        {
                int status = 0;
                waitpid(pid, &status, 0);

		if(status == 24)
			return 3;
                else if(status == 1024)
			return 4;
		else if(WIFSIGNALED(status))
			return 5;
		else
		{
			string buf1, buf2;
			ifstream in1, in2;
			in1.open("correct.txt");
			in2.open("output.txt");
			bool flag = true;
	
			while(true)
			{
				if(in1.eof() && in2.eof())
					break;
				else if(in1.eof() || in2.eof())
				{
					flag = false;
					break;
				}
				else
				{
					getline(in1, buf1);
					getline(in2, buf2);
	
					if(buf1 != buf2)
					{
						flag = false;
						break;
					}
				}
			}
	
			in1.close();
			in2.close();

			if(flag)
				return 0;
			else
				return 1;
		}
        }
}

int main(void)
{
        int result = compile();
	
	system("sudo rm input.txt");
	system("sudo rm correct.txt");
	if(result != 4)
	{
		system("sudo rm *.txt");
		system("sudo rm main");
	}

	if(result == 0)	
		return 0;
	else if(result == 1)
		return 1;
	else if(result == 3)
		return 3;
	else if(result == 4)
		return 4;
	else if(result == 5)
		return 5;

        return 0;
}
        
