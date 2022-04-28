#include<stdio.h>  
int main(void)  
{  
    int a=21, c, com;  
  
    while(1)  
    {  
    printf("%d\n",c);
        printf("\n number of apple left = %d\n", a);  
        printf("choose 1 or 2 or 3 or 4 apple\n");  
        scanf("%d", &c);  
       // printf("%d\n",c);
        if(c>4||c<1)  
       // printf("%d\n",c);
            continue; 
		//	printf("%d\n",c); 
        a=a-c;  
        printf("number of apple left = %d\n", a);  
        com=5-c;  
        printf("computer picked up = %d\n", com);  
        a=a-com;  
        if(a==1)  
        {  
            printf("\n number of apple left = %d\n", a);  
            printf("You lost the Game\n");  
            break;  
        }  
    }  
  
    return 0;  
}  
