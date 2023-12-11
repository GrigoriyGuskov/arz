#include <iostream>
#include "array.h"

#define ARRSIZE 10

int main() {

    double arr[ARRSIZE], res, p;
    int maxk, mink;

    std::cout << "Enter array of "<< ARRSIZE <<" elements"<< std::endl;
    inputv(arr, ARRSIZE);
    std::cout << "Array "<< std::endl;
    outputv(arr, ARRSIZE);

    poiskmax_abs(arr, ARRSIZE, res, maxk);
    poiskmin_abs(arr, ARRSIZE, res, mink);

    p = mult_between(arr, mink, maxk);

    std::cout << "Product of numders between abs min and max "<< p << std::endl;

    return 0;
    
}