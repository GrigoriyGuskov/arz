#include <iostream>
#include "2darray.h"

#define NROW 5
#define NCOL 5

int main() {
    double mat[MAXSIZE][MAXSIZE];
    std::cout << "Enter " << NROW << "x" << NCOL << " matrix" << std::endl;
    inputm(mat, NROW, NCOL);

    std::cout << "Matrix:" << std::endl;
    outputm(mat, NROW, NCOL);

    int i, j;
    double max;
    poisk_min_mat(mat, NROW, NCOL, i, j, max);

    std::cout << "Min element:" << std::endl;
    std::cout << "mat[" << i << "][" << j << "] = " << max << std::endl;

    int n = NROW, m = NCOL;
    delete_row(mat, n, m, i);
    delete_column(mat, n, m, j);

    std::cout << "Altered matrix:" << std::endl;
    outputm(mat, n, m);

    return 0;
}