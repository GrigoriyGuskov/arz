#include <iostream>
#include "2darray.h"
#include "../lab4/array.h"

#define MSIZE 5

int main() {
    double mat[MSIZE][MSIZE];
    std::cout << "Enter " << MSIZE << "x" << MSIZE << " matrix" << std::endl;
    inputm(mat, MSIZE, MSIZE);

    std::cout << "Matrix:" << std::endl;
    outputm(mat, MSIZE, MSIZE);

    double arr[MSIZE];

    std::cout << "Array of max elements, where diagonal element is negative:" << std::endl;
    int n = copy_max_neg_diag(mat, MSIZE, arr);
    if(n)
        outputv(arr, n);
    else
        std::cout << "There no negative elements on diagonal" << std::endl;

    return 0;
}