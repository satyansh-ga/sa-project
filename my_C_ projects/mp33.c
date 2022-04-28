#include <stdio.h>
#include <stdlib.h> 
int main(int argc, char* songf[])
{
    char song[100];
    sprintf(song, "C:\\Users\\User\\OneDrive\\Desktop\\c_programs\\sad\\%s.mp3", songf[1]);
    //sprintf(file,"C:\\Users\\User\\OneDrive\\Desktop\\c_programs\\%s.mp3", argv[2]);
    printf("The song\t---%s.mp3--- \tis going ""to be played in a ""second... :",songf[1]);
    system(song);
//     system(file);
    return 0;
}
