#include <iostream>
#include <cmath>
#include <iomanip>
#include "array.h"

void inputv(double x[], int n) {
    for(int i = 0; i < n; ++i)
        std::cin >> x[i];
}

void inputv(int x[], int n) {
    for(int i = 0; i < n; ++i)
        std::cin >> x[i];
}

void outputv(double x[], int n) {
    for(int i = 0; i < n; ++i) {
        if(!(i % 5))
            std::cout << std::endl;
        std::cout << std::setw(10)<< x[i];
    }
    std::cout << std::endl;
}

void outputv(int x[], int n) {
    for(int i = 0; i < n; ++i) {
        if(!(i % 5))
            std::cout << std::endl;
        std::cout << std::setw(10)<< x[i];
    }
    std::cout << std::endl;
}

double suma(double x[], int n) {
    double s = 0;
    for(int i = 0; i < n; ++i)
        s += x[i];
    return s;
}

double suma_after(double x[], int n, int i)
{
    return suma(x + i, n - i);
}

double positive_suma(double x[], int n) {
    double s = 0;
    for(int i = 0; i < n; ++i)
        if(x[i] > 0)
            s += x[i];
    return s;
}

double negative_suma(double x[], int n) {
    double s = 0;
    for(int i = 0; i < n; ++i)
        if(x[i] < 0)
            s += x[i];
    return s;
}

void poiskmax(double x[], int n, double &max, int &k) {
    max = x[0];
    k = 0;
    for(int i = 1; i < n; ++i) {
        if(x[i] > max) {
            max = x[i];
            k = i;
        }
    }
}

void poiskmax_abs(double x[], int n, double &max, int &k) {
    max = std::abs(x[0]);
    k = 0;
    for(int i = 1; i < n; ++i) {
        if(std::abs(x[i]) > max) {
            max = std::abs(x[i]);
            k = i;
        }
    }
}

void poiskmin(double x[], int n, double &min, int &k) {
    min = x[0];
    k = 0;
    for(int i = 1; i < n; ++i) {
        if(x[i] < min) {
            min = x[i];
            k = i;
        }
    }
}

void poiskmin_abs(double x[], int n, double &min, int &k) {
    min = std::abs(x[0]);
    k = 0;
    for(int i = 1; i < n; ++i) {
        if(std::abs(x[i]) < min) {
            min = std::abs(x[i]);
            k = i;
        }
    }
}

int poisk_prelast_zero(double x[], int n) {
    bool fl = false;
    for(int i = n-1; i > -1; --i) {
        if(!x[i]) {
            if(fl)
                return i;
            fl = true;
        }
    }
    return -1;
}

int poisk_index(double x[], int n, double t) {
    for(int i = 0; i < n; ++i)
        if(x[i] == t)
            return i;

    return -1;
}

int poisk_index_avg(double x[], int n) {
    return poisk_index(x, n, ((suma(x, n)) / n));
}

double poisk_mult_max(double x[], int n) {
    sortm_down(x, n);
    for(int i = 0; i < n-1; ++i) {
        if(x[i] == x[i+1])
            return x[i];
    }
    return NAN;
}

int poisk_first_neg(double x[], int n) {
    for(int i = 0; i < n; ++i) {
        if(x[i] < 0)
            return i;
    }
    return -1;
}

int poisk_first_pos(double x[], int n) {
    for(int i = 0; i < n; ++i) {
        if(x[i] > 0)
            return i;
    }
    return -1;
}

int poisk_first_zero(double x[], int n) {
    for(int i = 0; i < n; ++i) {
        if(!x[i])
            return i;
    }
    return -1;
}

int poisk_first_even(int x[], int n) {
    for(int i = 0; i < n; ++i) {
        if(!(x[i] % 2))
            return i;
    }
    return -1;
}

int poisk_first_odd(int x[], int n) {
    for(int i = 0; i < n; ++i) {
        if(x[i] % 2)
            return i;
    }
    return -1;
}

double mult_between(double x[], int k, int m) {
    double p = 1;
    int a, b;

    if(k < m) {
        a = k;
        b = m;
    } else {
        a = m;
        b = k;
    }
    if(b - a <= 1)
        return 0;
    for(int i = a + 1; i < b; ++i)
        p *= x[i];
    return p;
}

