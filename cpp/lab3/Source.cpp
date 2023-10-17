#include <iostream>
using namespace std;
double beta(double a, double b);

int main() {
	setlocale(LC_ALL, "rus");

	double a = 0, b = 0, p = 0;

	cout << "\n������ ������ ����� a = ";
	cin >> a;
	cout << "\n������ ������ ����� b = ";
	cin >> b;

	p = beta(a, b);

	cout << "\n������������ p = " << p << endl;

	return 0;
}

double beta(double a, double b) {
	return a * b;
}
