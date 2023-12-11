#include <iostream>
#include <iomanip>
#include "2darray.h"
#include "../lab4/array.h"


void inputm(double x[][MAXSIZE], int n, int m) {
    if(m > MAXSIZE)
        abort();
    for(int i = 0; i < n; ++i) {
        std::cout << "Enter string " << i << " :";
        for(int j = 0; j < m; ++j)
            std::cin >> x[i][j];
    }
}

void outputm(double x[][MAXSIZE], int n, int m) {
    if(m > MAXSIZE)
        abort();
    for(int i = 0; i < n; ++i) {
        for(int j = 0; j < m; ++j)
            std::cout << std::setw(10) << x[i][j];
        std::cout << std::endl;
    }
}

double sumamat(double x[][MAXSIZE], int n, int m) {
    if(m > MAXSIZE)
        abort();
    double S = 0;
    for(int i = 0; i < n; ++i) {
        for(int j = 0; j < m; ++j)
            S += x[i][j];
    }
    return S;
}

double sumamat_pos(double x[][MAXSIZE], int n, int m) {
    if(m > MAXSIZE)
        abort();
    double S = 0;
    for(int i = 0; i < n; ++i) {
        for(int j = 0; j < m; ++j) {
            if(x[i][j] > 0)
                S += x[i][j];
        }
    }
    return S;
}

double sumamat_neg(double x[][MAXSIZE], int n, int m) {
    if(m > MAXSIZE)
        abort();
    double S = 0;
    for(int i = 0; i < n; ++i) {
        for(int j = 0; j < m; ++j) {
            if(x[i][j] < 0)
                S += x[i][j];
        }
    }
    return S;
}

int number_of_pos(double x[][MAXSIZE], int n, int m) {
    if(m > MAXSIZE)
        abort();
    double counter = 0;
    for(int i = 0; i < n; ++i) {
        for(int j = 0; j < m; ++j) {
            if(x[i][j] > 0)
                ++counter;
        }
    }
    return counter;
}

int number_of_neg(double x[][MAXSIZE], int n, int m) {
    if(m > MAXSIZE)
        abort();
    double counter = 0;
    for(int i = 0; i < n; ++i) {
        for(int j = 0; j < m; ++j) {
            if(x[i][j] < 0)
                ++counter;
        }
    }
    return counter;
}

int number_of_zeros(double x[][MAXSIZE], int n, int m) {
    if(m > MAXSIZE)
        abort();
    double counter = 0;
    for(int i = 0; i < n; ++i) {
        for(int j = 0; j < m; ++j) {
            if(x[i][j] == 0)
                ++counter;
        }
    }
    return counter;
}

void poisk_max_mat(double x[][MAXSIZE], int n, int m, int &im, int &jm, double &max) {
    if(m > MAXSIZE)
        abort();
    max = x[0][0];
    im = 0;
    jm = 0;
    for(int i = 0; i < n; ++i) {
        for(int j = 0; j < m; ++j) {
            if(x[i][j] > max) {
                max = x[i][j];
                im = i;
                jm = j;
            }
        }
    }
}

void poisk_min_mat(double x[][MAXSIZE], int n, int m, int &im, int &jm, double &min) {
    if(m > MAXSIZE)
        abort();
    min = x[0][0];
    im = 0;
    jm = 0;
    for(int i = 0; i < n; ++i) {
        for(int j = 0; j < m; ++j) {
            if(x[i][j] < min) {
                min = x[i][j];
                im = i;
                jm = j;
            }
        }
    }
}

void delete_row(double x[][MAXSIZE], int &n, int m, int k) {
    if(m > MAXSIZE)
        abort();
    for(int i = k; i < n - 1; ++i) {
        for(int j = 0; j < m; ++j) {
            x[i][j] = x[i+1][j];
        }
    }
    --n;
}

void add_row(double x[][MAXSIZE], int &n, int m, int k, double y[]) {
    if(m > MAXSIZE)
        abort();
    for(int i = n; i > k + 1; --i) {
        for(int j = 0; j < m; ++j) {
            x[i][j] = x[i-1][j];
        }
    }
    for(int i = 0; i < m; ++i) {
        x[k+1][i] = y[i];
    }
    ++n;
}

void delete_column(double x[][MAXSIZE], int n, int &m, int k) {
    if(m > MAXSIZE)
        abort();
    for(int i = 0; i < n; ++i) {
        for(int j = k; j < m - 1; ++j) {
            x[i][j] = x[i][j+1];
        }
    }
    --m;
}

void add_column(double x[][MAXSIZE], int n, int &m, int k, double y[])  {
    if(m > MAXSIZE)
        abort();
    for(int i = 0; i < n; ++i) {
        for(int j = m; j > k + 1; --j) {
            x[i][j] = x[i][j-1];
        }
    }
    for(int i = 0; i < n; ++i) {
        x[i][k+1] = y[i];
    }
    ++m;
}

int copy_pos(double x[][MAXSIZE], int n, int m, double y[]) {
    if(m > MAXSIZE)
        abort();
    int count = 0;
    for(int i = 0; i < n; ++i) {
        for(int j = 0; j < m; ++j) {
            if(x[i][j] > 0) {
                y[count] = x[i][j];
                ++count;
            }
        }
    }
    return count;
}

int copy_neg(double x[][MAXSIZE], int n, int m, double y[]) {
    if(m > MAXSIZE)
        abort();
    int count = 0;
    for(int i = 0; i < n; ++i) {
        for(int j = 0; j < m; ++j) {
            if(x[i][j] < 0) {
                y[count] = x[i][j];
                ++count;
            }
        }
    }
    return count;
}

int copy_row(double x[][MAXSIZE], int n, int m, int k, double y[]) {
    if(m > MAXSIZE || k >= n)
        abort();
    for(int i = 0; i < m; ++i)
        y[i] = x[k][i];
    return m;
}

int copy_column(double x[][MAXSIZE], int n, int m, int k, double y[]) {
    if(m > MAXSIZE || k >= m)
        abort();
    for(int i = 0; i < n; ++i)
        y[i] = x[i][k];
    return n;
}

void swap_row(double x[][MAXSIZE], int n, int m, int k, int l) {
    if(m > MAXSIZE || k >= n || l >= n)
        abort();
    if(k != l) {
        double res;
        for(int i = 0; i < m; ++i) {
            res = x[k][i];
            x[k][i] = x[l][i];
            x[l][i] = res;
        }
    }
}

void swap_column(double x[][MAXSIZE], int n, int m, int k, int l) {
    if(m > MAXSIZE || k >= m || l >= m)
        abort();
    if(k != l) {
        double res;
        for(int i = 0; i < n; ++i) {
            res = x[i][k];
            x[i][k] = x[i][l];
            x[i][l] = res;
        }
    }
}

void tranpon(double x[][MAXSIZE], int n, int m, double y[][MAXSIZE]) {
    if(m > MAXSIZE || n > MAXSIZE)
        abort();
    for(int i = 0; i < n; ++i) {
        for(int j = 0; j < m; ++j) {
            y[j][i] = x[i][j]; 
        }
    }
}

int copy_max_neg_diag(double x[][MAXSIZE], int n, double y[]) {
    if(n > MAXSIZE)
        abort();
    int count = 0, k;
    double res[n];
    double max;
    for(int i = 0; i < n; ++i) {
        if(x[i][i] < 0) {
            copy_row(x, n, n, i, res);
            poiskmax(res, n, max, k);
            y[count] = max;
            ++count;
        }
    }
    return count;
}
