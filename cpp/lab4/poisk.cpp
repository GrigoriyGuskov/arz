#include <iostream>
#include "array.h"

#define ARRSIZE 15

int main() {

    double arr[ARRSIZE], maxarr;
    int maxk;

    std::cout << "Enter array of "<< ARRSIZE <<" elements"<< std::endl;
    inputv(arr, ARRSIZE);
    std::cout << "Array "<< std::endl;
    outputv(arr, ARRSIZE);

    poiskmax(arr, ARRSIZE, maxarr, maxk);

    std::cout << "Max value "<< maxarr << std::endl;
    std::cout << "Index of max value "<< maxk << std::endl;

    return 0;
}