double mult_between_min_max(double x[], int n) {
    int mink = 0, maxk = 0;
    double res;
    poiskmax(x, n, res, maxk);
    poiskmin(x, n, res, mink);
    return mult_between(x, mink, maxk);
}

void strange_sort(double x[], int n) {
    double res[n];
    int j = 0;
    for(int i = 0; i < n; ++i) {
        if(x[i] >= 0) {
            res[j] = x[i];
            ++j;
        }
    }

    for(int i = 0; i < n; ++i) {
        if(x[i] < 0) {
            res[j] = x[i];
            ++j;
        }
    }
        
    for(int i = 0; i < n; ++i)
        x[i] = res[i];
}

void udal(double x[], int& n, int k) {
    --n;
    for(int i = k; i < n; ++i)
        x[i] = x[i+1];
}

void add(double x[], int& n, int k, double t) {
    for(int i = n; i > k+1; --i)
        x[i] = x[i-1];
    x[k+1] = t;
    ++n;
}

int number_of_positive(double x[], int n) {
    int k = 0;
    for(int i = 0; i < n; ++i)
        if(x[i] > 0)
            ++k;
    return k;
}

int number_of_negative(double x[], int n) {
    int k = 0;
    for(int i = 0; i < n; ++i)
        if(x[i] < 0)
            ++k;
    return k;
}

int number_of_zeros(double x[], int n) {
    int k = 0;
    for(int i = 0; i < n; ++i)
        if(x[i] == 0)
            ++k;
    return k;
}

void delete_positive(double x[], int &n) {
    int k = 0;
    for(int i = 0; i < n; ++i) {
        if(x[i] < 0) {
            x[k] = x[i];
            ++k;
        }
    }
    for(int i = k; i < n; ++i)
        x[i] = 0;
    n = k;
}

void delete_negative(double x[], int &n) {
    int k = 0;
    for(int i = 0; i < n; ++i) {
        if(x[i] >= 0) {
            x[k] = x[i];
            ++k;
        }
    }
    for(int i = k; i < n; ++i)
        x[i] = 0;
    n = k;
}

int delete_first_neg_pair(double x[], int& n) {
    int i = 0;
    for(; i < n-1; ++i) {
        if(x[i] < 0 && x[i+1] < 0) {
            for(int j = i; j < n - 2; ++j) {
                x[j] = x[j+2];
            }
            x[n-1] = 0;
            x[n-2] = 0;
            n -= 2;
            return 1;
        }
    }
    std::cout << "Deleting pair of negative numders failed!" << std::endl;
    return -1;
}

bool is_two_zeros_in_row(double x[], int n) {
    for(int i = 0; i < n-1; ++i) {
        if(!x[i]) {
            if(x[i+1])
                ++i;
            else {
                std::cout << "YES" << std::endl;
                return true;
            }
        }
    }
    std::cout << "NO" << std::endl;
    return false;
    
}

int indexes_of_max(double x[], int b[], int n) {
    int k = 0;
    double max = x[0];
    for(int i = 0; i < n; ++i) {
        if(x[i] == max) {
            b[k] = i;
            ++k;
        } else if(x[i] > max) {
            max = x[i];
            b[0] = i;
            k = 1;
        }
    }
    return k;
}

void sortm_up(double x[], int n) {
    double p;
    for(int i = 0; i < n; ++i) {
        for(int j = i + 1; j < n; ++j) {
            if(x[i] > x[j]) {
                p = x[i];
                x[i] = x[j];
                x[j] = p;
            }
        }
    }
}

void sortm_down(double x[], int n) {
    double p;
    for(int i = 0; i < n; ++i) {
        for(int j = i + 1; j < n; ++j) {
            if(x[i] < x[j]) {
                p = x[i];
                x[i] = x[j];
                x[j] = p;
            }
        }
    }
}

void bubble_sort_up(double x[], int n) {
    bool ost = false;
    double p;
    while(!ost) {
        ost = true;
        for(int i = 0; i < n-1; ++i){
            if(x[i] > x[i+1]) {
                ost = false;
                p = x[i];
                x[i] = x[i+1];
                x[i+1] = p;
            }
        }
    }
}

