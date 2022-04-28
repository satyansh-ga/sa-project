#include<stdio.h>
#include<time.h>
#include<stdlib.h>
int main()
{
	int toss;
	int c;
	printf("Say head or tail! press 0 for head and 1 for tail:\n");
    scanf("%d", &c);
	toss = rand() % 2;
	printf("%d\n",rand);
	printf("%d\n",toss);
	if(c==0 || c==1)
    {
        if(toss == c)
        {
            if(toss==1)
            printf("You called it correctly ... it is tail");
            else
            printf("You called it correctly ... it is head");
        }
        else
        {
            if(toss==0)
            printf("No way ...it is head !");
            else
            printf("No way ... it is tail!");
        }
    }
    return 0;
}



