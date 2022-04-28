#include<stdio.h>
#include<string.h>
#include<stdlib.h>
int main()
{
	FILE *fp;
	char user[] ="KIT";
	char ch,pass[] ="RAAZ";
	int i; 
	 printf("enter user name");
	 scanf("%s",&user);
	 
	 printf("enter password");
	 for(i = 0;i < 100;i++)
     {
       ch = getch();
       if(ch == 13)
          break;
        pass[i] = ch;
        ch = '*' ;
       printf("%c ", ch);
    }
     pass[i] = '\0';
	 
	 if(strcmp(user,"KIT")==0) 
	 { 
	     if(strcmp(pass,"RAAZ")==0)
	     {
	     	   system("cls");
	     	
	     	printf("\t\t\t\t\t/*******||WELCOME IN APPLE GAME||*******/\n");
	    //goto: include"flipcoin2_0.c"
	    //fopen("flipcoin2_0.exe","r");
	          fp = fopen("flipcoin2_0.exe","r");
	          if(fp == NULL){
	          	printf("error");
			  }
			  else{
			  	printf("opening.....");
			  	fclose(fp);
			  }
	 }else{
	 	printf("wrong");
	 }
}
	 else
	 {
	 	printf("invalid username/password");
	 }
	 return 0;
}
