#include <iostream>
#include "array.h"

#define ARRSIZE 10

int main() {

    double arr[ARRSIZE];
    int n = ARRSIZE;
    std::cout << "Enter array of "<< ARRSIZE <<" elements"<< std::endl;
    inputv(arr, ARRSIZE);
    std::cout << "Array "<< std::endl;
    outputv(arr, ARRSIZE);
    
    std::cout << "Deleting... "<< std::endl;

    if(delete_first_neg_pair(arr, n) > 0) {
        std::cout << "Altered array "<< std::endl;
        outputv(arr, n);
    }

    return 0;
}