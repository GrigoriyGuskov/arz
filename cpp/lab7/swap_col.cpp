#include <iostream>
#include "2darray.h"

#define NROW 5
#define NCOL 5

int main() {
    double mat[NROW][NCOL];
    std::cout << "Enter " << NROW << "x" << NCOL << " matrix" << std::endl;
    inputm(mat, NROW, NCOL);

    std::cout << "Matrix:" << std::endl;
    outputm(mat, NROW, NCOL);

    int i, j;
    double max;
    poisk_max_mat(mat, NROW, NCOL, i, j, max);

    std::cout << "Max element:" << std::endl;
    std::cout << "mat[" << i << "][" << j << "] = " << max << std::endl;

    swap_column(mat, NROW, NCOL, 0, j);

    std::cout << "Altered matrix:" << std::endl;
    outputm(mat, NROW, NCOL);

    return 0;
}