void bubble_sort_down(double x[], int n) {
    bool ost = false;
    double p;
    while(!ost) {
        ost = true;
        for(int i = 0; i < n-1; ++i){
            if(x[i] < x[i+1]) {
                ost = false;
                p = x[i];
                x[i] = x[i+1];
                x[i+1] = p;
            }
        }
    }
}

void insert_up(double x[], int &n, double k) {
    int i;
    for(i = n - 1; i >= 0; --i) {
        if(x[i] > k)
            x[i+1] = x[i];
        else
            break;
    }
    x[i+1] = k;
    ++n;
}

void insert_sort_up(double x[], int n) {
    for(int i = 1; i < n; insert_up(x, i, x[i]));
}

void insert_down(double x[], int &n, double k) {
    int i;
    for(i = n - 1; i >= 0; --i) {
        if(x[i] < k)
            x[i+1] = x[i];
        else
            break;
    }
    x[i+1] = k;
    ++n;
}

void insert_sort_down(double x[], int n) {
    for(int i = 1; i < n; insert_down(x, i, x[i]));
}

void sortm_up(int x[], int n) {
    int p;
    for(int i = 0; i < n; ++i) {
        for(int j = i + 1; j < n; ++j) {
            if(x[i] > x[j]) {
                p = x[i];
                x[i] = x[j];
                x[j] = p;
            }
        }
    }
}

void sortm_down(int x[], int n) {
    int p;
    for(int i = 0; i < n; ++i) {
        for(int j = i + 1; j < n; ++j) {
            if(x[i] < x[j]) {
                p = x[i];
                x[i] = x[j];
                x[j] = p;
            }
        }
    }
}

void bubble_sort_up(int x[], int n) {
    bool ost = false;
    int p;
    while(!ost) {
        ost = true;
        for(int i = 0; i < n-1; ++i){
            if(x[i] > x[i+1]) {
                ost = false;
                p = x[i];
                x[i] = x[i+1];
                x[i+1] = p;
            }
        }
    }
}

void bubble_sort_down(int x[], int n) {
    bool ost = false;
    int p;
    while(!ost) {
        ost = true;
        for(int i = 0; i < n-1; ++i){
            if(x[i] < x[i+1]) {
                ost = false;
                p = x[i];
                x[i] = x[i+1];
                x[i+1] = p;
            }
        }
    }
}

void insert_up(int x[], int &n, int k) {
    int i;
    for(i = n - 1; i >= 0; --i) {
        if(x[i] > k)
            x[i+1] = x[i];
        else
            break;
    }
    x[i+1] = k;
    ++n;
}

void insert_sort_up(int x[], int n) {
    for(int i = 1; i < n; insert_up(x, i, x[i]));
}

void insert_down(int x[], int &n, int k) {
    int i;
    for(i = n - 1; i >= 0; --i) {
        if(x[i] < k)
            x[i+1] = x[i];
        else
            break;
    }
    x[i+1] = k;
    ++n;
}

void insert_sort_down(int x[], int n) {
    for(int i = 1; i < n; insert_down(x, i, x[i]));
}

int copy_odd_even_ind(int x[], int n, int y[]) {
    int j = 0;
    for(int i = 0; i < n; i += 2) {
        if(x[i] % 2) {
            y[j] = x[i];
            ++j;
        }
    }
    return j;
}

int copy_even_even_ind(int x[], int n, int y[]) {
    int j = 0;
    for(int i = 0; i < n; i += 2) {
        if(!(x[i] % 2)) {
            y[j] = x[i];
            ++j;
        }
    }
    return j;
}

int copy_odd_odd_ind(int x[], int n, int y[]) {
    int j = 0;
    for(int i = 1; i < n; i += 2) {
        if(x[i] % 2) {
            y[j] = x[i];
            ++j;
        }
    }
    return j;
}

int copy_even_odd_ind(int x[], int n, int y[]) {
    int j = 0;
    for(int i = 1; i < n; i += 2) {
        if(!(x[i] % 2)) {
            y[j] = x[i];
            ++j;
        }
    }
    return j;
}

void sdvig(double x[], int n, int m) {
    if(m % n) {
        double res[n];
        for(int i = 0; i < n; ++i) {
            res[(i+m)%n] = x[i];
        }

        for(int i = 0; i < n; ++i)
            x[i] = res[i];
    }
}
