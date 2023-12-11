#include <iostream>
#include "2darray.h"
#include "../lab4/array.h"

#define NROW 5
#define NCOL 5

int main() {
    double mat[MAXSIZE][MAXSIZE];
    std::cout << "Enter " << NROW << "x" << NCOL << " matrix" << std::endl;
    inputm(mat, NROW, NCOL);

    std::cout << "Matrix:" << std::endl;
    outputm(mat, NROW, NCOL);

    double arr[NROW * NCOL];

    std::cout << "Array of negative elements:" << std::endl;
    int n = copy_neg(mat, NROW, NCOL, arr);
    if(n)
        outputv(arr, n);
    else
        std::cout << "There no negative elements in the matrix" << std::endl;

    return 0;
}