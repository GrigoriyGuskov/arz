#include <iostream>
#include "array.h"

#define ARRSIZE 10

int main() {

    double arr[ARRSIZE], maxarr, minarr, p;
    int maxk, mink;

    std::cout << "Enter array of "<< ARRSIZE <<" elements"<< std::endl;
    inputv(arr, ARRSIZE);
    std::cout << "Array "<< std::endl;
    outputv(arr, ARRSIZE);

    poiskmax(arr, ARRSIZE, maxarr, maxk);
    poiskmin(arr, ARRSIZE, minarr, mink);

    p = mult_between(arr, mink, maxk);

    std::cout << "Max value "<< maxarr << std::endl;
    std::cout << "Index of max value "<< maxk << std::endl;
    std::cout << "Min value "<< minarr << std::endl;
    std::cout << "Index of min value "<< mink << std::endl;
    std::cout << "Product of numders between min and max "<< p << std::endl;

    return 0;
}