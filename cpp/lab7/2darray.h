#pragma once

#define MAXSIZE 5

void inputm(double x[][MAXSIZE], int n, int m);
void outputm(double x[][MAXSIZE], int n, int m);
double sumamat(double x[][MAXSIZE], int n, int m);
double sumamat_pos(double x[][MAXSIZE], int n, int m);
double sumamat_neg(double x[][MAXSIZE], int n, int m);
int number_of_pos(double x[][MAXSIZE], int n, int m);
int number_of_neg(double x[][MAXSIZE], int n, int m);
int number_of_zeros(double x[][MAXSIZE], int n, int m);
void poisk_max_mat(double x[][MAXSIZE], int n, int m, int& im, int& jm, double& max);
void poisk_min_mat(double x[][MAXSIZE], int n, int m, int& im, int& jm, double& min);
void delete_row(double x[][MAXSIZE], int& n, int m, int k);
void add_row(double x[][MAXSIZE], int& n, int m, int k, double y[]);
void delete_column(double x[][MAXSIZE], int n, int& m, int k);
void add_column(double x[][MAXSIZE], int n, int& m, int k, double y[]);
int copy_pos(double x[][MAXSIZE], int n, int m, double y[]);
int copy_neg(double x[][MAXSIZE], int n, int m, double y[]);
int copy_row(double x[][MAXSIZE], int n, int m, int k, double y[]);
int copy_column(double x[][MAXSIZE], int n, int m, int k, double y[]);
void swap_row(double x[][MAXSIZE], int n, int m, int k, int l);
void swap_column(double x[][MAXSIZE], int n, int m, int k, int l);
void tranpon(double x[][MAXSIZE], int n, int m, double y[][MAXSIZE]);
int copy_max_neg_diag(double x[][MAXSIZE], int n, double y[]);
