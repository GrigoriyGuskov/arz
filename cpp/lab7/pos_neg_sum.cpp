#include <iostream>
#include "2darray.h"

#define NROW 3
#define NCOL 4

int main() {
    double mat[MAXSIZE][MAXSIZE];
    std::cout << "Enter " << NROW << "x" << NCOL << " matrix" << std::endl;
    inputm(mat, NROW, NCOL);

    std::cout << "Matrix:" << std::endl;
    outputm(mat, NROW, NCOL);

    std::cout << "Sum of positive elements: " << sumamat_pos(mat, NROW, NCOL) << std::endl;
    std::cout << "Sum of negative elements: " << sumamat_neg(mat, NROW, NCOL) << std::endl;

    int i, j;
    double max;
    poisk_max_mat(mat, NROW, NCOL, i, j, max);

    std::cout << "Max element:" << std::endl;
    std::cout << "mat[" << i << "][" << j << "] = " << max << std::endl;

    return 0;
}